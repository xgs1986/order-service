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
* acceder a http://localhost:8000/api/doc
* arrancar servicio elastic
* comprobar elastic: http://localhost:9200
* arrancar mongodb C:\Program Files\MongoDB\Server\4.0\bin\mongod.exe

Tips 
--------------
ver indices elastic:
* http://localhost:9200/app/_search?
* http://localhost:9200/app/order/_search?
* http://localhost:9200/app/order_status/_search?
eliminar indices elastic:
* cmd => curl -XDELETE http://localhost:9200/order/
