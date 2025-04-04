#COMANDOS DE PHP

<php artisan serve> => inicia el servidor de php
<npm run dev> => se debe iniciar en conjunto con el comando de php
php artisan make:model <nombre modelo> => comando para crear un modelo
php artisan make:controller  <nombre controlador> --resources => comando para crear un controlador con todas las funciones necesarias
<php artisan migrate>=> crear migraciones 
<php artisan make:migration> create_name_table => para crear tabla de migraciones


en caso de que que no funcione es que le faltan los node_modules en la terminal usar
<npm install> => REINSTALA DEPENDENCIAS DEL LOS MODULOS
en caso de tener algun error referente al proyecto de laravel usar
<composer install> => REINSTALA DEPENDENCIAS DE LARAVEL

recordar mantener el xampp activo <apache-mysql>
PD:recomiendo usar el programa <dbeaver> de lo contrario usar <phpmyadmin>
RECUERDEN QUE EL .ENV NO SE SUBE AL REPOSITORIO POR LO CUAL DEBEN CAMBIAR EL 
<.env.example> renombrarlo a <.env >

el <.env.example> ya quedo listo para que funcione despues de renombrarlo

la app key hay que generarla 
<php artisan key:generate>

 
