<?php
session_start();
require 'database.php';
include 'flash_data.php';
$sub_title = $_POST['sub_title'];
$title = $_POST['title'];
if ($sub_title != '' && $title != ''){
    $insert_ser_heading = "INSERT INTO `services_heading`(`service_heading_sub_title`, `service_heading_title`) VALUES ('$sub_title','$title')";
    $insert_ser_heading_result = mysqli_query($db_connection, $insert_ser_heading);
    Flash_data::success("Service Heading Add Successfully");
    header('location:add_service_heading.php');
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:add_service_heading.php');
}
?>