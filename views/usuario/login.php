

  <h1>Login</h1>
  <?php
  //"base_url ?controller=Usuario&action=login"
  ?><!-- index.php?controller=$1&action=$2 -->
  <form action="<?=base_url?>?controller=Usuario&action=accederLogin" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" required><br>

    <label for="password">Contraseña</label>
    <input type="password" name="password" required><br>

    <input type="submit" name="" value="Enviar">

  </form>
