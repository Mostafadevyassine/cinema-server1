<?php
require("../models/Genre.php");
require("../connection/connection.php");


if ($action === "create") {
    if (isset($_GET["name"])) {
        $data = ["name" => $_GET["name"]];
        $result = Genre::create($mysqli, $data);
        $response["status"] = 200;
        $response["message"] = $result;
    } else {
        $response["status"] = 400;
        $response["message"] = "Missing required field: name.";
    }
} 

echo json_encode($response);
?>