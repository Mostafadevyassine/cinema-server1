<?php
require("../models/Payment.php");
require("../connection/connection.php");



if ($action === "create") {
    if (
        isset($_GET["booking_id"]) &&
        isset($_GET["amount"]) &&
        isset($_GET["payment_method"])
    ) {
        $data = [
            "booking_id" => $_GET["booking_id"],
            "amount" => $_GET["amount"],
            "payment_method" => $_GET["payment_method"] // "wallet", "credit", "cinema_points"
        ];

        $result = Payment::create($mysqli, $data);
        $response["message"] = $result;
    } else {
        $response["message"] = "Missing required fields.";
    }
}

echo json_encode($response);
?>