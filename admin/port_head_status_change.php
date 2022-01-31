<?php
require "database.php";
$id = $_GET['portfolio_head_id'];
$select_status = "SELECT * FROM `portfolio_heading` WHERE `portfolio_head_id` = $id";
$select_status_result = mysqli_query($db_connection, $select_status);
$after_assoc_status = mysqli_fetch_assoc($select_status_result);
// echo $after_assoc_status['banner_status'];

if ($after_assoc_status['portfolio_heading_status'] == 1) {
    // update status 1 to 0
    $update_status = "UPDATE `portfolio_heading` SET `portfolio_heading_status`= 0 WHERE `portfolio_head_id`=$id";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_heading.php');
} else {
    // all status set 0
    $update_status = "UPDATE `portfolio_heading` SET `portfolio_heading_status`= 0";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_heading.php');
    // update status 0 to 1
    $update_status = "UPDATE `portfolio_heading` SET `portfolio_heading_status`= 1 WHERE `portfolio_head_id`=$id";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_heading.php');
}
?>