<?php
session_start();
require "database.php";
include 'flash_data.php';
if (isset($_GET['skill_id'])) {
    $skill_id = $_GET['skill_id'];
    $delete_skill = "DELETE FROM `skills` WHERE `skill_id`= $skill_id";
    $delete_result = mysqli_query($db_connection, $delete_skill);
    Flash_data::success("Skill Delete Success");
    header('location:view_skill.php');
}
?>