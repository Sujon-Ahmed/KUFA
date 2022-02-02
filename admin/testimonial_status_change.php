<?php
require "database.php";
$id = $_GET['id'];
$select_status = "SELECT * FROM `testimonial_head` WHERE `id` = $id";
$select_status_result = mysqli_query($db_connection, $select_status);
$after_assoc_status = mysqli_fetch_assoc($select_status_result);
// echo $after_assoc_status['banner_status'];

if ($after_assoc_status['testimonial_head_status'] == 1) {
    // update status 1 to 0
    $update_status = "UPDATE `testimonial_head` SET `testimonial_head_status`= 0 WHERE `id`=$id";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_testimonial_heading.php');
} else {
    // all status set 0
    $update_status = "UPDATE `testimonial_head` SET `testimonial_head_status`= 0";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_testimonial_heading.php');
    // update status 0 to 1
    $update_status = "UPDATE `testimonial_head` SET `testimonial_head_status`= 1 WHERE `id`=$id";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_testimonial_heading.php');
}
?>