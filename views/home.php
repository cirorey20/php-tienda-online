<?php

  while ($product = $productos->fetch_object()) {
    echo$product->nombre."<br/>";
    echo$product->descripcion."<br/>";
    echo$product->precio;?>
    <a href="<?=base_url?>Carrito/add&id=<?=$product->id?>">Agregar</a>
    <?php
    echo "<br/>"."<br/>";
  }
