<?php

namespace Tests;

use Faker\Factory;
use Slim\Psr7\Request;
use Faker\Provider\Image;

use Slim\Psr7\Environment;
use Slim\Psr7\UploadedFile;
use Illuminate\Database\Capsule\Manager as Capsule;
use PHPUnit\Framework\TestCase as PHPUnit_TestCase;
use App\Domain\Repositories\Implementations\CartRepositoryImpl;
use App\Domain\Repositories\Implementations\FileRepositoryImpl;

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
        $this->file = new FileRepositoryImpl(new \Intervention\Image\ImageManager());
        
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

    public function test_file_get_items_returns_array_and_is_not_empty()
    {
        $this->assertIsArray($this->cart->get('123'));
        $this->assertNotEmpty($this->cart->get('123'));
    }

    /** @test */
    public function test_image_can_be_stored_to_location()
    {
        $files['files'] = [
            new UploadedFile(Image::image('/tmp', 50, 50), 'testunit1.jpg', 'image/jpeg'),
            new UploadedFile(Image::image('/tmp', 50, 50), 'testunit2.jpg', 'image/jpeg'),
        ];

        $this->file->handle($files);

        $stored = $this->file->getStored();
    
        foreach($files['files'] as $key => $file) {
            $exists = file_exists(uploads_path($stored[$key]['filename']));
            $this->assertEquals(true, $exists);            
        }
    }

}