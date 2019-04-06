<!DOCTYPE html>

<?php
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "airline_master";

    $conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
        if($conn-> connect_error){
            die("Connection failed:".$conn->connect_error);
    }
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="styling.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Below link doesn't allow dropdown to work -->
    <link rel="stylesheet" type="text/css" href="bookForm.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
    <script> 
        /*$(document).ready(function(){
          $(".dropdown").hover(function(){
            $("dropbtn").slideToggle("slow");
          });
        });*/
    </script>
    <script>
		$(document).ready(function(){

			$("#div-finfo").fadeIn(1000);
		});
    </script>
    <header>
        <img src="https://dribbble.com/shots/2021168-Google-Flights">  The Airlines
    </header>

</head>
<body>
<!--Horizontal list for dropdowns-->


<nav class="navbar navbar-inverse" style="margin:0px;">
  <div class="container-fluid">
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="#">HOME</a></li>
      <li>
      <div class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">RESERVATION</a>
            <div class="dropdown-content">
                <a href="#">Book a flight</a>
                <a href="#">Manage reservations</a>
                <a href="#">Make other reservations</a>
            </div>
		</div>
      </li>
      <li>
      <div class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">FLIGHT INFORMATION</a>
            <div class="dropdown-content">
                <a href="#">Flight Status</a>
                <a href="#">Timetable</a>
                <a href="#">Baggage Information</a>
            </div>
		</div>
	</li>
      <li>
      <div class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">DEALS</a>
        <div class="dropdown-content-right">
            <a href="#">Airline specials</a>
            <a href="#">Destination Deals</a>
            <a href="#">Member Priviliges </a>
		</div>
		</li>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#" onClick="document.getElementById('loginForm').style.display='block'" style="width:auto;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
 
</div>
</nav>

	<br>
	<!--For updating query-->
<div class="container" style="box-shadow:0px 0px 5px 1px rgba(0,0,0,0.35);">
    
    <form class="form-inline" autocomplete="off" name="bookTickets" method="POST" onsubmit="return validateForm()" style="padding:20px;">
	<div class="row">
	<div class="col-md-3">
	<div class="form-group" style="text-align:center;width:100%;">
        <div class="autocomplete" style="width:200px;">
            <label class="control-label" for="source">From</label>
			<input id="src_input" type="text" name="source" placeholder="Source" class="form-control">
        </div>
	</div>
	</div>

    <div class="col-md-3">
        <div class="form-group" style="text-align:center;width:100%;">
        <div class="autocomplete" style="width:200px;"> 
        <label class="control-label" for="dest">To</label>
            <input id="dest_input" type="text" name="destination" placeholder="Destination" class="form-control">
        </div>
		</div>
	</div>

    <div class="col-md-2">    
        <div class="form-group" style="text-align:center;width:100%;">
            <label class="control-label" for="date">Date</label>
            <br>
			<input type="date" name="date" class="form-control">
		</div>
	</div>

	<div class="col-md-2">
	<div class="form-group" style="text-align:center;width:100%;">
		<label class="control-label" for="count_travelers">Travelers</label>
		<br>
		<input type="number" min=1 max=5 value=1 name="count_travelers" class="form-control">
	</div>
	</div>
	<div class="col-md-2">
		<div class="form-group" style="text-align:center;width:100%;">
		<label class="control-label" for="date">Class</label>
		<br>
		<select name="class">
			<option value="economy">Economy</option>
			<option value="business">Business</option>
			<option value="first">First Class</option>
		</select>
	</div>
	</div>
	</div>
        <br><br>
        <center>
            <button type="submit" class="btn btn-primary">Check</button>
            <button type="button" class="btn btn-danger">Reset</button>
        </center>
    </form>
    </div>

        <!--Displays list of flights-->

    <div id="search-result" style="display:block;text-align:center; margin:5%;">
	<div class='row' style='display:block;border-bottom:1px solid blue;padding:0 15px 0 15px;'>
        <div class="col-md-2"><h3>Flight No</h3></div>
        <div class="col-md-2"><h3>Departure</h3></div>
        <div class="col-md-2"><h3>Arrival</h3></div>
        <div class="col-md-2"><h3>Duration</h3></div>
        <div class="col-md-2"><h3>Class</h3></div>
        <div class="col-md-2"><h3>Fare</h3></div>
    </div>

    <?php
		displayFlight($conn,$_POST);
	?>
    </div>
	<footer class="footer">
		<a href="#">Contact us</a>
		<a href="#">FAQ</a>
		<br>
		<a href="#">Privacy Policy</a>
		<a href="#">Stay Connected</a>
	</footer>

	<script src="autoComplete.js"></script>
</body>

<?php
	function displayFlight($conn,$input){
		
		$source = strtolower($input['source']);
		$destination = strtolower($input['destination']);
        $count_travelers = $input['count_travelers'];
        $class = $input['class'];
    
        switch($class){
            case 'economy': $class_seats = 'e_seats';$class_name="Economy";
                break;
            case 'business': $class_seats = 'b_seats';$class_name="Business";
                break;
            case 'first': $class_seats = 'fc_seats';$class_name="First Class";
                break;
        }
		

        $sql = "SELECT fltno,etd,eta,duration,fare,fc_seats,b_seats,e_seats FROM Flights
                WHERE source='$source' && destination='$destination' && $class_seats>='$count_travelers'";


        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){		
			while($row = mysqli_fetch_assoc($result)){
				echo( 
				"<div class='row' style='display:block;border-bottom:1px dotted red;padding:15px;'>
					<div class='col-md-2'>".$row['fltno']."</div>
					<div class='col-md-2'>".$row['etd']."</div>
					<div class='col-md-2'>".$row['eta']."</div>
					<div class='col-md-2'>".$row['duration']."</div>
					<div class='col-md-2'>".$class_name."</div>
					<div class='col-md-2'>".$row['fare']."</div>
				</div>"
				);
			}
		}
		else{
			echo("<h2>Flight not found</h2>");
		}
	}
?>

</html>
