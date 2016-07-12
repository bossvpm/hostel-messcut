<?php session_start();

	if($_SESSION['mess_no']!=301){header("Location:../login/index.php"); exit;}

	include("../config.php");

	//initial variables
	$mess_no = $_SESSION['mess_no'];
	$name = $_SESSION['user'];

    if($_GET['cut_date']){
      $messcutDate = $_GET['cut_date'];
    }
    else{
	     $messcutDate = date("Y-m-d");
    }

    $messcutsArray = array();
	$fetchMesscuts = "SELECT  messNo FROM messcut WHERE date='$messcutDate'";
	$result = $mysqli->query($fetchMesscuts);
	if ($result->num_rows > 0) {
    // output data of each row
	    while($row = $result->fetch_assoc()) {
	       
          array_push($messcutsArray, $row['messNo']);
	    }
	}
	
	
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

   <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Welcome</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">       	
        	<?php
           		echo "Mr.".$name;
      		?>
        </a></li>
        <li><a href="../change_password.php">         
          Change Password
        </a></li>
        <li><a href="messno_wise.php">         
          Mess Numberwise
        </a></li>
        <li><a href="../logout.php">       	
        	Logout
        </a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">        
          <?php
              echo "Mr.".$name;
          ?>
        </a></li>
        <li><a href="../change_password.php">         
          Change Password
        </a></li>
        <li><a href="messno_wise.php">         
          Mess Numberwise
        </a></li>
        <li><a href="../logout.php">         
          Logout
        </a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <!-- <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h2 class="header center orange-text"></h2>
      <div class="row center">
        <h5 class="header col s12 light">Apply Messcut for tomorrow</h5>
      </div>
      <div class="row center">
        <a href="apply.php?<?php  $url; ?>" id="download-button" class="btn-large waves-effect waves-light orange">Apply Now</a>
      </div>
      <br><br>

    </div>
  </div>
 -->

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

            <form action="index.php" method="GET">
              <div class="row">
              <div class="input-field col s6">
              <input placeholder="Enter Date in yyyy-mm-dd format" name="cut_date" id="date" type="text" class="validate">
              
              </div>
              <div class="input-field col s6">
               <button class="btn waves-effect waves-light" type="submit" >Submit
                <i class="material-icons right">send</i>
                </button> 
                </div>
              </div>
            </form>
           
            <h5 class="center">Messcuts on <?php echo $messcutDate; ?></h5>

             <table class="bordered">
        <thead>
          <tr>
              <th data-field="mess_no">Mess Number</th>
              <th data-field="name">Name</th>  
              <th data-field="name">Department</th>          
          </tr>
        </thead>
        <tbody>
                  
          <?php

    
          foreach ($messcutsArray as $messcut) {
          	$messcut = (int)$messcut;
          	
		    $fetch_name = "SELECT name, dept FROM login WHERE mess_no='$messcut'";

		    $result_name = $mysqli->query($fetch_name);
		   
		    
			if ($result_name->num_rows > 0) {
				
    		// output data of each row
		    	while($row = $result_name->fetch_assoc()) {
		    		$name = $row['name'];
		    		$dept = $row['dept'];
		        		echo '<tr><td>'.$messcut.'</td><td>'.$name.'</td><td>'.$dept.'</td></tr>';  

		   		}
			}
			

          }
$mysqli->close();
          ?>

          </tbody>
      </table>
    
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
