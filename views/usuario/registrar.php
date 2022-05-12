<h1>Registrate</h1>
<?= isset($_SESSION['register']) ? $_SESSION['register'] : ''?>
<?php Utils::deleteSession('register');?>
<form action="<?= base_url?>usuario/save" method="post">
    <div>
        <label for="nombre_usuario">Nombre de usuario</label>
        <input type="text" name="nombre_usuario" id="nombre_usuario">
    </div>
    <div>
        <label for="contrasena">Contraseña</label>
        <input type="text" name="contrasena" id="contrasena">
    </div>
    <div>
        <label for="confirmar_contrasena">Confirmar Contraseña</label>
        <input type="text" name="confirmar_contrasena" id="confirmar_contrasena">
    </div>

    <button type="submit">Guardar</button>
</form>