<?php
  //Author : Stefen Kristanto T
  //Description : main page for user that already login
  //Last Modified by : Stefen Kristanto T 5-12-2018
  session_start();
  include 'connection.php';

    if(!isset($_SESSION['login'])){
      header("Location: login.php");
      exit;
    }

    $userid = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    $query = "SELECT * FROM profile where user_id = '$userid'";
    $sql = mysqli_query($conn,$query);
    if(mysqli_num_rows($sql) === 0){
      header("Location: profile.php");
    }

    $query = "SELECT academic.acd_id, academic.last_edu, academic.experties, profile.fname, profile.lname
        FROM academic, profile
        WHERE academic.acd_id = profile.acd_id and user_id = '$userid'";
    $sql = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($sql);
    $fname = strtoupper($row['fname']);
    $lname = strtoupper($row['lname']);
    $lastedu = $row['last_edu'];
    $major = $row['experties'];
    $acdid = $row['acd_id'];
       
    echo "<div style='font-size:2em;color:#0e3c68;font-weight:bold;margin-left:128px;margin-top:50px'>Welcome</div><img src='images/user.png' width='50' height='50' style='padding-top=100%; margin-left:128px' /><b>$fname $lname</b>, $lastedu $major<br><div style='color:#0e3c68;font-weight:bold;margin-left:128px;margin-top:0px'><a href='editprofile.php'>Edit Profile</a></div> "; 
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
            <li class='nav-item'>
              <a class='nav-link text-light' href='find.php'>Search</a>
            </li>
           <li class="nav-item">
              <a class="nav-link text-light" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="logout.php">Log out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

 
      <div class="container">
	<br><br>
	<h4>Job recommendations for you</h4>
  <form action="description.php" method="post">
  <table align="left" width="70%" bgcolor="lightgrey" class="table2" style="overflow: auto;">
    <thead>
    </thead>
    <tbody>
        <tr>
          <td><b>JOB NAME</b></td>
          <td></td>
        </tr>
        <?php 
          $query = "SELECT * FROM requirement,academic,vacancies 
          Where academic.acd_id = requirement.acd_id AND vacancies.vac_id = requirement.vac_id and academic.acd_id = '$acdid'";
          $sql = mysqli_query($conn,$query);
          While($row = mysqli_fetch_assoc($sql)){
            echo "<tr>";
            echo "<td>" .$row["vac_name"]. "</td>";
            ?>
            <td><button name='submit' type='submit' value="<?php echo $row['vac_id']; ?>">Learn More</button></td>
            <?php
            echo "</tr>";
          }
        ?>
    </tbody>
  </table>
  </form>
    </div>
    <!-- /.container -->

    <!-- Footer -->
  <div class="footer">Copyright&copy Jobfinder 2018</div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>