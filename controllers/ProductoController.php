<?php
require_once 'models/producto.php';
class ProductoController {
  public function index() {
    //aqui cargo los productos para que se vean en views
    //echo "Controller Producto, action index";
    //require_once 'views/producto/index.php';
    $producto = new Producto();
    $productos = $producto->getAll();

    //var_dump($productos);
    require_once 'views/home.php';
  }
  public function gestion() {
    Utils::isAdmin();


    $producto = new Producto();
    $productos = $producto->getAll();

    // var_dump($productos);
    require_once 'views/producto/gestion.php';
    // exit();
  }
  public function crear() {
    Utils::isAdmin();
    require_once 'views/producto/crear.php';
  }

  public function guardar() {
    if(isset($_POST)) {


      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $precio = $_POST['precio'];
      $stock = $_POST['stock'];
      $oferta = $_POST['oferta'];
      $categoria_id = $_POST['categoria_id'];

      $producto = new Producto();
      $producto->setNombre($nombre);
      $producto->setDescripcion($descripcion);
      $producto->setPrecio($precio);
      $producto->setStock($stock);
      $producto->setOferta($oferta);
      $producto->setCategoria_id($categoria_id);

      // var_dump($_FILES);
      // exit();
      //APARTADO DE GUARDAR ARCHIVO IMAGEN
      if( isset($_FILES['img']) ) {

        $file = $_FILES['img']; //el nombre de dentro de files es el name que puse en el formulario
        $fileName = $file['name'];
        $mimetype = $file['type'];



        if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png') {
          //si se cumple que la imagen tiene uno de esos formatos

          if (!is_dir('assets/images/')) {//entonces pregunto si NO existe la carpeta assets/images

            mkdir('assets/images/', 0777, true);

          }
          $producto->setImg($fileName);//guardo el nombre de la imagen en la bd
          //entonces ahora si le paso el archivo a ese directorio
          move_uploaded_file($file['tmp_name'], 'assets/images/'.$fileName);
        }

      }

      if( isset($_GET['id']) ) {
        $id = $_GET['id'];
        $producto->setId($id);
        $guardar = $producto->edit();

      } else {

        $guardar = $producto->save();
      }
      // var_dump($producto);
      // exit();




      if($guardar) {
        $_SESSION['productoNuevo'] = "completo";
        // header("Location:".base_url.'Producto/gestion');
        echo '<script>window.location="'.base_url.'?controller=Producto&action=gestion"</script>';
      } else {
        $_SESSION['productoNuevo'] = "fallo";
          // header("Location:".base_url.'Producto/crear');
          echo '<script>window.location="'.base_url.'?controller=Producto&action=crear"</script>';
      }

    } else {
      // header("Location:".base_url.'Producto/crear');
      echo '<script>window.location="'.base_url.'?controller=Producto&action=crear"</script>';
    }
  }

  public function actualizar() {

    if ($_POST) {

      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $precio = $_POST['precio'];
      $stock = $_POST['stock'];

      // $img = $_POST['img']; //EL ARCHIVO LO HAGO ABAJO
      $fecha = $_POST['fecha'];
      $categoria = $_POST['categoria'];
      $oferta = $_POST['oferta'];

      $producto = new Producto();
      $producto->setNombre($nombre);
      $producto->setDescripcion($descripcion);
      $producto->setPrecio($precio);
      $producto->setStock($stock);

      // $producto->setImg($img); // EL ARCHIVO LO SETEO ABAJO
      $producto->setFecha($fecha);
      $producto->setCategoria_id($categoria);
      $producto->setOferta($oferta);

      //APARTADO DE GUARDAR ARCHIVO IMAGEN
      if( isset($_FILES['img']) ) {

        $file = $_FILES['img']; //el nombre de dentro de files es el name que puse en el formulario
        $fileName = $file['name'];
        $mimetype = $file['type'];

        // var_dump($file);
        // exit();

        if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png') {
          //si se cumple que la imagen tiene uno de esos formatos
          if (!is_dir('assets/')) {//entonces pregunto si NO existe la carpeta assets/images

            mkdir('assets/images/', 0777, true);//Creo las carpetas assets/images

          }
          $producto->setImg($fileName);//guardo el nombre de la imagen en la bd
          //entonces ahora si le paso el archivo a ese directorio
          move_uploaded_file($file['tmp_name'], 'assets/images/'.$fileName);
        }

      }
      if( isset($_GET['id']) ) {
        $id = $_GET['id'];      //ARCHIVO
        $producto->setId($id);
        $guardar = $producto->edit();
        // var_dump($producto);
      }

      if($guardar) {
        $_SESSION['productoActualizado'] = "completo";
        // header("Location:".base_url.'Producto/gestion');
        echo '<script>window.location="'.base_url.'?controller=Producto&action=gestion"</script>';
      } else {
        $_SESSION['productoActualizado'] = "fallo";
          // header("Location:".base_url.'Producto/edicion');
          echo '<script>window.location="'.base_url.'?controller=Producto&action=edicion"</script>';
      }

      } else {
        // header("Location:".base_url.'Producto/edicion');
        echo '<script>window.location="'.base_url.'?controller=Producto&action=edicion"</script>';
      }



  }

  public function eliminar() {

    Utils::isAdmin();
    if( isset($_GET['id']) ) {
      $id = $_GET['id'];
      $producto = new Producto();
      $producto->setId($id);
      $delete = $producto->delete();

      if ($delete) {
        $_SESSION['delete'] = "complete";
      } else {
        $_SESSION['delete'] = "failed";
      }
    } else {
      $_SESSION['delete'] = "failed";
    }
    // header('Location:'.base_url.'Producto/gestion');
    echo '<script>window.location="'.base_url.'?controller=Producto&action=gestion"</script>';
  }

  public function editar() {

    Utils::isAdmin();

    if( isset($_GET['id']) ) {
      $id = $_GET['id'];
      $editar = true;

      $producto = new Producto();
      $producto->setId($id);
      $pro = $producto->getOne();

      require_once 'views/producto/edicion.php';

    } else {
      // header('Location:'.base_url.'Producto/gestion');
      echo '<script>window.location="'.base_url.'?controller=Producto&action=gestion"</script>';
    }


  }

}//Fin de clase















//
