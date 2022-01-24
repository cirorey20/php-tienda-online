<h1>Registrarse</h1>

<?php if( isset($_SESSION['register']) && $_SESSION['register'] == 'Complete' ) : ?>
    <strong class="alert-gren">Registro completado correctamente</strong>
<?php elseif( isset($_SESSION['register']) && $_SESSION['register'] == 'Failed' ): ?>
    <strong class="alert-red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>Usuario/guardar" method="post">
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" ><br>

  <label for="apellido">Apellido</label>
  <input type="text" name="apellido" ><br>

  <label for="email">Email</label>
  <input type="email" name="email" ><br>

  <label for="password">Contraseña</label>
  <input type="password" name="password" ><br>

  <input type="submit" name="" value="Enviar">

</form>
