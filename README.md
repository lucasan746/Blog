# Blog


### Instalación 🔧

_Descargar proyecto_

_Ejecutar dentro de la carpeta:_

```
composer update
```
_Luego crear archivo .env y copiar contenido de .env_example_

_Generar key con el comando:_
```
php artisan generate:key
```
_Luego generar acceso a la carpeta storage_

```
php artisan storage:link
```
_Para un mejor funcionamiento ejecutar seeders_
```
php artisan db::seed
```

_Importar base de datos y configurar en .env._

_Listo._

## Construido con 🛠️


* [Laravel](https://laravel.com/) - El framework web usado
* [Composer](https://getcomposer.org/) - Manejador de dependencias
* [Bootstrap](https://getbootstrap.com/) - CSS
* [Javascript](https://developer.mozilla.org/es/docs/Web/JavaScript) - Usado para alertas
