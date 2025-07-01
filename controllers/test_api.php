<?php
require("../connection/connection.php");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$response = ["message" => "Backend is connected successfully!"];
echo json_encode($response);
?>