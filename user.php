<?php

session_start();

$username ="";
$email = "";
$psw = "";
$cpsw = "";
$errors = array();
//connect to db
$db = mysqli_connect('localhost','root','','airline_master');
//echo "connected";

//if the register button is clicked
if(isset($_POST['register'])) {
    $username = mysqli_real_escape_string($db,$_POST['username']);
    //echo $username;
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $psw = mysqli_real_escape_string($db,$_POST['psw']);
    $cpsw = mysqli_real_escape_string($db,$_POST['cpsw']);
    if(empty($username)) {
        array_push($errors,"Username is required");
        ?>
        <script>alert("Username is required");</script>
        <?php
    }
   else if(empty($email)) {
        array_push($errors,"email is required");
        ?>
        <script>alert("Email is required");</script>
        <?php
        
    }
    else if(empty($psw)) {
        array_push($errors,"password is required");
        ?>
        <script>alert("password is required");</script>
        <?php
    }
    else if($psw != $cpsw) {
        array_push($errors,"passwords do not match");
        ?>
        <script>alert("passwords do not match!");</script>
        <?php
    }


    //if there are no errors, save user to db
    if(count($errors) == 0) {
        $psw = md5($psw); //encryption
        $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$psw')";
        mysqli_query($db,$sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: homepage.php'); //redirect to homepage
    }

}

//log user in from login page
if(isset($_POST["login"])) {
    $username = mysqli_real_escape_string($db,$_POST['username']);
    //echo $username;
    $psw = mysqli_real_escape_string($db,$_POST['psw']);

    if(empty($username)) {
        array_push($errors,"Username is required");
    }

    if(empty($psw)) {
        array_push($errors,"password is required");
    }

    if(count($errors) == 0) {
        $psw = md5($psw); //encrypt before comparing
        $query = "SELECT * FROM users WHERE username='$username' AND password='$psw'";
        $result = mysqli_query($db,$query);
        if(mysqli_num_rows($result) == 1) {
            
            // Fetch user tuple
            $row = mysqli_fetch_assoc($result);
            //log user in
            $_SESSION['username'] = $username;
            $_SESSION['points'] = $row['points'];
            $_SESSION['success'] = "You are now logged in";
            header('location: homepage.php'); //redirect to homepage

        }
        else {
            array_push($errors,"Wrong username/password combination");
            //header("location : login.php");
        }
    }
}


//logout
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: homepage.php');
}

?>

