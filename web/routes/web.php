<?php

/**
 * Define out your routes paths and your Controllers
 */

$app->get('/', 'AuthController:index')->setName('login');
$app->post('/', 'AuthController:update')->setName('update');

$app->get('/register', 'RegisterController:index')->setName('register');
$app->post('/register', 'RegisterController:store')->setName('store');