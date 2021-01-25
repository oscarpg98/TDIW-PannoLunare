<?php

require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__ ."/../model/users_model.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $adress = $_POST['adress'];
    $city = $_POST['city'];
    $cp = $_POST['cp'];
    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

    if(!empty($username) && !empty($email) && !empty($password) && !empty($gender) && !empty($adress) && !empty($city) && !empty($cp)){
        /* Utilizamos el método de validación preg_match en vez de filter_var con el parámetro FILTER_VALIDATE_INT, porque este último no permitía
         * que un código postal empezara por 0 */
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/^\d{5}$/', $cp)) {
            $conn = connectDB();
            addUser($conn, $username, $email, $encryptedPassword, $gender, $adress, $city, $cp);
            require(__DIR__."/../view/header_view.php");
            require(__DIR__ . "/../view/register_view.php");
            require(__DIR__."/../view/footer_view.php");
        }
        else {
            header("Location: index.php?action=register&filter_error=yes");
        }
    }
    else {
        header("Location: index.php?action=register&empty=yes");
    }
}
else {
    require(__DIR__."/../view/header_view.php");
    require(__DIR__."/../view/register_form_view.php");
    require(__DIR__."/../view/footer_view.php");
}