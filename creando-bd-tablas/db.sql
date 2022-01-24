CREATE DATABASE tienda_boyar;

USE tienda_boyar;

CREATE TABLE usuarios(
  id    int(255) auto_increment not null,
  nombre  varchar(255) not null,
  apellido  varchar(255) not null,
  email     varchar(255) not null,
  password  varchar(255) not null,
  rol       varchar(20),
  img       varchar(255),
  fecha     date not null,
  CONSTRAINT pk_usuarios PRIMARY KEY(id),
  CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(
  NULL,
  "Ciro",
  "Rey",
  "admin@email.com",
  "1234",
  "admin",
   null,
   CURRENT DATE
);

CREATE TABLE productos(
  id    int(255) auto_increment not null,
  nombre  varchar(255) not null,
  descripcion text not null,
  precio	float(100, 2) not null,
  stock		int (255) not null,
  oferta	varchar(2),
  img       varchar(255),
  fecha		date not null,

  categoria_id int (255) not null,

  CONSTRAINT pk_productos PRIMARY KEY(id),
  CONSTRAINT fk_producto_categoria FOREIGN KEY(
    categoria_id
) REFERENCES categorias(id)

)ENGINE=InnoDb;


CREATE TABLE pedidos(
  id    int(255) auto_increment not null,
  coste  float(200, 2) not null,
  estado varchar(255) not null,
  fecha		date not null,
  hora time not null,

  usuario_id int (255) not null,
  direccion_id int (255) not null,

  CONSTRAINT pk_pedidos PRIMARY KEY(id),

  CONSTRAINT fk_pedido_usuario FOREIGN KEY(
    usuario_id
) REFERENCES usuarios(id),

  CONSTRAINT fk_pedido_direccion FOREIGN KEY(
    direccion_id
) REFERENCES direcciones(id)

)ENGINE=InnoDb;



/*Tabla de muchos a muchos*/
CREATE TABLE lineas_pedidos(
  id    int(255) auto_increment not null,
  pedido_id   int(255) not null,
  producto_id   int(255) not null,

  CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),

  CONSTRAINT fk_linea_pedido FOREIGN KEY(
    pedido_id
  ) REFERENCES pedidos(id),

  CONSTRAINT fk_linea_producto FOREIGN KEY(
    producto_id
  ) REFERENCES productos(id)

)ENGINE=InnoDb;
