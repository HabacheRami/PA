<?php

class Database
{
    public static function getConnection()
    {
        $driver = "mysql";
        $databaseName = "lrt_loyaltycard";
        $host = "152.228.218.3:3306";
        $dsn = "$driver:dbname=$databaseName;host=$host";
        $user = "lrt";
        $password = "Mcyh5133^";
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $databaseConnection = new PDO($dsn, $user, $password, $options);

        return $databaseConnection;
    }
}
