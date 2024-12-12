<?php

namespace App\Domain;

class User
{
    public int $id;

    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
