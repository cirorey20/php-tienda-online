<h1>Carrito</h1>
<?php
$ele = $_SESSION['carrito'];
if (!isset($ele)) {
  echo "No hay productos en el carrito";
} else {
    echo "<a href='?controller=Carrito&action=delete_all'>Limpiar Carrito</a>";
    echo "</br></br>";
    // var_dump($ele);
    foreach($ele as $item => $value) {
        echo "</br>";
        echo "Producto: ".$value['nombre']." Cantidad: ".$value['unidades']." Precio: $".$value['precio']*$value['unidades'].".00";
    }
    echo "</br></br>";
    $total = 0;
    foreach($ele as $item => $value) {
        $total = $total+$value['precio']*$value['unidades'];
    }
    echo "total: $".$total.".00";
    echo "</br>";
    
    if(isset($_SESSION['identity'])) {
        // El usuario está logueado, mostrar el enlace de "Realizar Compra"
        echo "<a href='?controller=Carrito&action=compra'>Realizar Compra</a>";
    } else {
        // El usuario no está logueado, redirigir al login
        echo "<a href='?controller=Usuario&action=login'>Inicia sesión para comprar</a>";
    }
}
?>