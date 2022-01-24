<?php
function controllers_autoloader($class) {
  include 'controllers/' . $class . '.php';
  //include 'models/' . $class . '.php'; esto creo que no va
}

/*este metodo lo que hace es buscar todas las clases que hay en
el directorio que le indicamos para hacer el
include automaticamente*/
spl_autoload_register('controllers_autoloader');
