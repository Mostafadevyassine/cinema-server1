<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require("../models/Seat.php");
require("../connection/connection.php");

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['movie_id'], $data['seat_number'])) {
    http_response_code(400);
    echo json_encode(["message" => "Missing data"]);
    exit;
}

$success = Seat::book($mysqli, $data['movie_id'], $data['seat_number']);

if ($success) {
    echo json_encode(["message" => "Seat booked successfully"]);
} else {
    http_response_code(500);
    echo json_encode(["message" => "Failed to book seat"]);
}
?>