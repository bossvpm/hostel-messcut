<?php
include 'config.php';
$query = "SELECT * FROM messcuts WHERE 1";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
	$nos = explode('&', $row['mess_nos']);
	$date = $row['cutDate'];
	//echo $row['cutDate']."--->";
	foreach ($nos as $no) {
		$push = "INSERT INTO messcut (messNo, date) VALUES ('$no', '$date')";
		$resulta = $mysqli->query($push);
		if( $resulta){echo 'success ';} else echo 'failed ';
		//echo $no.", ";
			} 
	echo '<br>';
}

 
?>