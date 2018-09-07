<?php
include("include/conn.php");
//get the id frin delete.php 
$id = $_GET['id'];
//delete record based on selected id from delete.php
		$query = "Delete from user where user_id=$id";
		mysql_query($query);
		header("Location: usersList.php");
?>
