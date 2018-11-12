API REST ORDER
========================


Instalación 
--------------
* instalar xampp: https://www.apachefriends.org/xampp-files/7.2.9/xampp-win32-7.2.9-0-VC15-installer.exe
* instalar composer: https://getcomposer.org/Composer-Setup.exe
* descargar el proyecto y pegarlo en xampp\httpdocs
--- mongodb y elasticsearch ---
* Configurar mongoDB con xampp
https://www.roytuts.com/mongodb-php7-xampp-windows/
* MongoBundle
composer config "platform.ext-mongo" "1.6.16" && composer require alcaeus/mongo-php-adapter
https://symfony.com/doc/master/bundles/DoctrineMongoDBBundle/index.html v4
* elasticsearch
https://www.elastic.co/guide/en/elasticsearch/reference/current/windows.html

* composer install --ignore-platform-reqs => en las preguntas dar todo intro para saltar y mantener los valores por defecto
* php bin/console server:run
* acceder a http://localhost:800X/api/doc



