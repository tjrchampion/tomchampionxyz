<?php

namespace App\Domain\Repositories\Contracts;

interface ConsumerInterface {

    public function get(string $id);

}