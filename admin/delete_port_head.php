<?php
session_start();
require "database.php";
include 'flash_data.php';
if (isset($_GET['portfolio_head_id'])) {
    $id = $_GET['portfolio_head_id'];
    $delete_portfolio_heading = "DELETE FROM `portfolio_heading` WHERE `portfolio_head_id`= $id";
    $delete_result = mysqli_query($db_connection, $delete_portfolio_heading);
    Flash_data::success("Portfolio Heading Delete Success");
    header('location:view_heading.php');
}
?>