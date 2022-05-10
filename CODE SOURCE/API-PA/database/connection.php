<?php

class Database
{
    public static function getConnection()
    {
        $driver = "mysql";
        $databaseName = "pa";
        $host = "192.168.1.15:8889";
        $dsn = "$driver:dbname=$databaseName;host=$host";
        $user = "lucas";
        $password = "root";
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $databaseConnection = new PDO($dsn, $user, $password, $options);

        return $databaseConnection;
    }
}
