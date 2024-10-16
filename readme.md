# Proyecto Tienda Online

Este es un proyecto básico de tienda en línea utilizando PHP y MySQL.

## Requisitos

- **PHP**: Versión 7.4 o superior
- **MySQL**: Servidor de base de datos
- **XAMPP** (o cualquier entorno que incluya Apache y MySQL)
- **Composer**: Para la gestión de dependencias PHP
- **Navegador web**: Para acceder a la aplicación.

## Configuración del Proyecto

### 1. Clonar el Repositorio

Primero, clona este repositorio en tu entorno local:

```bash
git clone https://github.com/tu_usuario/tienda-online.git

```

### 2. Instalar Composer
Si no tienes Composer instalado, puedes descargarlo aquí.

Después de instalar Composer, navega hasta la carpeta del proyecto y ejecuta:

### 3. Configurar la Base de Datos
Crear la Base de Datos:

Accede a phpMyAdmin o usa la consola de MySQL para crear la base de datos que usará el proyecto.


```bash
CREATE DATABASE tienda_boyar;
```

Crear las Tablas y Registros:

Dentro de la carpeta creando-bd-tablas, encontrarás un archivo SQL que contiene las sentencias para crear las tablas y algunos registros iniciales. Puedes importarlo en phpMyAdmin o desde la consola MySQL.

```bash
mysql -u root -p tienda_boyar < creando-bd-tablas/crear-tablas.sql
```

Si usas phpMyAdmin:

Abre http://localhost/phpmyadmin/
Selecciona la base de datos tienda_boyar
Usa la opción "Importar" y selecciona el archivo crear-tablas.sql.

### 4. Configurar las Variables de Entorno
El proyecto utiliza un archivo .env para manejar las credenciales de la base de datos de manera segura.

Crear un archivo .env en la raiz del proyecto y pegar las variables del .env.example

### 5. Iniciar el Proyecto
Una vez configurada la base de datos y actualizados los parámetros de conexión:

- Inicia los servicios de Apache y MySQL desde el panel de control de XAMPP.
- Coloca los archivos del proyecto dentro del directorio htdocs de XAMPP.
- Accede al proyecto desde el navegador en la URL: http://localhost/tu-proyecto.
- Si todo está configurado correctamente, deberías ver la página principal de tu tienda en línea.

Estructura del Proyecto
- config/: Contiene la configuración de la base de datos.
- controllers/: Controladores de la aplicación.
- models/: Modelos de la base de datos.
- views/: Vistas de la aplicación.
- creando-bd-tablas/: Contiene los scripts SQL para crear la base de datos y tablas, así como algunos registros de prueba.
Notas Adicionales
- Asegúrate de que los servicios de Apache y MySQL estén ejecutándose en XAMPP.
- Si tienes problemas de conexión, verifica los parámetros en config/db.php y las credenciales de MySQL.
- Puedes modificar o extender las tablas y datos utilizando los archivos SQL proporcionados en la carpeta creando-bd-tablas.
