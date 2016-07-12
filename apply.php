<?php
session_start();
include 'config.php';
if(!isset($_SESSION['mess_no']))
	 {
	 	header("Location:index.php");
			exit;
	 }
$mess_no = $_SESSION['mess_no'];
$dates = $_GET['dates'];
$datesArray = explode(',', $dates);

/*$get_messcuts = "SELECT dates FROM messcut_log WHERE mess_no='$mess_no'";
$result = $mysqli->query($get_messcuts);

		if ($result->num_rows > 0) {
	    // output data of each row
	    	while($row = $result->fetch_assoc()) {
	        $dates = $row['dates'];
	    	}
		}
	$appliedDatesArray = explode('&', $dates);
$toApplyDates = array_diff($datesArray,$appliedDatesArray);*/

//filter previous dates
$toApplyDates = array_filter($datesArray, function($date){
    return strtotime($date) > strtotime('today');
});



 /*$dateString = implode('&', $toApplyDates).'&';
 $mess_no_string = $mess_no.'&';*/
 



 
 foreach ($toApplyDates as $date) {
 	$query = "INSERT INTO messcut (messNo, date) VALUES ('$mess_no','$date')";
 	$result = $mysqli->query($query);
 }
 
 
 	header('Location: index.php');
 

?>