<?php if(isset($editar)): ?>
  <h1>Edicion Del Producto <?= $pro->nombre;?> </h1>
  <?php $url_action = base_url."Producto/actualizar&id=".$pro->id; ?>
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


  <label for="img">Imagen</label>
  <?php
    if( isset($pro) && is_object($pro) && !empty($pro->img) ) {
  ?>
      <img src="<?=base_url?>assets/images/<?=$pro->img?>" alt="not-found">
  <?php
    }
  ?>
  <input type="file" name="img" value="<?= isset($pro) && is_object($pro)? $pro->img: ""; ?>"><br>


  <input type="text" name="fecha" value="<?= isset($pro) && is_object($pro)? $pro->fecha: ""; ?>"><br>
  <input type="number" name="categoria" value="<?= isset($pro) && is_object($pro)? $pro->categoria_id: ""; ?>"><br>
  <input type="text" name="oferta" value="<?= isset($pro) && is_object($pro)? $pro->oferta: ""; ?>"><br>

  <input type="submit" name="" value="Enviar">

</form>
