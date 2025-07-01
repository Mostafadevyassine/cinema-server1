<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");
require("../models/User.php");
require("../connection/connection.php");


$action = $_GET["action"] ?? null;

if ($action === "create") {
    if (
        isset($_GET["email"]) &&
        isset($_GET["password"]) &&
        isset($_GET["full_name"]) &&
        isset($_GET["date_of_birth"]) &&
        isset($_GET["favorite_genres"])
    ) {
        $data = [
            "email" => $_GET["email"],
            "password" => $_GET["password"],
            "full_name" => $_GET["full_name"],
            "date_of_birth" => $_GET["date_of_birth"],
            "favorite_genres" => $_GET["favorite_genres"] 
        ];

        $result = User::create($mysqli, $data);
        $response["message"] = $result;
    } else {
        $response["status"] = 400;
        $response["message"] = "Missing required fields.";
    }
} 

echo json_encode($response);






?>