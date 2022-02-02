<?php
session_start();
require 'database.php';
include 'flash_data.php';
$sub_title = $_POST['sub_title'];
$main_title = $_POST['main_title'];
if ($sub_title != '' && $main_title != ''){
    $insert_testimonial_heading = "INSERT INTO `testimonial_head`(`sub_title`, `main_title`) VALUES ('$sub_title','$main_title')";
    $insert_result = mysqli_query($db_connection, $insert_testimonial_heading);
    Flash_data::success("Testimonial Heading Add Successfully");
    header('location:add_testimonial_heading.php');
} else {
    Flash_data::error("All Felid Are Required!");
    header('location:add_testimonial_heading.php');
}
?>