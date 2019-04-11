<?php include('user.php');
 ?>

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
        <?php if(isset($_SESSION['username'])):?>
      <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['username'] ?></a></li>
      <li><a href="homepage.php?logout='1'"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		
        <?php else : ?>
        <li><a href="#" onClick="document.getElementById('registerForm').style.display='block'" style="width:auto;"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
        <li><a href="#" onClick="document.getElementById('loginForm').style.display='block'" style="width:auto;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php endif ?>
    </ul>
 
</div>
</nav>

<!--login form-->

<div class="container">
<div id="loginForm" class="modal"> 
    
  <form name="login" onsubmit="return validateForm()" class="modal-content animate" action="homepage.php" method="post"> 
      <span onclick="document.getElementById('loginForm').style.display='none'" class="close" title="Close Modal" style="float: right;padding:20px;" >×</span> 
       <p><center><h3>LOG-IN</h3></center><p>
          <div class="imgcontainer col-md-6" >
      <br>
      <img src="https://mnsearch.org/wp-content/uploads/2014/10/blank-2017.jpg" alt="Avatar" class="avatar" style="padding:20px;"> 
    </div> 
  <br>
    <div class="col-md-6"> 
    <?php if(count($errors) >0): ?>
			<div class="error">
				<?php foreach ($errors as $error): ?>
					<p><center><?php echo $error; ?></center></p>
				<?php endforeach ?>
			 </div><br>
			 <script>document.getElementById('loginForm').style.display='block'</script>
	<?php endif ?>

      <label><b>Username</b></label> 
      <input type="text" placeholder="Enter Username" name="username" id="uname" required> 
  		<br>
      <label><b>Password</b></label> 
      <input type="password" placeholder="Enter Password" name="psw" id="psw"> 
        <br>
      <button type="submit" name="login">Login</button> 
      <br>
      <input type="checkbox" checked="checked"> Remember me 
      <span class="psw"  style="background-color:#a5a5a5;padding-left:5px;padding-right:5px;"> <a href="#">Forgot password?</a></span> 
    </div> 
  
    <div class="container">
      
    </div> 
  </form> 
</div> 
<script> 
  
var modal = document.getElementById('loginForm'); 
window.onclick = function(event) { 
    if (event.target == modal) { 
        modal.style.display = "none"; 
    } 
} 
</script> 
</div>
<!---->


<!-----signup form ---->

<div class="container">
<div id="registerForm" class="modal"> 
    
  <form name="register" class="modal-content animate" action="homepage.php" method="post"> 
 
      <span onclick="document.getElementById('registerForm').style.display='none'" class="close" title="Close Modal" style="float: right;padding:20px;" >×</span> 
             <p><center><h3>Register</h3></center><p>
          <div class="imgcontainer col-md-6" >
      <br>
      <img src="https://mnsearch.org/wp-content/uploads/2014/10/blank-2017.jpg" alt="Avatar" class="avatar" style="padding:20px;"> 
    </div> 
  <br>
    <div class="col-md-6"> 
    <?php if(count($errors) >0): ?>
			<div class="error">
				<?php foreach ($errors as $error): ?>
					<p><center><?php echo $error; ?></center></p>
				<?php endforeach ?>
			 </div>
			 <br>
			 <script>document.getElementById('registerForm').style.display='block'</script>
	<?php endif ?>

      <label><b>Username : </b></label> 
      <input type="text" placeholder="Enter Username" name="username" id="uname"> 
  		<br><br>
  		<label><b>Email : </b></label> 
      <input type="email" placeholder="Enter email" name="email" id="email"> 
  		<br><br>
      <label><b>Password : </b></label> 
      <input type="password" placeholder="Enter Password" name="psw" id="psw"> 
        <br><br>
        <label><b>Confirm Password : </b></label> 
      <input type="password" placeholder="Enter Password Again" name="cpsw" id="psw"> 
        <br><br>
      <button type="submit" name="register">Sign Up</button>  <a href="#">Sign in instead?</a>
      <br><br>
    </div> 
  
    <div class="container">
      
    </div> 
  </form> 
</div> 
<script> 
  
var modal = document.getElementById('registerForm'); 
window.onclick = function(event) { 
    if (event.target == modal) { 
        modal.style.display = "none"; 
    } 
} 
</script> 
</div>

<!-------->
<div class="parent">
<div class="col-md-12">
    <div id="myCarousel" class="carousel slide row" data-ride="carousel" data-interval="2500">
    <center>
	<ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol></center>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active text-center">
		<img src="https://upload.wikimedia.org/wikipedia/commons/3/30/Echo_Park_Lake_with_Downtown_Los_Angeles_Skyline.jpg" alt="testimonial" class="center-block" width="100%" style="height: 700px">
	</div>
    <div class="item text-center">
		<img src="https://in.lastminute.com/blog/wp-content/uploads/2018/10/iTraveller-new-campaign-fb-posts-278a-tourist-places-in-Madlives-595x335.png" alt="testimonial" class="center-block" width="100%" style="height: 700px">	
	</div>
	<div class="item text-center">
		<img src="https://static.independent.co.uk/s3fs-public/thumbnails/image/2018/01/31/09/new-york-main-image.jpg" alt="testimonial" class="center-block" width="100%" style="height: 700px">
	</div>
  </div>
  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!---------->   
