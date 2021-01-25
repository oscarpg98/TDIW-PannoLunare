<?php if (isset($_SESSION['username'])){
    if($_SESSION['gender'] == "M") echo "<p>Bienvenido " . $_SESSION["username"] . "!</p>";
    else if($_SESSION['gender'] == "W") echo "<p>Bienvenida " . $_SESSION["username"] . "!</p>";
    else if($_SESSION['gender'] == "N") echo "<p>Bienvenide " . $_SESSION["username"] . "!</p>";
}