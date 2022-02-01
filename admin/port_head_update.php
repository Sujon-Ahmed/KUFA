<?php 
session_start();
require "database.php";
include "flash_data.php";
$id = $_POST['id'];
$sub_heading = $_POST['sub_heading'];
$main_heading = $_POST['main_heading'];
if ($sub_heading != '' && $main_heading != '') {
    $update_heading = "UPDATE `portfolio_heading` SET `portfolio_sub_heading`='$sub_heading',`portfolio_main_heading`='$main_heading' WHERE `portfolio_head_id` = $id";
    $result = mysqli_query($db_connection, $update_heading);
    Flash_data::success("Heading Update Success");
    header('location:view_heading.php?portfolio_head_id='.$id);
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:edit_port_head.php?portfolio_head_id='.$id);
}
?>