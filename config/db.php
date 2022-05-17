<?php
//Clase estatica

class Database {

  public static function conectar() {

    $connection = new mysqli('mysql_db', 'root', 'root', 'tienda_boyar');
    $connection->query("SET NAMES 'utf8'");
    
    // $query = 'SELECT * From productos';
    // $result = $connection->query($query);

    // while($value = $result->fetch_object()){
    //   echo $value->nombre . '</br>';
    // }

    return $connection;
  }

}
