<?php
session_start();
require "database.php";
include "flash_data.php";
$id = $_GET['id'];
$select_status = "SELECT * FROM `testimonials` WHERE `id` = $id";
$select_status_result = mysqli_query($db_connection, $select_status);
$after_assoc_status = mysqli_fetch_assoc($select_status_result);

if ($after_assoc_status['status'] == 1) {
    // update status 1 to 0
    $update_status = "UPDATE `testimonials` SET `status`= 0 WHERE `id`=$id";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_testimonial.php');
} else {
    $select_total_status = "SELECT COUNT(*) AS `total_active` FROM `testimonials` WHERE `status` = 1";
    $select_total_status_result = mysqli_query($db_connection, $select_total_status);
    $after_assoc_active_status = mysqli_fetch_assoc($select_total_status_result);

    if ($after_assoc_active_status['total_active'] == 4) {
        Flash_data::error("You Can Active Maximum 4 Testimonial");
        header('location:view_testimonial.php');
    } else {
        // update status 0 to 1
        $update_status = "UPDATE `testimonials` SET `status`= 1 WHERE `id`=$id";
        $update_result = mysqli_query($db_connection, $update_status);
        header('location:view_testimonial.php');
    }
}
?>