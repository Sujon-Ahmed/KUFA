<?php
session_start();
require 'database.php';
include 'flash_data.php';
$sub_title = $_POST['sub_title'];
$title = $_POST['title'];
$description = $_POST['description'];

?>