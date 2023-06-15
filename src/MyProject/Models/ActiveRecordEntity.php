<?php

namespace App\MyProject\Models;

abstract class ActiveRecordEntity
{
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    public static function findAll(): array
    {
        $db = new Db();
        return $db->queryFetchAll('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }
    abstract protected static function getTableName(): string
    {
        return 'articles';
    }
}