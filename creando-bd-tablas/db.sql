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


CREATE TABLE categorias(
 id int(255) auto_increment not null,
 nombre varchar(255) not null,
  CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

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


CREATE TABLE direcciones(
 id    int(255) auto_increment not null,
 provincia  varchar(255) not null,
 ciudad varchar(255) not null,
 localidad varchar(255) not null,
 calle_altura    varchar(100) not null,
 calle_numero  varchar(100) not null,
 piso       varchar(50),
 c_postal    varchar(100) not null,
 
 CONSTRAINT pk_direcciones PRIMARY KEY(id)
 
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


               /*INSERTAR USUARIO*/
INSERT INTO usuarios VALUES(
  NULL,
  "Ciro",
  "Rey",
  "admin@email.com",
  "1234",
  "admin",
   null,
   CURDATE()
);

                /*INSERTAR CATEGORÍAS*/
INSERT INTO categorias VALUES(
  NULL,
  "Percusión"
);
INSERT INTO categorias VALUES(
  NULL,
  "Cuerdas"
);
INSERT INTO categorias VALUES(
  NULL,
  "Electrico"
);
INSERT INTO categorias VALUES(
  NULL,
  "Viento"
);
INSERT INTO categorias VALUES(
  NULL,
  "Acustico"
);

                  /*INSERTAR PRODUCTOS*/
INSERT INTO productos VALUES(
  NULL,
  "Guitarra",
  "Criolla Café",
  406,
  8,
  null,
  null,
  CURDATE(),
  2
);
INSERT INTO productos VALUES(
  NULL,
  "Teclado",
  "Teclado Casio Gris y Negro",
  657,
  2,
  null,
  null,
  CURDATE(),
  3
);
INSERT INTO productos VALUES(
  NULL,
  "Batería",
  "Negra",
  1206,
  1,
  null,
  null,
  CURDATE(),
  1
);
INSERT INTO productos VALUES(
  NULL,
  "Saxo",
  "Amarillo",
  806,
  4,
  null,
  null,
  CURDATE(),
  4
);

