<?php

class Usuario {
  	private $id;
	private $nombre;
	private $apellido;
	private $email;
	private $password;
	private $rol;
	private $imagen;
  	private $fecha;
	private $db;


	public function __construct() {
		$this->db = Database::conectar();
	}

	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getApellido() {
		return $this->apellido;
	}

	function getEmail() {
		return $this->email;
	}

	function getPassword() {
		return password_hash(
      $this->db->real_escape_string($this->password),
      PASSWORD_BCRYPT, ['cost' => 4]
    );
	}

	function getRol() {
		return $this->rol;
	}

	function getImagen() {
		return $this->imagen;
	}

  function getFecha() {
    return $this->fecha;
  }

  function setFecha($fecha) {
    $this->fecha = $fecha;
  }

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
    $this->nombre = $this->db->real_escape_string($nombre);
	}

	function setApellido($apellido) {
		$this->apellido = $this->db->real_escape_string($apellido);
	}

	function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
	}

	function setPassword($password) {
    //probablemente esto me de error luego
		$this->password = $password;
	}

	function setRol($rol) {
		$this->rol = $this->db->real_escape_string($rol);
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
	}

  public function save() {

    $sql = " INSERT INTO usuarios(
                  nombre,
                  apellido,
                  email,
                  password,
                  rol,
                  fecha
                )
                VALUES(
                  '{$this->getNombre()}',
                  '{$this->getApellido()}',
                  '{$this->getEmail()}',
                  '{$this->getPassword()}',
                  '{$this->getRol()}',
                  CURDATE()
                );";

          $save = $this->db->query($sql);

      		$result = false;
      		if($save){
      			$result = true;
      		}
      		return $result;
  }

  public function login() {

    $result = false;
    $email = $this->email;
    $password = $this->password;
    //comprobar si existe el usuario
	// echo "</br>";
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = $this->db->query($sql);

	// var_dump($login->fetch_object());
	// $user = $login->fetch_object();
	// echo "</br>";
	// echo $user->email;
	// echo "</br>";

	// echo "</br>";
	// echo "</br>";
	// var_dump($login->num_rows);

    if($login && $login->num_rows == 1) {
      $usuario = $login->fetch_object();

	  
      //verificar la contraseña
      $verify = password_verify($password, $usuario->password);
	//   var_dump(password_verify('1234', '1234'));
    //   echo "</br>";

      if($verify == true) {
        $result = $usuario;
      }
    }
    return $result;

  }


}






//espacio
