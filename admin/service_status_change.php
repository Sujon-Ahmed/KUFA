<?php
session_start();
require "database.php";
include "flash_data.php";
$id = $_GET['service_id'];
$select_status = "SELECT * FROM `services` WHERE `service_id` = $id";
$select_status_result = mysqli_query($db_connection, $select_status);
$after_assoc_status = mysqli_fetch_assoc($select_status_result);

if ($after_assoc_status['service_status'] == 1) {
    // update status 1 to 0
    $update_status = "UPDATE `services` SET `service_status`= 0 WHERE `service_id`=$id";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_services.php');
} else {
    $select_total_status = "SELECT COUNT(*) AS `total_active` FROM `services` WHERE `service_status` = 1";
    $select_total_status_result = mysqli_query($db_connection, $select_total_status);
    $after_assoc_active_status = mysqli_fetch_assoc($select_total_status_result);

    if ($after_assoc_active_status['total_active'] == 6) {
        Flash_data::error("You Can Active Maximum 6 Services");
        header('location:view_services.php');
    } else {
        // update status 0 to 1
        $update_status = "UPDATE `services` SET `service_status`= 1 WHERE `service_id`=$id";
        $update_result = mysqli_query($db_connection, $update_status);
        header('location:view_services.php');
    }
}
?>