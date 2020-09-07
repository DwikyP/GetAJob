<!--Author : Stefen Kristanto Tunggul 001201700061
    Description : contact us page 
    last modified by : Stefen Kristanto Tunggul 4-12-2018
-->
<?php
  session_start();
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
    <style type="text/css">
    .footer{width:100%; height:40px;background-color:#16A3B5;bottom:0;left:0;position:fixed;color:white; padding-top:3px; text-align:center;}
  </style>
 </head>

  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info fixed-top" style="padding-top:10px ;">
      <div class="container">
    <img src = "images/logo.png" height="40px">
        <a class="navbar-brand text-white" style=" margin-left:25px;" href="menu.php">JOBFINDER</a>
    
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
          if (!isset($_SESSION['login'])){
            echo"<div class='collapse navbar-collapse' id='navbarResponsive'>
                 <ul class='navbar-nav ml-auto'>
                 <li class='nav-item'>
                 <a class='nav-link text-light' href='login.php'>Login</a>
                 </li>
                 <li class='nav-item '>
                 <a class='nav-link text-light' href='registration.php'>Sign up</a>
                 </li>
                 </ul>
                 </div>";
          }
          else{
            echo "<div class='collapse navbar-collapse' id='navbarResponsive'>
                  <ul class='navbar-nav ml-auto'>
                  <li class='nav-item'>
                  <label class='nav-link text-light'>Welcome</label>
                  </li>
                  <li class='nav-item'>
                  <a class='nav-link text-light' href='index.php'><img src='images/user.png' width='20' height='20'>".strtoupper($_SESSION['username'])."</a>
                  </li>
                  <li class='nav-item'>
                  <a class='nav-link text-light' href='find.php'>Search</a>
                  </li>
                  <li class='nav-item'>
                        <a class='nav-link text-light' href='logout.php'>Log out</a>
                  </li>
                  </ul>
                  </div>";
          }
        ?>
      </div>
    </nav>

 
    <div class="container">
  <br><br>

  <br><br><br>
  <h4>Contact US :</h4>
  <br><h5>For more information you can contact our office
  <br>or by emailing your needs to our email 
  <br><br><br>
  Email : findjobltd@gmail.com
  <br>
  Phone : (+62) 89923415532

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <div class="footer">Copyright&copy Jobfinder 2018</div>
    <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>