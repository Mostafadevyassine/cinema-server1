<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

require("../models/Movie.php");
require("../connection/connection.php");

// Read JSON body
$data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (
    !$data ||
    empty($data["name"]) ||
    empty($data["poster"]) ||
    empty($data["release_date"]) ||
    empty($data["duration"]) ||
    empty($data["language"]) ||
    empty($data["price"])
) {
    http_response_code(400);
    echo json_encode(["message" => "Missing required fields."]);
    exit;
}

// Insert movie
$success = Movie::add($mysqli, $data);

if ($success) {
    echo json_encode(["message" => "Movie added successfully."]);
} else {
    http_response_code(500);
    echo json_encode(["message" => "Failed to add movie."]);
}
?>