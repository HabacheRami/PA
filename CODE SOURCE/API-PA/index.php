<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * @see https://www.php.net/manual/en/migration70.new-features.php#migration70.new-features.null-coalesce-op
 */
$route = $_REQUEST["route"] ?? "home";

/**
 * @see https://www.php.net/manual/en/reserved.variables.server.php
 */
$method = $_SERVER["REQUEST_METHOD"];


if ($route === "users") {
    include __DIR__ . "/controllers/users.php";

    if ($method === "GET") {
        User::get();
        die();
    }
}

{
    include __DIR__ . "/library/response.php";
    echo Response::json(404, ["Content-Type" => "application/json"], "Not found");
}
