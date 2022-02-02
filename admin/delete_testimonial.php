<?php
session_start();
require "database.php";
include 'flash_data.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_testimonials = "SELECT * FROM `testimonials` WHERE `id` = $id";
    $testimonial_result = mysqli_query($db_connection, $select_testimonials);
    $after_assoc = mysqli_fetch_assoc($testimonial_result);
    $delete_form = "assets/uploads/testimonials/".$after_assoc['image'];
    unlink($delete_form);
    $delete_testimonial = "DELETE FROM `testimonials` WHERE `id`= $id";
    $delete_result = mysqli_query($db_connection, $delete_testimonial);
    Flash_data::success("Testimonial Delete Success");
    header('location:view_testimonial.php');
}
?>