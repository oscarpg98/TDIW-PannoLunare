<section class="login-view-container">
    <form action="/index.php?action=login" method="post">
        <h3>Inicio de Sesión</h3>
        <input required type="email" name="email" placeholder="e-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$">
        <input required type="password" name="password" placeholder="Contraseña">
        <button type="submit" class="button-send" id="login-submit" name="enviar">Iniciar Sesión</button>
    </form>
</section>