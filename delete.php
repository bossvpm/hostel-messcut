<?php
session_start();
include 'config.php';
if(!isset($_SESSION['mess_no']))
	 {
	 	header("Location:index.php");
			exit;
	 }
$mess_no = $_SESSION['mess_no'];
$date = $_GET['date'];
$query = "DELETE FROM messcut WHERE messNo='$mess_no' AND date='$date'";
$result = $mysqli->query($query);
header('Location: index.php');
?>