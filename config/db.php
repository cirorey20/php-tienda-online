<?php
//Clase estatica

// Cargar las variables del archivo .env
require_once __DIR__ . '/../vendor/autoload.php';

// Cargar Dotenv
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class Database {

  public static function conectar() {

    // Usar las variables del archivo .env
    $host = $_ENV['DB_HOST'];
    $user = $_ENV['DB_USER'];
    $pass = $_ENV['DB_PASS'];
    $db_name = $_ENV['DB_NAME'];


    $connection = new mysqli($host, $user, $pass, $db_name);
    $connection->query("SET NAMES 'utf8'");
    
    // $query = 'SELECT * From productos';
    // $result = $connection->query($query);

    // while($value = $result->fetch_object()){
    //   echo $value->nombre . '</br>';
    // }

    return $connection;
  }

}
