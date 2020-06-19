<?php

require __DIR__ . '/../bootstrap/app.php';
require __DIR__ . '/../bootstrap/database.php';
require __DIR__ . '/../bootstrap/tests.php'; //load the db first
require __DIR__ . '/../bootstrap/container.php';
require __DIR__ . '/../bootstrap/controllers.php';
require __DIR__ . '/../config/settings.php';
require __DIR__ . '/../routes/web.php';


$app->run();