<?php
session_start();
require "database.php";
include 'flash_data.php';
if (isset($_GET['portfolio_id'])) {
    $id = $_GET['portfolio_id'];
    $select_portfolios = "SELECT * FROM `portfolios` WHERE `portfolio_id` = $id";
    $select_portfolios_result = mysqli_query($db_connection, $select_portfolios);
    $after_assoc = mysqli_fetch_assoc($select_portfolios_result);
    $delete_form = "assets/uploads/portfolios/".$after_assoc['portfolio_image'];
    unlink($delete_form);
    $delete_portfolio = "DELETE FROM `portfolios` WHERE `portfolio_id`= $id";
    $delete_result = mysqli_query($db_connection, $delete_portfolio);
    Flash_data::success("Portfolio Delete Success");
    header('location:view_portfolio.php');
}
?>