<?php
// Incluir el autoloader de Composer para cargar las dependencias
require_once __DIR__ . '/vendor/autoload.php';

function controllers_autoloader($class) {
  $file = __DIR__ . '/controllers/' . $class . '.php';
    if (file_exists($file)) {
        include $file;
    }
  //include 'models/' . $class . '.php'; esto creo que no va
}

/*este metodo lo que hace es buscar todas las clases que hay en
el directorio que le indicamos para hacer el
include automaticamente*/
spl_autoload_register('controllers_autoloader');
