<?php 

$db_host = "localhost";
$db_name = "articles_db"; 
$db_user = "root"; 
$db_pass = null;
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name , );

//if ($mysqli->connect_error) {
   // die(" Connection failed: " . $mysqli->connect_error);
//} else {
  //  echo "✅ Connected successfully<br>";
//}
