<?php

require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__."/../model/users_model.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $filters = filter_input_array(
        INPUT_POST,
        [
            'email' => FILTER_DEFAULT,
            'password' => FILTER_DEFAULT,
        ]
    );

    $conn = connectDB();
    $email = $filters['email'];
    $password = $filters['password'];

    if (loginUser($conn, $email, $password)){
        $user = getUser($conn, $email);
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['gender'] = $user['gender'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['trolley']['total_price'] = 0.00;
        $_SESSION['trolley']['num_items'] = 0;
        $_SESSION['trolley']['items'] = array();
        require(__DIR__."/../view/header_view.php");
        require(__DIR__."/../view/login_view.php");
        require(__DIR__."/../view/footer_view.php");
    }
    else {
        require(__DIR__."/../view/header_view.php");
        require(__DIR__."/../view/login_form_view.php");
        require(__DIR__."/../view/footer_view.php");
    }
}
else {
    require(__DIR__."/../view/header_view.php");
    require(__DIR__."/../view/login_form_view.php");
    require(__DIR__."/../view/footer_view.php");
}