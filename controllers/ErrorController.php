<?php
/*Este mensaje de error se va a imprimir cada vez que haya una
  ruta que no se encuentre en el proyecto
*/
class ErrorController {
  public function index() {
    echo "<h1>404: La página que buscas no existe</h1>";
  }
}
