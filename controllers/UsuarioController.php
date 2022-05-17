<?php
require_once 'models/usuario.php';
ob_start();

class UsuarioController {
  public function index() {
      require_once 'views/usuario/index.php';
  }


  public function registro() {
    require_once 'views/usuario/registro.php';
  }

  public function login() {
    require_once 'views/usuario/login.php';
  }


  public function guardar() {
    if(isset($_POST)) {

      /*aca solo compruebo si existe el dato y si no esta vacio
        igualmente se puede hacer una validacion mas compleja
        y mejor
      */
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
      $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
      $email = isset($_POST['email']) ? $_POST['email'] : false;
      $password = isset($_POST['password']) ? $_POST['password'] : false;

      if ($nombre && $apellido && $email && $password) {


        $usuario = new Usuario();

        $usuario->setNombre($nombre);
        $usuario->setApellido($apellido);
        $usuario->setEmail($email);
        $usuario->setPassword($password);
        $usuario->setRol('user');

        //AQUI HAGO UN VAR_DUMP DE LO QUE ME VA A LLEGAR
        // echo "<pre>";
        // var_dump($usuario);
        // exit();
        // echo "</pre>";

        //------------------------------------
        /*Ahora solo me queda usar el metodo save()
        que hice en mi modelo Usuario
        */
        $datosGuardados = $usuario->save();
        if($datosGuardados) {
          $_SESSION['register'] = "Complete";
        } else {
          $_SESSION['register'] = "Failed";
        }

      } else {
          $_SESSION['register'] = "Failed";
      }

    } else {
      $_SESSION['register'] = "Failed";
    }
    // header("Location:".base_url.'?controller=Usuario&action=registro');
    echo '<script>window.location="'.base_url.'?controller=Usuario&action=registro"</script>';
  }

  public function accederLogin() {

    if(isset($_POST)) {


      //identificar al usuario
      //consulta a la base de datos

      $usuario = new Usuario();

      // echo $_POST['password'];

      $usuario->setEmail($_POST['email']);
      $usuario->setPassword($_POST['password']);

      $identity = $usuario->login();
      
      // var_dump($usuario->getEmail());
      // echo "</br>";

      if ($identity && is_object($identity)) {
        $_SESSION['identity'] = $identity;

        if ($identity->rol == "admin") {
          $_SESSION['admin'] = true;
        }
      } else {
        $_SESSION['error_login'] = 'identificacion fallida';
      }

      //crear un sesion
    }
    // header("Location:".base_url.'?controller=Usuario&action=index');
    echo '<script>window.location="'.base_url.'?controller=Usuario&action=index"</script>';
  }

  public function test() {
    echo '<script>window.location="'.base_url.'"</script>';
  }

  public function logout(){
    if (isset($_SESSION['identity'])) {
      unset($_SESSION['identity']);
    }
    if (isset($_SESSION['admin'])) {
      unset($_SESSION['admin']);
    }
    // header("Location:".base_url);
    echo '<script>window.location="'.base_url.'"</script>';
  }

} //fin de la clase


//
