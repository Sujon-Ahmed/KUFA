<?php
session_start();
require "database.php";
include 'flash_data.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_satisfies = "DELETE FROM `satisfies` WHERE `id`= $id";
    $delete_result = mysqli_query($db_connection, $delete_satisfies);
    Flash_data::success("Satisfies Delete Success");
    header('location:view_satisfy.php');
}
?>