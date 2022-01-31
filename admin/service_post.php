<?php
session_start();
require 'database.php';
include 'flash_data.php';
$service_icon = $_POST['service_icon'];
$service_title = $_POST['service_title'];
$service_description = $_POST['description'];

if ($service_icon != '' && $service_title != '' && $service_description != ''){
    $insert_service = "INSERT INTO `services`(`service_icon`, `service_name`, `service_description`) VALUES ('$service_icon','$service_title','$service_description')";
    $insert_skill_result = mysqli_query($db_connection, $insert_service);
    Flash_data::success("Service Add Successfully");
    header('location:add_service.php');
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:add_service.php');
}
?>