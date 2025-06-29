<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");
require("../models/User.php");
require("../connection/connection.php");


$actionn = $_GET["actionn"] ?? null;

if ($actionn === "login") {
    if (isset($_GET["email"]) && isset($_GET["password"])) { 
        $data = [
            "email" => $_GET["email"],
            "password" => $_GET["password"]
        ];

        $user = User::login($mysqli, $data);

        if ($user) {
           $response["message"] = "Welcome, ";
        } else {
            $response["message"] = "Invalid email or password.";
        }
    } else {
        $response["message"] = "Missing email or password.";
    }
} 
echo json_encode($response);
?>