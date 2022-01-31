<?php
session_start();
require "database.php";
include 'flash_data.php';
if (isset($_GET['service_id'])) {
    $service_id = $_GET['service_id'];
    $delete_service = "DELETE FROM `services` WHERE `service_id`= $service_id";
    $delete_result = mysqli_query($db_connection, $delete_service);
    Flash_data::success("Service Delete Success");
    header('location:view_services.php');
}
?>