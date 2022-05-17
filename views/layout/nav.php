<!-- barra de navegacion -->
<nav>
  <div>

    <ul>
      <li>
        <a href="<?=base_url?>">Home</a>
      </li>
      <li>
        <a href="<?=base_url?>?controller=Usuario&action=test">TEST</a>
      </li>
    <?php if(isset($_SESSION['identity'])): ?>
      <?php if(isset($_SESSION['admin'])): ?>
        <li>
          <a href="<?=base_url?>?controller=Producto&action=gestion">Gestionar productos</a>
        </li>
        <li>
          <a href="<?=base_url?>?controller=Producto&action=pedidos">Gestionar pedidos</a>
        </li>
      <?php endif; ?>
        <li>
          <a href="<?=base_url?>?controller=Producto&action=misPedidos">Mis pedidos</a>
        </li>
        <li>
          <a href="<?=base_url?>?controller=Usuario&action=index">Panel de Control</a>
        </li>
        <li>
          <a href="<?=base_url?>?controller=Usuario&action=logout">Cerrar Sesión</a>
        </li>
        <h4> <?= $_SESSION['identity']->nombre ?> </h4>
    <?php else: ?>
        <li>
        <!-- index.php?controller=$1&action=$2 -->
          <a href="<?=base_url?>?controller=Usuario&action=login">Login</a>
        </li>
        <li>
          <a href="<?=base_url?>?controller=Usuario&action=registro">Registrarse</a>
        </li>
    <?php endif; ?>
  </ul>
  <?php
    if(isset($_SESSION['carrito'])) {
  ?>
      <p><a href="<?=base_url?>?controller=Carrito&action=index">carrito</a><?php echo count($_SESSION['carrito']); ?>  </p>
  <?php
    } else {
  ?>
      <p>carrito</p>
  <?php
    }

  ?>


  </div>
</nav>
