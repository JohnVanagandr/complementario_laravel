# Requisitos minimos para poder instalar el proyecto en casa

-   Tener instalado php 8.2
-   Tener un servidor apache
-   Crear una base de datos y poder administrarla

Importante compie y modifique el archivo .env.example a .env con sus credenciales de conexión a la base de datos y envio de correos

## Comandos a ejecutar en la terminal

Ejecute el siguiente comando para instalar todas las dependencias de laravel.

```
composer install
```

Ejecute el siguiente comando para instalar las dependencias o plugins de vite

```
npm install
```

Ejecute el siguiente comando para crear las tablas y poblarlas de datos.
El comando creara las tablas del proyecto y llenara las tablas basicas para realizar las pruebas requeridas

```
php artisan:migrate --seed
```

Señores estudien el código y ojalá tengan muchas preguntas para el sabado 24 de Agosto, ultimo dia del complementario

### Temas tratados en el proyecto "se despejaran dudas el sabado que miremos detenidamente el código fuente"

-   php 8.2
-   instalación de laravel
-   carpetas basicas
-   diseño de base de datos
-   relaciones ORM
-   consultas:
    -   uno a uno
    -   uno a muchos
    -   muchos a muchos
    -   relaciones polimorficas
-   creacioón de modelos
-   creación de controladores
-   rutas
-   validaciones
-   manejo de roles y permisos
-   manejo de permisos por roles
-   proteger las rutas
-   polices, protección de modelos
-   creación de datos semilla para pruebas
-   instalación de complementos por la terminal
-   creación de servicios y como iniciar a trabajar con un código limpio
-   creación de layouts
-   instalación de modulos para JavaScript

# Usuario Super Administrador

-   Usuario: jfbeccera@gmail.com
-   Contrasena: Administrador

# Usuario Administrador

-   Usuario: mbecaria@gmail.com
-   Contraseña: Administrador

# Usuarios clientes

-   Contraseña: password
