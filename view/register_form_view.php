<section class="register-view-container">
    <div><?php if(isset($_GET['empty']) and $_GET['empty'] == "yes") echo "Alguno de los campos está vacío!<br>"; ?>
    <?php if(isset($_GET['filter_error']) and $_GET['filter_error'] == "yes") echo "Alguno de los campos no tiene el formato correcto!<br>"; ?></div>
    <form action="/index.php?action=register" method="post">
        <h3>Registro</h3>
        <br><input required type="text" name="username" placeholder="Nombre y apellidos">
        <br><input required type="email" name="email" placeholder="e-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$">
        <br><input required type="password" name="password" placeholder="Contraseña" maxlength="20">
        <select name="gender">
            <option hidden selected>Selecciona tu género</option>
            <option value="M">Hombre</option>
            <option value="W">Mujer</option>
            <option value="N">No binario</option>
        </select>
        <br><input required type="text" name="adress" placeholder="Dirección" maxlength="30">
        <br><input required type="text" name="city" placeholder="Población" maxlength="30">
        <br><input required type="text" name="cp" placeholder="Código Postal" pattern="\d{5}$">
        <br><button type="submit" class="button-send" id="register-submit" name="enviar">Regístrate</button>
    </form>
</section>