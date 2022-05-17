<h1>Gestionar Productos</h1>

<?php if(isset($_SESSION['productoNuevo']) && $_SESSION['productoNuevo'] == 'completo'): ?>
  <strong class="alert-gren">El Producto se creo correctamente</strong><br>
  <?php Utils::deleteSession('productoNuevo'); ?>
<?php endif; ?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
  <strong class="alert-gren">El Producto se borro correctamente</strong><br>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
  <strong class="alert-gren">El Producto NO se borro correctamente</strong><br>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<?php if(isset($_SESSION['productoActualizado']) && $_SESSION['productoActualizado'] == 'completo'): ?>
  <strong class="alert-gren">El Producto se actualizo correctamente</strong><br>
<?php elseif(isset($_SESSION['productoActualizado']) && $_SESSION['productoActualizado'] == 'fallo'): ?>
  <strong class="alert-gren">El Producto NO se actualizo correctamente</strong><br>
<?php endif; ?>
<?php Utils::deleteSession('productoActualizado'); ?>


<a href="<?=base_url?>?controller=Producto&action=crear">Crear Nuevo producto</a><br><br>

<?php

  while ($product = $productos->fetch_object()) {
    echo$product->nombre."<br/>";
    echo$product->descripcion."<br/>";
    echo$product->precio."<br/>";?>
    <a href="<?=base_url?>?controller=Producto&action=eliminar&id=<?=$product->id?>">eliminar</a><br>
    <a href="<?=base_url?>?controller=Producto&action=editar&id=<?=$product->id?>">editar</a><br><br>

  <?php
  }
?>
