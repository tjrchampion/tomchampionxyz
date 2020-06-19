<?php

namespace Tests;

use PHPUnit\Framework\TestCase as PHPUnit_TestCase;
use App\Domain\Repositories\Implementations\CartRepositoryImpl;
use Illuminate\Database\Capsule\Manager as Capsule;

class CartTest extends PHPUnit_TestCase
{

    public function setUp() : void
    {
        
        $capsule = new Capsule();

        $capsule->addConnection([
            'driver' => getenv('DB_DRIVER'),
            'host' => getenv('DB_HOST'),
            'database' => getenv('DB_NAME'),
            'username' => getenv('DB_USER'),
            'password' => getenv('DB_PASS'),
            'charset' => getenv('DB_CHARSET'),
            'collation' => getenv('DB_COLLATION')
        ]);
        $capsule->bootEloquent();

        $this->cart = new CartRepositoryImpl;
        
    }

    /** @test */
    public function test_cart_item_can_be_stored()
    {

        $this->cart->store([
            'title' => 'Apples',
            'udid' => '123',
            'complete' => 1
        ],[]);

        $this->assertNotNull(
            $this->cart->store([
                'title' => 'Apples',
                'udid' => '123',
                'complete' => 1
            ], [])
        );
    }

    /** @test */
    public function test_cart_get_items_returns_array_and_is_not_empty()
    {
        $this->assertIsArray($this->cart->get('123'));
        $this->assertNotEmpty($this->cart->get('123'));
    }

    /** @test */
    public function test_cart_item_can_be_deleted()
    {
        // $this->cart->delete([
        //     'id' => '126',
        //     'udid' => '123'
        // ]);

        // $this->assertEquals(1, $this->cart->delete([
        //     'id' => '126',
        //     'udid' => '123'
        // ]));
    }

}