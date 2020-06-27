<?php

namespace App\Domain\Repositories\Contracts;

use Slim\Psr7\UploadedFile;

interface FileInterface
{
    /**
     * store interfacem for a file
     *
     * @param UploadedFile $file
     * @return void
     */
    public function store(UploadedFile $file);

    /**
     * handle files before storing 
     *
     * @param array $files
     * @return void
     */
    public function handle(array $files) : void;

    /**
     * users device id, and id for image we want
     *
     * @param string $cartId
     * @param string $filename
     * @return object
     */
    public function get(string $cartId, string $filename);

    /**
     * return an array of files associated to a cart id.
     *
     * @param string $cartId
     * @return void
     */
    public function getByCartId(string $cartId);

}