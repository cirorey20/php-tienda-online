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

    if (isset($_POST)) {

        // Obtener el email y la contraseña del formulario
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Crear una instancia del modelo Usuario
        $usuario = new Usuario();

        // Verificar si el email existe en la base de datos
        $usuario->setEmail($email);
        $existeUsuario = $usuario->existeEmail(); // Método que verifica si el email existe

        if ($existeUsuario) {
            // Si el usuario existe, continuar con el proceso de login
            $usuario->setPassword($password);
            $identity = $usuario->login();

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;

                if ($identity->rol == "admin") {
                    $_SESSION['admin'] = true;
                }

            } else {
                $_SESSION['error_login'] = 'Identificación fallida';
            }
        } else {
            // Si el email no existe, redirigir a la página de registro
            $_SESSION['error_login'] = 'El correo no existe, redirigiendo a registro...';
            echo '<script>window.location="'.base_url.'?controller=Usuario&action=registro"</script>';
            exit(); // Asegúrate de detener la ejecución aquí
        }

        // Redirigir a la página de usuario (después del login)
        echo '<script>window.location="'.base_url.'?controller=Usuario&action=index"</script>';
    }
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
