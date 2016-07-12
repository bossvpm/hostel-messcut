<?php
 
 session_start();
 


	 if(!isset($_SESSION['mess_no']))
	 {
	 	header("Location:login/index.php");
			exit;
		/*echo'<h1>Welcome Mr.' . $_SESSION['user'] . '</h1>';
		
		echo'<br> <h1> <a href="logout.php">LOGOUT</a> </h1>';*/
	 } 
	 /*else
	 {
	 	echo 'You are not logged In <br>';
		echo'<a href="index.php">LOGIN</a>';
		
	 }*/
	 include("config.php");

	//initial variables
	$mess_no = $_SESSION['mess_no'];
	$name = $_SESSION['user'];

	$hash_string = 'da'.$mess_no.'sh'.$name.'ni';

	$key = hash('sha512', $hash_string );
	$url = 'mess_no='.$mess_no.'&key='.$key;
	$datesArray = array();

	$messcuts = "SELECT date FROM messcut WHERE messNo='$mess_no'";
	$result = $mysqli->query($messcuts);

		if ($result->num_rows > 0) {
	    // output data of each row
	    	while($row = $result->fetch_assoc()) {
	         
	        array_push($datesArray, $row['date']);
	    	}
		}
		$mysqli->close();
	//explode dates
	//	$datesArray = explode('&', $dates);

?>


  <!DOCTYPE html>
  <html>
    <head>
    <title>Sahara Hostel Online Messcut Register</title>

    	<!-- date picker 
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jquery.datepick.css"> 
		<script type="text/javascript" src="js/jquery.plugin.js"></script> 
		<script type="text/javascript" src="js/jquery.datepick.js"></script> -->

      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
    
    

<?php include_once("analyticstracking.php") ?>

   <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Welcome</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">       	
        	<?php
           		echo "Mr.".$name;
      		?>
        </a></li>
        <li><a href="change_password.php">         
          Change Password
        </a></li>
        <li><a href="logout.php">       	
        	Logout
        </a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">        
          <?php
              echo "Mr.".$name;
          ?>
        </a></li>
        <li><a href="change_password.php">         
          Change Password
        </a></li>
        <li><a href="logout.php">         
          Logout
        </a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h2 class="header center orange-text"></h2>
      <!-- <div class="row center">
        <h5 class="header col s12 light">Apply Messcut for tomorrow</h5>
      </div> -->
      <div class="row center">
        <a href="apply.html" id="download-button" class="btn-large waves-effect waves-light orange">Apply Messcut</a>
      </div>
      <br><br>

    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
        	
          <!-- <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Speeds up development</h5>

            <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
          </div> -->
        </div>

        <div class="col s12 m12">
          <div class="icon-block">
           
            <h5 class="center">Your upcoming messcuts</h5>

          <?php

    
          foreach ($datesArray as $printdates) {
            if(strtotime($printdates) > strtotime('today')){
          	echo '<div class="chip" style="margin-top: 5px;
		    margin-bottom: 5px;
		    margin-right: 5px;
		    margin-left: 5px;">'.$printdates.'<i class="material-icons"><a href="delete.php?date='.$printdates.'">close</a></i></div>';
          }
        }
        /*<i class="material-icons">close</i>*/

          ?>
    
        </div>

      </div>

    </div>
    <br><br>

    <div class="section">

    </div>
  </div>
  </div>

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Sahara BTech Hostel</h5>
          <p class="grey-text text-lighten-4">School Of Engineering,<br> Cochin University of Science And Technology,<br> Kalamassery, Cochin-682022.</p>


        </div>
        <!-- <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div> -->
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">South Indian Mess Committee</a>
      </div>
    </div>
  </footer>





      <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
       <!-- Compiled and minified JavaScript -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    </body>
  </html>
