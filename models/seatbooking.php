<?php
require_once("Model.php");

class SeatBooking extends Model {

    public static function create(mysqli $mysqli, array $data) {
        $sql = "INSERT INTO seat_bookings (booking_id, seat_id, showtime_id) VALUES (?, ?, ?)";
        $query = $mysqli->prepare($sql);
        $query->bind_param("iii", 
            $data["booking_id"],
            $data["seat_id"],
            $data["showtime_id"]
        );
        $query->execute();
        return $query->affected_rows > 0 ? "Seat booked successfully." : "Failed to book seat.";
    }
}
?>