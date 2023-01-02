<?php
namespace Services;

class DatabaseConnector
{
    static function getConnection() : \Doctrine\DBAL\Connection {
        $connectionParams = [
            'url' => 'mysql://' . DB_USER . ':' . DB_PASS . '@' . DB_HOST . '/' . DB_NAME
        ];

        try {
            $connection = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);
            $connection->connect();
        } catch (\Doctrine\DBAL\Exception $e) {
            if(DEBUG) {
                echo($e->getMessage() . PHP_EOL);
            }
            else{
                $filename = __DIR__ . '../../storage/db.log';
                $file = new \SplFileObject($filename, a);

                $file->fwrite(date);
                echo('Service Temporarily Unavailable');
            }
            exit();
        }
        return $connection;
    }

}