<?php
  //Author : Dwiky Putra R R T
  //Description : main page for user that already login
  //Last Modified by : Dwiky Putra R R T 5-12-2018
  session_start();
  include 'connection.php';

    if(!isset($_SESSION['login'])){
      header("Location: login.php");
      exit;
    }

     if(!isset($_POST['submit'])){
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
       
    echo "<div style='font-size:2em;color:#0e3c68;font-weight:bold;margin-left:128px;margin-top:50px'>Welcome</div><img src='images/user.png' width='50' height='50' style='padding-top=100%; margin-left:128px' />$fname $lname, $lastedu, $major"; 

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

 
      <div class="container">
  <br><br>

  <br>
  <h4>Job recommendations for you</h4>
  <form action="apply.php" method="post">
  <table align="left" width="103%" color="cyan" class="table2" border="1">
    <thead>
    </thead>
    <tbody>
      <tr>
        <td><b><center>JOB NAME</center></b></td>
        <td><b><center>JOB SALARY</center></b></td>
        <td><b><center>POSTED DATE</center></b></td>
        <td><b><center>JOB DESCRIPTION</center></b></td>
        <td><b><center>CITY</center></b></td>
        <td><b><center>COMPANY</center></b></td>
      </tr>
      <tr>
      <?php 
      $vacid = $_POST['submit'];
      $query = "SELECT vacancies.vac_name, vacancies.salary, vacancies.vac_date, vacancies.vac_desc, city.city_name, company.comp_name from requirement, city, company,vacancies where city.city_id = vacancies.city_id AND company.comp_id = vacancies.comp_id AND vacancies.vac_id = requirement.vac_id AND vacancies.vac_id='$vacid'";
      $sql = mysqli_query($conn,$query);
      $row = mysqli_fetch_assoc($sql);
        echo "<td><center>".$row['vac_name']."</center></td>";  
        echo  "<td><center>".$row['salary']."</center></td>";
        echo  "<td><center>".$row['vac_date']."</center></td>";
        echo  "<td><center>".$row['vac_desc']."</center></td>";
        echo  "<td><center>".$row['city_name']."</center></td>";
        echo  "<td><center>".$row['comp_name']."</center></td>";
      ?>
      </tr>
      <tr>
        <td colspan="6"><center><button type="submit" name="apply" value="<?php echo $vacid; ?>">Apply Now</button></center></td>
      </tr>
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
