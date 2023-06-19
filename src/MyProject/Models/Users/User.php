<?php

namespace App\MyProject\Models\Users;

class User
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __get()
    {
        gettype()
    }

    public function getName(): string
    {
        return $this->name;
    }


}