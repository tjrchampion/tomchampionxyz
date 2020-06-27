<?php

use App\Action\CartAction;
use App\Action\FileAction;
use App\Action\CartStoreAction;
use App\Action\CartDeleteAction;
use App\Action\CartUpdateAction;
use App\Middleware\ExampleAfterMiddleware;
use App\Middleware\ExampleBeforeMiddleware;

/**
 * Define out your routes paths and your Controllers
 */

// API group
$app->group('/api', function ($app) {
	$app->get('/cart/{udid}', CartAction::class)->setName('list');
	// $app->get('/cart/{udid}', CartAction::class)->setName('list')
	// 	->add(new ExampleBeforeMiddleware)
	// 	->add(new ExampleAfterMiddleware);
	$app->post('/cart', CartStoreAction::class)->setName('storeCartItem');
	$app->delete('/cart/{id}/{udid}', CartDeleteAction::class)->setName('deleteCartItem');
	$app->put('/cart', CartUpdateAction::class)->setName('updateCartItem');
	$app->get('/usercontent/{cart_id}[/{filename}]', FileAction::class)->setName('getUserContent'); //users device id, and the id of the ima
});