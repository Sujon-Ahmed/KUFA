<?php
session_start();
require "database.php";
include 'flash_data.php';
$id = $_GET['id'];
$delete = "DELETE FROM `messages` WHERE `id`=$id";
$result = mysqli_query($db_connection, $delete);
Flash_data::success('Message Delete Success');
header('location:view_messages.php');
?>