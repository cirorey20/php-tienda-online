<?php

class Utils {

  public static function deleteSession($nombre) {
    if (isset($_SESSION[$nombre])) {
      $_SESSION[$nombre] = null;
      unset($_SESSION[$nombre]);
    }
  }

  public static function isAdmin() {
    /*
      Esta funcion la debo usar en todas partes
      donde quiero comprobar si un usuario es administrador
      o no. por ejemplo en el controlador de crear un producto
      nuevo o crear una categoria nueva
    */
    if (!isset($_SESSION['admin'])) {
      header("Location:".base_url);
    } else {
      return true;
    }
  }

}
