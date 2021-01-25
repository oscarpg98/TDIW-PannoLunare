<?php
require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__ ."/../model/users_model.php");

if (isset($_SESSION['id_user'])) {
    //Declaramos en la variable $_SESSION los datos del usuario para precargarlos en el formulario de modificación del perfil.
    $conn = connectDB();
    $user = getUserbyId($conn, $_SESSION['id_user']);
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['gender'] = $user['gender'];
    $_SESSION['adress'] = $user['adress'];
    $_SESSION['city'] = $user['city'];
    $_SESSION['cp'] = $user['cp'];
    if(isset($user['profile_image'])) $_SESSION['image'] = $user['profile_image'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['profile-image']) && !empty($_FILES['profile-image'])){
            $imageName = $_FILES['profile-image']['name'];
            $imageTmpName = $_FILES['profile-image']['tmp_name'];
            $imageError = $_FILES['profile-image']['error'];

            $imageExt = explode('.', $imageName);
            $realImageExt = strtolower(end($imageExt));
            $allowedExt = array('jpg', 'jpeg', 'png');

            if (in_array($realImageExt, $allowedExt)) {
                if ($imageError === 0){
                    $id_user = $_SESSION['id_user'];
                    $newImageName = "profile".$id_user.".".$realImageExt;
                    $imageDestination = $GLOBALS['filesAbsolutePath'].$newImageName;
                    uploadImageinDB($conn, $newImageName, $id_user);
                    move_uploaded_file($imageTmpName, $imageDestination);
                    require_once(__DIR__."/../view/header_view.php");
                    require(__DIR__."/../view/upload_view.php");
                    require_once(__DIR__."/../view/footer_view.php");
                } else echo "Ha habido un error subiendo la imagen!";
            } else echo "Tú imagen no tiene una extensión permitida. [jpg/png]";
        }
        elseif($_POST['profile-submit']) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];
            $adress = $_POST['adress'];
            $city = $_POST['city'];
            $cp = $_POST['cp'];
            $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
            if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)) {
                $current_email = $_SESSION['email'];
                $id_array = getUser($conn, $current_email);
                $id = $id_array['id_user'];
                if (modifyUser($conn, $username, $email, $encryptedPassword, $gender, $adress, $city, $cp, $id)) require(__DIR__ . "/../view/profile_view.php");
                else {
                    require_once(__DIR__ . "/../view/header_view.php");
                    require(__DIR__ . "/../view/profile_view.php");
                    require_once(__DIR__ . "/../view/footer_view.php");
                }
            }
            else {
                require_once(__DIR__ . "/../view/header_view.php");
                //Esta variable controla si he introducido una contraseña para poder modificar correctamente el perfil.
                $emptyPass = true;
                require(__DIR__ . "/../view/profile_form_view.php");
                require_once(__DIR__ . "/../view/footer_view.php");
            }
        }
    }
    else {
        require_once(__DIR__ . "/../view/header_view.php");
        //Declaro aqui esta variable para evitar un warning notice por no estar inicializada la primera vez que se llama al profile_form_view.
        $emptyPass = false;
        require(__DIR__ . "/../view/profile_form_view.php");
        require_once(__DIR__ . "/../view/footer_view.php");
    }
}
else {
    require_once(__DIR__ . "/../view/header_view.php");
    require(__DIR__ . "/../controller/category_list_controller.php");
    require_once(__DIR__ . "/../view/footer_view.php");
}