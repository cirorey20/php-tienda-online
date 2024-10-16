<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';

//HTML-5
require_once 'views/layout/header.php';
require_once 'views/layout/nav.php';
require_once 'views/layout/contenido.php'; //contenido central

//Error pagina no encontrada
function mostrar_error() {
  $error = new ErrorController();
  $error->index();
}

//ESTO SE LLAMA CONTROLADOR FRONTAL,
if (isset($_GET['controller'])) {
  $nombre_controlador = $_GET['controller']."Controller";
} 
elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controlador = controller_default;
} 
else {
  echo "La página no existe";
  mostrar_error();
  exit();
  // exit();
}

if (class_exists($nombre_controlador)) {
  $controlador = new $nombre_controlador();

  if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
    $action = $_GET['action'];
    $controlador->$action();
  } 
  elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
      $action_default = action_default;
      $controlador->$action_default();
  } 
  else {
    echo "La página no existe";
    mostrar_error();
  }
} else {
  echo "La página no existe";
  mostrar_error();
}

require_once 'views/layout/footer.php';
