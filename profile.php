<!DOCTYPE html>

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


  <?php include('user.php');
  ?>

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
    

<header>
    <img src="https://dribbble.com/shots/2021168-Google-Flights">  The Airlines
</header>

</head>


<body>
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
        <?php if(isset($_SESSION['username'])):?>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['username'] ?></a></li>
      <li><a href="homepage.php?logout='1'"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		
        <?php else : ?>
        <li><a href="#" onClick="document.getElementById('registerForm').style.display='block'" style="width:auto;"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
        <li><a href="#" onClick="document.getElementById('loginForm').style.display='block'" style="width:auto;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php endif ?>
    </ul>
	</div>
</nav>

<div class="container" style="text-align:center; box-shadow:0px 0px 5px 1px rgba(0,0,0,0.35); margin-top:5%;">
    
<?php
  

  $username = $_SESSION['username'];

  $sql = "SELECT username,points FROM users WHERE username='$username";

  $result = mysqli_query($conn,$sql);
  
  echo "<h2>Your Profile</h2>
  <h3>Username:<span style='color:blue;'> ".$_SESSION['username']."</span></h3>
  <h3>Mileage Points:<span style='color:blue;'> ".$_SESSION['points']."</span></h3>";
  

?>

</div>

</body>
</html>