<?php
session_start();
require 'database.php';
include 'flash_data.php';
$sub_heading = $_POST['sub_heading'];
$main_heading = $_POST['main_heading'];
if ($sub_heading != '' && $main_heading != ''){
    $insert_port_head = "INSERT INTO `portfolio_heading`(`portfolio_sub_heading`, `portfolio_main_heading`) VALUES ('$sub_heading','$main_heading')";
    $insert_skill_result = mysqli_query($db_connection, $insert_port_head);
    Flash_data::success("Portfolio Heading Add Successfully");
    header('location:add_heading.php');
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:add_heading.php');
}
?>