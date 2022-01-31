<?php 
session_start();
require "database.php";
include "flash_data.php";
$service_id = $_POST['service_id'];
$service_icon = $_POST['service_icon'];
$service_name = $_POST['service_name'];
$service_description = $_POST['description'];
if ($service_icon != '' && $service_name != '' && $service_description != '') {
    $update_service = "UPDATE `services` SET `service_icon`='$service_icon',`service_name`='$service_name', `service_description`='$service_description' WHERE `service_id` = $service_id";
    $result = mysqli_query($db_connection, $update_service);
    Flash_data::success("Service Update Success");
    header('location:view_services.php?service_id='.$service_id);
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:edit_service.php?service_id='.$service_id);
}
?>