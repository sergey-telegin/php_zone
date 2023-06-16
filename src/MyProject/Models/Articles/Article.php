<?php

namespace App\MyProject\Models\Articles;

use App\MyProject\Models\ActiveRecordEntity;

class Article extends ActiveRecordEntity
{

    protected $name;

    protected $text;

    protected $authorId;

    protected $createdAt;

    public function getName(): string
    {
        return $this->name;
    }

    public function getText(): string
    {
        return $this->text;
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }

}