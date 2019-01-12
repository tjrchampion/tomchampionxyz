<?php

/**
 * Define out your routes paths and your Controllers
 */

$app->get('/', 'HomeController:index');
$app->post('/', 'HomeController:update')->setName('update');