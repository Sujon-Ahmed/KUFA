<?php
session_start();
require "database.php";
include "flash_data.php";
$id = $_GET['id'];
$select_status = "SELECT * FROM `portfolios` WHERE `portfolio_id` = $id";
$select_status_result = mysqli_query($db_connection, $select_status);
$after_assoc_status = mysqli_fetch_assoc($select_status_result);

if ($after_assoc_status['portfolio_status'] == 1) {
    // update status 1 to 0
    $update_status = "UPDATE `portfolios` SET `portfolio_status`= 0 WHERE `portfolio_id`=$id";
    $update_result = mysqli_query($db_connection, $update_status);
    header('location:view_portfolio.php');
} else {
    $select_total_status = "SELECT COUNT(*) AS `total_active` FROM `portfolios` WHERE `portfolio_status` = 1";
    $select_total_status_result = mysqli_query($db_connection, $select_total_status);
    $after_assoc_active_status = mysqli_fetch_assoc($select_total_status_result);

    if ($after_assoc_active_status['total_active'] == 6) {
        Flash_data::error("You Can Active Maximum 6 Portfolio");
        header('location:view_portfolio.php');
    } else {
        // update status 0 to 1
        $update_status = "UPDATE `portfolios` SET `portfolio_status`= 1 WHERE `portfolio_id`=$id";
        $update_result = mysqli_query($db_connection, $update_status);
        header('location:view_portfolio.php');
    }
}
?>