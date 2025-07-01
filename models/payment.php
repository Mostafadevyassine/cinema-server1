<?php
require_once("Model.php");

class Payment extends Model {

    public static function create(mysqli $mysqli, array $data) {
        $sql = "INSERT INTO payments (booking_id, amount, payment_method) VALUES (?, ?, ?)";
        $query = $mysqli->prepare($sql);
        $query->bind_param("ids",
            $data["booking_id"],
            $data["amount"],
            $data["payment_method"]
        );
        $query->execute();
        return $query->affected_rows > 0 ? "Payment recorded." : "Failed to record payment.";
    }
}
?>