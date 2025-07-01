<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require("../models/Booking.php");
require("../connection/connection.php");

$data = json_decode(file_get_contents("php://input"), true);

if (
    !$data ||
    empty($data["user_id"]) ||
    empty($data["movie_id"]) ||
    empty($data["seat_count"])
) {
    http_response_code(400);
    echo json_encode(["message" => "Missing required fields."]);
    exit;
}

$success = Booking::create($mysqli, $data);

if ($success) {
    echo json_encode(["message" => "This movie is booked for you."]);
} else {
    http_response_code(500);
    echo json_encode(["message" => "Booking failed."]);
}
?>