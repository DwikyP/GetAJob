<?php
  //Author : Stefen Kristanto T
  //Description : search page for user that already login
  //Last Modified by : Stefen Kristanto T 5-12-2018
  session_start();
  include 'connection.php';

    if(!isset($_SESSION['login'])){
      header("Location: login.php");
      exit;
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
            <?php echo "<li class='nav-item'>
                 <a class='nav-link text-light' href='index.php'><img src='images/user.png' width='20' height='20'>".strtoupper($_SESSION['username'])."</a>
                </li>"; 
            ?>
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

 
      <div class="container" style="overflow: auto;" >
	<br><br>
	<h4>Find your job here</h4>
  <form action="" method="post">
    <a>SEARCH JOB NAME</a>
    <input type="text" name="sitem">
    <input type="submit" name="sbm" value="SEARCH"><br>
  </form>
  <br>
  <form action="description.php" method="post">
    <table align="left" width="70%" bgcolor="lightgrey" class="table3">
    <tr>
        <td>Job Name</td>
        <td>Company</td>
    </tr>
        <?php
        if (isset($_POST['sbm'])){
          if (isset($_POST['sitem'])){
          $input = $_POST['sitem'];
          $query = "SELECT * FROM (vacancies JOIN company ON company.comp_id = vacancies.comp_id)JOIN city ON city.city_id = vacancies.city_id WHERE vacancies.vac_name  like '%".$input."%' OR company.comp_name like '%".$input.";'";
          $sql = mysqli_query($conn,$query);
          while ($row = mysqli_fetch_assoc($sql)){
            echo "<tr>";
            echo "<td>".$row["vac_name"]."</td>";
            echo "<td>".$row["comp_name"]."</td>";
            ?>
            <td><button name='submit' type='submit' value="<?php echo $row['vac_id']; ?>">Learn More</button></td>
            <?php
            echo "</tr>";
          }
          }
        }
        ?>
  </table>
</form>

    </div>
    <br>
    <br>

    <!-- /.container -->

    <!-- Footer -->
  <div class="footer">Copyright&copy Jobfinder 2018</div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>