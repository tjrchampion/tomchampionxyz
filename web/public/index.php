<?php

require __DIR__ . '/../bootstrap/app.php';
require __DIR__ . '/../bootstrap/container.php';
require __DIR__ . '/../bootstrap/database.php';
require __DIR__ . '/../bootstrap/tests.php'; //load the db first
require __DIR__ . '/../routes/routes.php';


$app->run();