<?php

use App\Action\CartAction;
use App\Action\FileAction;
use App\Action\HomeAction;
use App\Action\CartStoreAction;
use App\Action\CartDeleteAction;
use App\Action\CartUpdateAction;
use App\Action\ContactStoreAction;
use App\Middleware\BypassBeforeMiddleware;
use App\Middleware\BasicAuthBeforeMiddleware;

/**
 * Define out your routes paths and your Controllers
 */
//web view
 $app->get('/', HomeAction::class)->setName('home');
 $app->post('/contact', ContactStoreAction::class)->setName('sendContact');

// API group
$app->group('/api', function ($app) {
	$app->get('/cart/{udid}', CartAction::class)->setName('list');
	// $app->get('/cart/{udid}', CartAction::class)->setName('list')
	// 	->add(new ExampleBeforeMiddleware)
	// 	->add(new ExampleAfterMiddleware);
	//cart
	$app->post('/cart', CartStoreAction::class)->setName('storeCartItem');
	$app->delete('/cart/{id}/{udid}', CartDeleteAction::class)->setName('deleteCartItem');
	$app->put('/cart', CartUpdateAction::class)->setName('updateCartItem');
	$app->get('/usercontent/{cart_id}[/{filename}]', FileAction::class)->setName('getUserContent'); //users device id, and the id of the ima

})->add(BasicAuthBeforeMiddleware::class);

