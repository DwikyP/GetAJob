<?php
  //Author : Dwiky Putra R R T
  //Description : main page for user that already login
  //Last Modified by : Dwiky Putra R R T 5-12-2018
  session_start();
  include 'connection.php';
  include 'email.php';

    if(!isset($_SESSION['login'])){
      header("Location: login.php");
      exit;
    }
    if(!isset($_POST['apply'])){
      header("Location: index.php");
      exit;
    }

    $userid = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    $query = "SELECT * FROM profile where user_id = '$userid'";
    $sql = mysqli_query($conn,$query);
    if(mysqli_num_rows($sql) === 0){
      header("Location: profile.php");
    }

    if(isset($_POST['apply'])){
    	date_default_timezone_set("Asia/Jakarta");
    	$row = mysqli_fetch_assoc($sql);
    	$profileid = $row['profile_id'];
    	$attachment = $row['resume'];
		$vacid = $_POST['apply'];
		$date = date("Y-m-d");

		$query = "SELECT * FROM vacancies where vac_id = '$vacid'";
		$sql = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($sql);

		$applyname = $row['vac_name'] . " Apply";

		$query = "INSERT INTO apply values('','$applyname','$date','$profileid','$vacid')";
		$sql = mysqli_query($conn,$query);

		$query = "SELECT * FROM users where user_id = '$userid'";
		$sql = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($sql);

		$userEmail = $row['email'];
		$uname = $row['username'];
		sendEmail($userEmail,$uname,$applyname,"You've Succesfully Applied<br>Thank You For Using Our Service","You've Succesfully Applied<br>Thank You For Using Our Service");

		$query = "SELECT * FROM vacancies,company where company.comp_id = vacancies.comp_id and vac_id = '$vacid'";
		$sql = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($sql);

		$userEmail = $row['comp_email'];
		$uname = $row['comp_name'];
		$text = "Here's New Apply for your vacancy, " . $row['vac_name'];

		sendEmailComp($userEmail,$uname,$applyname,$text,$text,$attachment);
 	 }

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jobfinder</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
 </head>

  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info fixed-top" style="padding-top:10px ;">
      <div class="container">
	  <img src = "images/logo.png" height="40px">
        <a class="navbar-brand text-white" style=" margin-left:25px;" href="menu.php">JOBFINDER</a>
		
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link text-light" href="logout.php">Log out</a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link text-light" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<div class="footer">Copyright&copy Jobfinder 2018</div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>