<?php
class Seat {
    public static function getByMovie($mysqli, $movie_id) {
        $stmt = $mysqli->prepare("SELECT seat_number, is_booked FROM seats WHERE movie_id = ?");
        $stmt->bind_param("i", $movie_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $seats = [];
        while ($row = $result->fetch_assoc()) {
            $seats[] = $row;
        }

        return $seats;
    }

    public static function book($mysqli, $movie_id, $seat_number) {
        $stmt = $mysqli->prepare("UPDATE seats SET is_booked = 1 WHERE movie_id = ? AND seat_number = ? AND is_booked = 0");
        $stmt->bind_param("is", $movie_id, $seat_number);
        $stmt->execute();

        return $stmt->affected_rows > 0;
    }
}
?>