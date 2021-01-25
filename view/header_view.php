<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Panno Lunare</title>
    <meta name="viewport" content="initial-scale=1.0, width=device-width, user-scalable=yes"/>
    <link rel="stylesheet" type ="text/css" href ="/css/style.css">
    <link rel="icon" href="/img/panno_lunare_logo.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<header>
    <a href="/index.php?action=mainpage"><img src="/img/panno_lunare_logo.png" alt="Logo Panno Lunare"></a>
    <div class="login_container">
        <form action="/index.php?action=search" method="POST">
            <input type="text" name="search" placeholder="Busca un producto...">
            <button name="search-button" class="button-send" id="button-search">Buscar</button>
        </form>
        <?php if(!isset($_SESSION['id_user'])) { ?>
            <a class='login_item' href='/index.php?action=login'>Iniciar sesión</a>
            <a class='login_item' href='/index.php?action=register'>Registrarse</a>
        <?php require_once(__DIR__ . "/../rsc_trolley_icon.php");
       }
        else { ?>
            <div id='user-menu-container'>
                <img class="user-icon" src="/img/usericon.png" alt="Your Profile">
                <ul class="user-menu" style="display: none">
                    <li class="user-item"><a href="/index.php?action=profile">Modificar perfil</a></li>
                    <li class="user-item"><a href="/index.php?action=purchases">Mis compras</a></li>
                    <li class="user-item"><a href="/index.php?action=logout">Cerrar sesión</a></li>
                </ul>
                <div id="trolley_text_icon"><?php require_once(__DIR__ . "/../rsc_trolley_icon.php");?></div>
            </div>
<?php   } ?>
    </div>
</header>

<script>
    $(document).ready(function() {
        $('.user-icon').click(function() {
            $('.user-menu').toggle('400');
        })
    });
</script>