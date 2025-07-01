<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require("../models/Movie.php");
require("../connection/connection.php");

$movies = Movie::getAll($mysqli);
echo json_encode($movies);
?>