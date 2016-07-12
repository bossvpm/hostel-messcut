<?php session_start();
include("config.php");

	$mess_no = secure($_POST['mess_no'], $mysqli);
	$pass =  secure($_POST['password'], $mysqli);
	
	$q = "SELECT * FROM login WHERE mess_no = '$mess_no' AND password = '$pass'";
	if($res = $mysqli->query($q))
	{
		if($res->num_rows > 0)
		{	
			$_SESSION['mess_no'] = $mess_no;
			while($row = $res->fetch_array()){
				$_SESSION['user'] = $row['name'];
			}
			if($_SESSION['mess_no']==301){header("Location:king/index.php"); exit;}
			header("Location:index.php");
			exit;
		}
		else
		{
			echo'<script>alert("Invalid Mess Number or Password");</script>';
			
			exit;
		}
	}

?>