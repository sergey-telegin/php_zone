<?php

namespace App\MyProject\Services;

{
    class Db
    {
        private $pdo;

        private static $instancesCount = 0;


        public function __construct()
        {
            self::$instancesCount++;

            $dbOptions = (require __DIR__ . '/../../settings.php')['db'];

            $this->pdo = new \PDO(
                'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
                $dbOptions['user'],
                $dbOptions['password']
            );
            $this->pdo->exec('SET NAMES UTF8');
        }

        public function queryFetchAll(string $sql, $params = [], string $className = 'stdClass'): ?array
        {
            $sth = $this->pdo->prepare($sql);
            $result = $sth->execute($params);

            if (false === $result) {
                return null;
            }

            return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
        }

        public static function getInstancesCount(): int
        {
            return self::$instancesCount;
        }
    }


}