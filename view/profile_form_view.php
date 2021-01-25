<section class="profile-container">
    <h2>Modificar mi perfil</h2><br>
    <h4>Modificar información personal</h4><br>
    <?php if ($emptyPass) echo "<p class='error_pass'>Introduce una contraseña para guardar los cambios.</p><br>"; ?>
    <form action="/index.php?action=profile" method="POST">
        <label for="username">Nombre y apellidos</label><input type="text" name="username" id="username" value="<?php echo $_SESSION['username']; ?>">
        <br><label for="email">e-mail</label><input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" value="<?php echo $_SESSION['email']; ?>">
        <br><label for="password">Contraseña</label><input type="password" placeholder="Introduce una contraseña..." name="password" id="password" maxlength="20">
        <br><label for="gender">Género</label>
        <select name="gender">
            <option <?php if($_SESSION['gender'] == "M") echo "selected"; ?> value="M">Hombre</option>
            <option <?php if($_SESSION['gender'] == "W") echo "selected"; ?> value="W">Mujer</option>
            <option <?php if($_SESSION['gender'] == "N") echo "selected"; ?> value="N">No binario</option>
        </select>
        <br><label for="adress">Dirección</label><input type="text" name="adress" id="adress" maxlength="30" value="<?php echo $_SESSION['adress']; ?>">
        <br><label for="city">Población</label><input type="text" name="city" id="city" maxlength="30" value="<?php echo $_SESSION['city']; ?>">
        <br><label for="cp">Código Postal</label><input type="text" name="cp" id="cp" pattern="\d{5}$" value="<?php echo $_SESSION['cp']; ?>">
        <br><input type="submit" class="button-send" id="profile-submit" name="profile-submit" value="Guardar cambios">
    </form><br><br>
    <h4>Cambiar foto de perfil</h4><br>
    <?php if(isset($_SESSION['image'])){ ?><img src="<?php echo $GLOBALS['filesPublicPath'].$_SESSION['image']; ?>" id="profile-pic" alt="<?php echo "Foto de perfil de ".$_SESSION['username']; ?>"><?php } ?>
    <form action="/index.php?action=profile" method="post" enctype="multipart/form-data">
        <input required type="file" name="profile-image">
        <br><input type="submit" class="button-send" name="image-submit" id="image-submit" value="Actualizar foto">
    </form><br>
</section>