<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
	'driver' => 'mysql',
	'host' => 'mysqldb',
	'database' => 'app',
	'username' => 'app',
	'password' => 'password',
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci'
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();
