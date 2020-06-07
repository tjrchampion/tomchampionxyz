<?php

use App\Action\CartAction;
use App\Action\CartDeleteAction;
use App\Action\CartStoreAction;
use App\Action\CartUpdateAction;

/**
 * Define out your routes paths and your Controllers
 */

// API group
$app->group('/api', function ($app) {
	$app->get('/cart/list/{udid}', CartAction::class)->setName('list');
	$app->post('/cart', CartStoreAction::class)->setName('storeCartItem');
	$app->delete('/cart', CartDeleteAction::class)->setName('deleteCartItem');
	$app->put('/cart', CartUpdateAction::class)->setName('updateCartItem');
});


//$app->get('/', HomeAction::class . ':index');

// $app->get('/', 'AuthController:index')->setName('index');
// $app->post('/', 'AuthController:update')->setName('update');

// $app->get('/register', 'RegisterController:index')->setName('register');
// $app->post('/register', 'RegisterController:store')->setName('store');