<?php

include __DIR__ . "/../database/connection.php";

class UserModel
{
    public static function getUser(array $userToCreate)
    {
        $databaseConnection = Database::getConnection();

        $getUserQuery = $databaseConnection->prepare("Update loyalty SET points = points+:points WHERE barcode=:barcode;");

        $barcode = $userToCreate["barcode"];
        $points = $userToCreate["points"];
        $getUserQuery->execute([
            "barcode" => $barcode,
            "points" => $points,
        ]);
        $user = $getUserQuery->fetch();

        return True;
    }
}
