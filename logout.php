<?php
include("include/conn.php");
// Inialize session
session_start();

// Delete certain session
unset($_SESSION['username']);
// Jump to login page
header('Location: login.php');
?>
