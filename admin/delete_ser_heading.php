<?php
session_start();
require "database.php";
include 'flash_data.php';
if (isset($_GET['service_heading_id'])) {
    $id = $_GET['service_heading_id'];
    $delete_service_heading = "DELETE FROM `services_heading` WHERE `service_heading_id`= $id";
    $delete_result = mysqli_query($db_connection, $delete_service_heading);
    Flash_data::success("Service Heading Delete Success");
    header('location:view_service_heading.php');
}
?>