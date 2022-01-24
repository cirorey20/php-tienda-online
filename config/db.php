<?php
//Clase estatica

class Database {

  public static function conectar() {

    $connection = new mysqli("localhost", "root", "", "tienda_boyar");
    $connection->query("SET NAMES 'utf8'");

    return $connection;
  }

}
