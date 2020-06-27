<?php

declare(strict_types=1);

namespace App\Domain\Repositories\Implementations;

use Ramsey\Uuid\Uuid;
use App\Domain\Models\Cart;
use App\Domain\Models\File;
use Slim\Psr7\UploadedFile;
use Psr\Container\ContainerInterface;
use App\Domain\Repositories\Contracts\FileInterface;
use Intervention\Image\Exception\NotReadableException;

class FileRepositoryImpl implements FileInterface
{

    /**
     * individual file object
     *
     * @var [type]
     */
    protected $file;

    /**
     * files array
     *
     * @var [array]
     */
    protected $files;

    /**
     * @var [array]
     */
    protected $stored;


    public function __construct($image)
    {
        $this->image = $image;
    }

    /**
     * Getter for stored files
     *
     * @return void
     */
    public function getStored()
    {
        return $this->stored;
    }

    /**
     * Move a file to its appropriate location
     *
     * @param UploadedFile $file
     * @return void
     */
    public function store(UploadedFile $file) 
    {
        
        try {

            $uuid = $this->genUuid();
            $ext = $this->getExt($file->getClientFilename());
            $filename = "{$uuid}.{$ext}";
            $file->moveTo(
                uploads_path($filename) //save with uuid from db
            );

            return $filename;

        } catch(Exception $e) {
            //
        }
    }

    /**
     * Process each file in array, passing to store method.
     * if an unsupported file type is uploaded it will
     * quietly remove it without returning an exception.
     *
     * @param array $files
     * @return void
     */
    public function handle(array $files) : void
    {

        try {
            foreach($files['files'] as $file) {
                $this->image->make(
                    $file->getStream()->getMetadata('uri')
                );
                $this->stored[]['filename'] = $this->store($file);
            }
        } catch(NotReadableException $e) {
            //
        }
    }

    /**
     * get a single file out of the db
     */
    public function get(string $cartId, string $filename)
    {
        return File::where(['cart_id' => $cartId, 'filename' => $filename])->first()->toArray();
    }

    /**
     *  return array of items by cart id
     *
     * @param string $cartId
     * @return void
     */
    public function getByCartId(string $cartId)
    {
        return File::where('cart_id', $cartId)->get()->toArray();
    }

    /**
     * As the name suggests
     *
     * @return string
     */
    public function genUuid()
    {
        return Uuid::uuid4()->toString();
    }

    /**
     * As name suggests, get a file ext
     *
     * @param [type] $name
     * @return string
     */
    public function getExt($name)
    {
        return pathinfo($name, PATHINFO_EXTENSION);
    }

}