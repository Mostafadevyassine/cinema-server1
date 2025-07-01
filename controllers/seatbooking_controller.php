<?php
require("../models/SeatBooking.php");
require("../connection/connection.php");


if ($action === "create") {
    if (
        isset($_GET["booking_id"]) &&
        isset($_GET["seat_id"]) &&
        isset($_GET["showtime_id"])
    ) {
        $data = [
            "booking_id" => $_GET["booking_id"],
            "seat_id" => $_GET["seat_id"],
            "showtime_id" => $_GET["showtime_id"]
        ];

        $result = SeatBooking::create($mysqli, $data);
        $response["message"] = $result;
    } else {
        $response["message"] = "Missing required fields.";
    }
}

echo json_encode($response);
?>