<div class="tabs" style="position:absolute;top:15%;">
<ul class="nav nav-tabs"> 
  <li class="active"><a data-toggle="tab" href="#book-tab">Book</a></li>
  <li><a data-toggle="tab" href="#check-in">Check-In</a></li>
  <li><a data-toggle="tab" href="#fstatus">Flight Status</a></li>
</ul>
<div class="tab-content">
  <div id="book-tab" class="tab-pane fade in active">
    <div id="div-finfo" style="display: none;">
        <form autocomplete="off" id="form-finfo" name="bookTickets" action="flightSearch.php" method="POST">
        <div class="autocomplete" style="width:200px;">
            From: <input id="src_input" type="text" name="origin" required="true" placeholder="Source">
        </div>
        
        <div class="autocomplete" style="width:200px;"> 
            To: <input id="dest_input" type="text" name="destination" required="true" placeholder="Destination">
        </div>
        <br><br>
            Date : 
            <input type="date" name="date"><br><br>
            <input type="radio" name="trip" value="oneway" checked>One-way
            <input type="radio" name="trip" value="return">Return<br><br>
            No of Travellers : 
            <input type="number" min=1 max=5 name="noofppl"><br><br>
            Class :  
            <select name="class">
                <option value="economy">Economy</option>
                <option value="business">Business</option>
                <option value="first">First Class</option>
            </select><br><br>
            <input type="submit" value="Book" name="bookflight">
            <input type="reset" value="Reset">

        </form>
    </div>
  </div>
  <div id="check-in" class="tab-pane fade">
    <h3>Check In</h3>
    	<form action="#">
  		<div class="form-group">
    		<label for="cno">Confirmation No:</label>
    		<input type="Text" class="form-control" id=cno">
  		</div>
  		<div class="form-group">
    		<label for="ln">Last Name:</label>
    		<input type="text" class="form-control" id="ln">
  		</div>
   		<button type="submit" class="btn btn-default">Check</button>
		</form>
    </div>
	<div id="fstatus" class="tab-pane fade">
    <h3>Flight Status</h3>
    	<form action="#">
  		<div class="form-group">
    		<label for="source">From:</label>
    		<input type="Text" class="form-control" id=source">
  		</div>
  		<div class="form-group">
    		<label for="dest">Destination:</label>
    		<input type="text" class="form-control" id="dest">
  		</div>
  		<div class="form-group">
  			<label for="date">Date:</label>
  			<input type="date" class="form-control" id="date">
  		</div>
   		<button type="button" class="btn btn-primary">Check</button>
		</form>
    </div>
  </div>
    <br>
    <br>
</div>
</div>
<div class="container" style="display:inline-block;width:100%;">
    <h3>Popular Destinations : </h3>
<div>
    <center>
    <div class="row">
    <div class="col-md-4">
        <div class="thumbnail">
        <a href="#">
            <img src="https://en.parisinfo.com/var/otcp/sites/images/media/1.-photos/02.-sites-culturels-630-x-405/tour-eiffel-trocadero-630x405-c-thinkstock/37221-1-fre-FR/Tour-Eiffel-Trocadero-630x405-C-Thinkstock.jpg" width="100%" height="parent" alt="Lights">
            <div class="caption">
            <p>Paris</p>
            </div>
        </a>
        </div>
        </div> 
        
    <div class="col-md-4">
        <div class="thumbnail">
            <a href="#">
                <img src="https://www.680news.com/wp-content/blogs.dir/sites/2/2017/02/london-england.jpg" width="100%" height="parent" alt="london">
                <div class="caption">
                    <p>London</p>
                </div>
            </a>
        </div>
    </div>   

        <div class="col-md-4">
            <div class="thumbnail">
            <a href="#">
                    <img src="https://thumbor.forbes.com/thumbor/960x0/https%3A%2F%2Fblogs-images.forbes.com%2Falexcapri%2Ffiles%2F2018%2F09%2FSingapore-1200x800.jpg" width="100%" height="parent" alt="Singapore">
                    <div class="caption">
                        <p>Singapore</p>
                    </div>
                </a>
        </div>
    </div>
    </center>
</div>
</div>
    <footer class="footer">
        <a href="#">Contact us</a>
        <a href="#">FAQ</a>
        <br>
        <a href="#">Privacy Policy</a>
        <a href="#">Stay Connected</a>
    </footer>
    
    <script src="formValidation.js"></script>
    <script src="autoComplete.js"></script>
    <script>
        $(document).ready(function(){
            $("#div-finfo").mouseenter(function(){
                $("#form-finfo").fadeTo("slow", 1);
                //alert("You entered p1");
            });

            $("input").focus(function(){
                $(this).css("background-color", "#cccccc");
            });
            $("input").blur(function(){
                $(this).css("background-color", "#f1f1f1");
            });

            $(".close").click(function(){
                $(this).fadeIn("background-color", "#ffffff");
            });

        });
    </script>
    <?php
    	if(isset($_SESSION['username'])) {
		//header('location: login.php');
		?>
		<script>alert("Hello <?php echo $_SESSION['username'] ?>!");</script>
		<?php 
	}

    ?>

</body>
</html>

