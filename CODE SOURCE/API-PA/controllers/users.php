<?php

include __DIR__ . "/../library/response.php";
include __DIR__ . "/../library/headers.php";
//include DIR . "/../validations/user.php";
include __DIR__ . "/../models/UserModel.php";

final class User
{
    /**
     * @example
     * User::get();
     */
    final public static function get(): void
    {
        $statusCode = 200;

        $responseHeaders = [
            "Content-Type" => "application/json"
        ];

        try {
        $json = json_decode(file_get_contents("php://input"));
        $user = UserModel::getUser([
          "barcode" => $json->barcode,
          "points" => $json->points,
        ]);

        $body = [
          "success" => true,
        ];

        echo Response::json($statusCode, $responseHeaders, $body);

        } catch (PDOException $e) {
          die($e->getMessage());
        }


      }
}
