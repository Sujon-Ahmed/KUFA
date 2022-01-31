<?php 
session_start();
require "database.php";
include "flash_data.php";
$service_heading_id = $_POST['service_heading_id'];
$service_heading_sub_title = $_POST['sub_title'];
$service_heading_title = $_POST['title'];
if ($service_heading_sub_title != '' && $service_heading_title != '') {
    $update_service_heading = "UPDATE `services_heading` SET `service_heading_sub_title`='$service_heading_sub_title',`service_heading_title`='$service_heading_title' WHERE `service_heading_id` = $service_heading_id";
    $result = mysqli_query($db_connection, $update_service_heading);
    Flash_data::success("Service Heading Update Success");
    header('location:view_service_heading.php?service_heading_id='.$service_heading_id);
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:view_service_heading.php?service_heading_id='.$service_heading_id);
}
?>