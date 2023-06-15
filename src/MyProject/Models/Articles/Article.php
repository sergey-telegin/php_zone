<?php

namespace App\MyProject\Models\Articles;
use App\MyProject\Models\Users\User;

class Article
{

    private $name;

    private $text;

    private $authorId;

    private $createdAt;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }






}