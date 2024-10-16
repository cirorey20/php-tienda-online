<?php
require_once 'models/producto.php';
class CarritoController {
  public function index() {
    
    // $ele = $_SESSION['carrito'];
    // if (!isset($ele)) {
    //   echo "No hay productos en el carrito";
    // } else {
    //   var_dump($ele);
    //   // echo "</br>";
    //   // echo "<a href='?controller=Carrito&action=delete_all'>limiar carrito</a>";
    // }
    require_once 'views/carrito/index.php';
  }


  public function add() {

    if (isset($_GET['id'])) {//comprabamos si existe el parametro id en el GET?
      //debemos recoger el id del producto por la url
      $producto_id = $_GET['id'];//guardamos el id en la variable

    } else {// si no existe ese id del producto redirigimos
      header('Location:'.base_url);
    }

    if(isset($_SESSION['carrito'])) { //comprobamos si existe la session del carrito
      $counter = 0;

      foreach ($_SESSION['carrito'] as $key => $ele) {
        if ($ele['id_producto'] == $producto_id) {//si el id del GET coincide con el id del elemento que estamos recorriendo
          $_SESSION['carrito'][$key]['unidades']++;
          $counter++;
        }
      }

    }

    /*
      En esta parte teniendo en cuenta que 0 es igual a false
      y 1 es igual a true podemos crear esta condicion
    */
    if ( $counter == false || $counter == 0) {

      //conseguir producto
      $producto = new Producto();
      $producto->setId($producto_id);//seteamos el id del GET
      $producto = $producto->getOne();//llamamos al producto con ese id

      if(is_object($producto)) {//si el producto que creamos es un objeto

        //pusheamos el valor que tenemos en $producto dentro de la session['carrito']
        $_SESSION['carrito'][] = array(
          "id_producto" => $producto->id,
          "nombre" => $producto->nombre,
          "precio" => $producto->precio,
          "unidades" => 1
        );
      }
    }

  // header('Location:'.base_url."Carrito/index");
  echo '<script>window.location="'.base_url.'"</script>';
  }//fin add()

  public function remove() {
    echo "Index controlador de pedido controller";
  }

  public function compra() {
    echo "realizaste la compra con exito";
  }

  public function delete() {
    echo "Index controlador de pedido controller";
  }

  public function delete_all() {
    unset($_SESSION['carrito']);
    // header('Location:'.base_url);
    echo '<script>window.location="'.base_url.'"</script>';
  }


}//fin de la clase
