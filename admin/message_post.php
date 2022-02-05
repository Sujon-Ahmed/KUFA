<?php
session_start();
require "database.php";
include "flash_data.php";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$name = test_input($_POST['name']);
$email = test_input($_POST['email']);
$message = test_input($_POST['message']);
if ($name != '' && $email != '' && $message != '') {
    $insert_message = "INSERT INTO `messages`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";
    $insert_result = mysqli_query($db_connection, $insert_message);
    Flash_data::success("Your Message Submit Success");
    header('location:../index.php');
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:../index.php');
}

?>