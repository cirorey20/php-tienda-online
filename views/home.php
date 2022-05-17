<?php


  while ($product = $productos->fetch_object()) {
    echo$product->nombre."<br/>";
    echo$product->descripcion."<br/>";
    echo$product->precio;?>
    <a href="<?=base_url?>?controller=Carrito&action=add&id=<?=$product->id?>">Agregar</a>
    <?php
    echo "<br/>"."<br/>";
  }
