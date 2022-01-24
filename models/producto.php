<?php

class Producto {
  private $id;
	private $nombre;
	private $descripcion;
	private $precio;
	private $stock;
	private $oferta;
	private $img;
  private $fecha;
  private $categoria_id;

	private $db;


	public function __construct() {
		$this->db = Database::conectar();
	}
  function getId() {
		return $this->id;
	}

	function getCategoria_id() {
		return $this->categoria_id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getDescripcion() {
		return $this->descripcion;
	}

	function getPrecio() {
		return $this->precio;
	}

	function getStock() {
		return $this->stock;
	}

	function getOferta() {
		return $this->oferta;
	}

	function getFecha() {
		return $this->fecha;
	}

	function getImagen() {
		return $this->img;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setCategoria_id($categoria_id) {
		$this->categoria_id = $categoria_id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setDescripcion($descripcion) {
		$this->descripcion = $this->db->real_escape_string($descripcion);
	}

	function setPrecio($precio) {
		$this->precio = $this->db->real_escape_string($precio);
	}

	function setStock($stock) {
		$this->stock = $this->db->real_escape_string($stock);
	}

	function setOferta($oferta) {
		$this->oferta = $this->db->real_escape_string($oferta);
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	function setImg($imagen) {
		$this->img = $imagen;
	}

  //acciones con consultas sql

  public function getAll() {
		$allProductos = "SELECT * FROM productos ORDER BY id DESC;";
    $productos = $this->db->query($allProductos);
    return $productos;
	}

  public function getOne() {
		$producto = $this->db->query("SELECT * FROM productos WHERE id ={$this->getId()}");
    return $producto->fetch_object();
	}

  public function save() {
    $sql = " INSERT INTO productos(
                  nombre,
                  descripcion,
                  precio,
                  stock,
                  oferta,
                  img,
                  fecha,
                  categoria_id
                )
                VALUES(
                  '{$this->getNombre()}',
                  '{$this->getDescripcion()}',
                   {$this->getPrecio()},
                   {$this->getStock()},
                  '{$this->getOferta()}',
                  '{$this->getImagen()}',
                   CURDATE(),
                   {$this->getCategoria_id()}
                );";

    //var_dump($sql);
    //exit();
    $result = false;
    $guardado = $this->db->query($sql);

    // var_dump($guardo);
    // exit();
    
    if($guardado) {
      $result = true;
    }
    return $result;
  }

  public function edit() {
    $sql = " UPDATE productos SET
                  nombre='{$this->getNombre()}',
                  descripcion='{$this->getDescripcion()}',
                  precio={$this->getPrecio()},
                  stock={$this->getStock()},
                  img='{$this->getImagen()}',
                  fecha=CURDATE(),
                  categoria_id={$this->getCategoria_id()},
                  oferta='{$this->getOferta()}'
              WHERE id = $this->id;
            ";


    $save = $this->db->query($sql);

    $result = false;
    if($save) {
      $result = true;
    }
    return $result;
  }

  public function delete() {

    $sql = "DELETE FROM productos WHERE id={$this->id}";
    $delete = $this->db->query($sql);

    $result = false;
    if($delete) {
      $result = true;
    }
    return $result;

  }


}//Fin de la clase











//
