<?php
require "database.php";
$id = $_GET['service_heading_id'];
$select_status = "SELECT * FROM `services_heading` WHERE `service_heading_id` = $id";
$select_status_result = mysqli_query($db_connection, $select_status);
$after_assoc_status = mysqli_fetch_assoc($select_status_result);

if ($after_assoc_status['service_heading_status'] == 1) {
    // update status 1 to 0
    $update_status = "UPDATE `services_heading` SET `service_heading_status`= 0 WHERE `service_heading_id`=$id";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_service_heading.php');
} else {
    // all status set 0
    $update_status = "UPDATE `services_heading` SET `service_heading_status`= 0";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_service_heading.php');
    // update status 0 to 1
    $update_status = "UPDATE `services_heading` SET `service_heading_status`= 1 WHERE `service_heading_id`=$id";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_service_heading.php');
}
?>