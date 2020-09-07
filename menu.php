<?php  
  //Author : Daniel Hosea
  //Description : home page for public
  //Last Modified by : Dwiky Putra R R T 2-12-2018
  session_start();
?>

<!DOCTYPE html>
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

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info fixed-top" style="padding-top:10px ;">
      <div class="container">
	  <img src = "images/logo.png" height="40px">
        <a class="navbar-brand text-white" style=" margin-left:25px;">JOBFINDER</a>
		
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php  
                if(isset($_SESSION['login'])){
                echo "<li class='nav-item'>
                      <label class='nav-link text-light'>Welcome</label>
                      </li>
                      <li class='nav-item'>
                      <a class='nav-link text-light' href='index.php'><img src='images/user.png' width='20' height='20'>".strtoupper($_SESSION['username'])."</a>
                      </li>
                      <li class='nav-item'>
                      <a class='nav-link text-light' href='find.php'>Search</a>
                      </li>
                      <li class='nav-item'>
                      <a class='nav-link text-light' href='contact.php'>Contact</a>
                      </li>
                      <li class='nav-item'>
                        <a class='nav-link text-light' href='logout.php'>Log out</a>
                      </li>";
               }
               else{
                echo "<li class='nav-item'>
                      <a class='nav-link text-light' href='login.php'>Login</a>
                      </li>
                      <li class='nav-item ''>
                      <a class='nav-link text-light' href='registration.php'>Sign up</a>
                      </li>";
               }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('images/google.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Google</h3>
              <p>Google is an American multinational technology company that specializes in Internet-related services and products, which include online advertising technologies, search engine, cloud computing, software, and hardware..</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('images/mc1.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Microsoft</h3>
              <p>Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('images/apple.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Apple inc.</h3>
              <p>Apple Inc. is an American multinational technology company headquartered in Cupertino, California, that designs, develops, and sells consumer electronics, computer software, and online services. </p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <h2 class="my-4">Looking for a job? Find here!</h2>

      <!-- Portfolio Section -->
      <h6>Finding and getting a job can be a challenging process, but knowing more about job search methods and application techniques may increase your chances of success.</h6>

      <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="images/jobsearch.jpg" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Plan your job search</a>
              </h4>
              <p class="card-text">Your first impulse may be to surf the Web for job ads or grab the help-wanted section of the newspaper. But your job search will be more effective if you first take the time to create a plan.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="images/resume1.jpg" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Get in the door with a great resume or job application. </a>
              </h4>
              <p class="card-text">The job application is often your first step. Employers use it to learn about your qualifications and compare you to other applicants. But some prefer that you submit a resume. </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="images/inter.jpg" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Interview for a job</a>
              </h4>
              <p class="card-text">An interview is your opportunity to learn more about an employer and the available job. Preparation is key to your success. Before the interview, learn about the organization and position from multiple sources</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <h2>About us</h2>
          <p>Jobfinder is the #1 job site in the world with over 200 million unique visitors every month. jobfinder strives to put job seekers first, giving them free access to search for jobs, post resumes, and research companies. Every day, we connect millions of people to new opportunities.</p>
          <ul>
         
            <li><strong>Sign up</li>
            <li>Find a job</li>
            <li>Get a job</li></strong>
    
          </ul>
          <p>At Jobfinder, our mission is to help people get jobs. We have more than 3.000 global employees passionately pursuing this purpose and improving the recruitment journey through real stories and data. We foster a collaborative workplace that strives to create the best experience for job seekers.</p>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="images/aaa.jpg" alt="">
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Call to Action Section -->
      <div class="row mb-4">
        <div class="col-md-8">
          <p>What are you waiting for? Find your job now</p>
        </div>
        <div class="col-md-4">
          <?php  
            if(isset($_SESSION['login']))
              echo " <a class='btn btn-lg btn-secondary btn-block bg-info' href='index.php'>Find Job</a>";
            else
              echo " <a class='btn btn-lg btn-secondary btn-block bg-info' href='login.php'>Find Job</a>";
          ?>
         
        </div>
      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white" >Copyright &copy;Jobfinder 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
