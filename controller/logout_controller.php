<?php

if(!isset($_SESSION['id_user'])) session_start();
session_unset();
session_destroy();

header("Location: /index.php?action=mainpage");
exit();