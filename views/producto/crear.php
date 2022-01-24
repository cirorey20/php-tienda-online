<?php if(isset($_SESSION['productoNuevo']) && $_SESSION['productoNuevo'] == 'completo'): ?>

<?php elseif(isset($_SESSION['productoNuevo']) && $_SESSION['productoNuevo'] == 'fallo'): ?>
  <strong class="alert-gren">Fallo al cargar el registro</strong>
  <?php Utils::deleteSession('productoNuevo'); ?>
<?php endif; ?>


<?php if(isset($editar)): ?>
  <h1>Editar Producto <?= $pro->nombre;?> </h1>
  <?php $url_action = base_url."Producto/guardar&id=".$pro->id; ?>
<?php else: ?>
  <h1>Crear Nuevo Producto</h1>
  <?php $url_action = base_url."Producto/guardar"; ?>
<?php endif; ?>


<form action="<?=$url_action?>" method="post" enctype="multipart/form-data">
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" value="<?= isset($pro) && is_object($pro)? $pro->nombre: ""; ?>"><br>

  <label for="descripcion">Descripcion</label>
  <input type="text" name="descripcion" value="<?= isset($pro) && is_object($pro)? $pro->descripcion: ""; ?>"><br>

  <label for="precio">Precio</label>
  <input type="number" name="precio" value="<?= isset($pro) && is_object($pro)? $pro->precio: ""; ?>"><br>

  <label for="stock">Stock</label>
  <input type="number" name="stock" value="<?= isset($pro) && is_object($pro)? $pro->stock: ""; ?>"><br>

  <label for="oferta">Oferta No/Si</label>
  <select name="oferta">
    <option> <?= isset($pro) && is_object($pro)? $pro->oferta: ""; ?></option>
    <option value="No">No</option>
    <option value="Si">Si</option>
  </select>

  <label for="img">Imagen</label>
  <?php
    if( isset($pro) && is_object($pro) && !empty($pro->img) ) {
  ?>
      <img src="<?=base_url?>assets/images/<?=$pro->img?>" alt="not-found">
  <?php
    }
  ?>
  <input type="file" name="img"><br>



  <?php
   if(isset($pro) && is_object($pro)){
  ?>
     <label for="categoria">Categoria</label>
     <input type="number" name="stock" value="<?= isset($pro) && is_object($pro)? $pro->categoria_id: ""; ?>"><br>
  <?php
   } else {
  ?>
    <label for="categoria">Categoria</label>
    <select name="categoria_id" required>
      <option value="1">Percusión</option>
      <option value="2">Viento</option>
      <option value="3">Cuerda</option>
      <option value="4">Acústico</option>
      <option value="5">Eléctrico</option>
      <option value="6">Voz</option>
    </select>
  <?php
   }

   ?>


  <input type="submit" name="" value="Enviar">

</form>
