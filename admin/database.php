<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "kufa";

$db_connection = mysqli_connect($host, $user, $pass, $db);

// Check if the connection was successful
// if (!$db_connection) {
//     // Connection failed, display an error message
//     die("Connection failed: " . mysqli_connect_error());
// } else {
//     // Connection successful
//     echo "Connected successfully";
// }

