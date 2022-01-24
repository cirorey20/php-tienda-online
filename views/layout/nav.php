<!-- barra de navegacion -->
<nav>
  <div>

    <ul>
      <li>
        <a href="<?=base_url?>">Home</a>
      </li>
    <?php if(isset($_SESSION['identity'])): ?>
      <?php if(isset($_SESSION['admin'])): ?>
        <li>
          <a href="<?=base_url?>Producto/gestion">Gestionar productos</a>
        </li>
        <li>
          <a href="<?=base_url?>Producto/pedidos">Gestionar pedidos</a>
        </li>
      <?php endif; ?>
        <li>
          <a href="<?=base_url?>Producto/misPedidos">Mis pedidos</a>
        </li>
        <li>
          <a href="<?=base_url?>Usuario/index">Panel de Control</a>
        </li>
        <li>
          <a href="<?=base_url?>Usuario/logout">Cerrar Sesión</a>
        </li>
        <h4> <?= $_SESSION['identity']->nombre ?> </h4>
    <?php else: ?>
        <li>
          <a href="<?=base_url?>Usuario/login">Login</a>
        </li>
        <li>
          <a href="<?=base_url?>Usuario/registro">Registrarse</a>
        </li>
    <?php endif; ?>
  </ul>
  <?php
    if(isset($_SESSION['carrito'])) {
  ?>
      <p>carrito  <?php echo count($_SESSION['carrito']); ?>  </p>
  <?php
    } else {
  ?>
      <p>carrito</p>
  <?php
    }

  ?>


  </div>
</nav>
