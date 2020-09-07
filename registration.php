<?php
	//Author : Stefen Kristanto Tunggul
	//Description : php to add the registration form to database
	//Last Modified by : Stefen Kristanto Tunggul 1-12-2018

	include 'connection.php';
	session_start();

	if(isset($_SESSION['login'])){
	    header("Location: index.php");
	    exit;
  	}

	$errors = array();
	if(isset($_POST["register"])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$cpass = $_POST['cpass'];
		$personal = $_POST['personal'];
		$answer = $_POST['answer'];
		$emailvalid = preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email);
		//validating the user input
		$query = "SELECT * FROM users Where username = '$username'";
		$sql = mysqli_query($conn,$query);
		if ($username=="" || $pass=="" || $cpass=="" || $answer =="" || $email ==""){
			array_push($errors,"Can not Left Blank !");
		}
		if ($pass !== $cpass){
			array_push($errors,"Password must match with the confirm password !");
		}
		if (mysqli_num_rows($sql) > 0 ){
			array_push($errors,"Username has already been used !");
		}
		if (!$emailvalid){
			array_push($errors,"Email not valid !");
		}
		$query = "SELECT * FROM users Where email = '$email'";
		$sql = mysqli_query($conn,$query);
		if (mysqli_num_rows($sql) > 0){
			array_push($errors,"Email has been registered !");
		}
		if (strlen($pass) < 8){
			array_push($errors,"Password at least 8 characters !");
		}

		//if there is no more errors, then the data will be inputted to database
		if (count($errors) == 0){
			$pass = password_hash($pass, PASSWORD_DEFAULT);
			$query = "INSERT INTO Users VALUES('', '$username', '$email', '$pass', '$personal', '$answer')";
			$sql = mysqli_query($conn,$query);
			echo "<center><div id='show'><h2>U have <u>successfully</u> registered to our Site</h2><button onclick='go2()'>Login Now</button></div></center>";
		}
	}
?>
<!DOCTYPE html>
<html> 

<head>
	<title>Registration Page</title> 
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="home" onClick="go1()">HOME</a></div>
	<div class="login" onClick="go2()">LOGIN</div>
	<div class="header"></div>
	<div class="pos1">Registration</div>
	<div class="info">
		<h1 style="color:orange">QUOTES</h1>
		<h2><div id="qt"></div></h2>
	</div>
	<br><br>
	<form action="" method="post">
		<table width="40%" class="table1">
			<tr>
				<td colspan="3"><b>Fill The Information Correctly</b></td>
			</tr>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="username" id="username"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><input type="text" name="email" id="email"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="password" name="pass" id="pass"></td>
			</tr>
			<tr>
				<td>Confirm Password</td>
				<td>:</td>
				<td><input type="password" name="cpass" id="cpass"></td>
			</tr>
			<tr>
				<td>Personal Question</td>
				<td>:</td>
				<td>
					<select name="personal">
						<option value="FavColor">Favorite Color</option>
						<option value="FirstPet">First Pet</option>
						<option value="FavFood">Favorite Food</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Answer</td>
				<td>:</td>
				<td><input type="text" name="answer" id="answer1"></td>
			</tr>
			<tr>
				<td><input type="reset" class="re" value="CANCEL"></td>
				<td></td>
				<td><input type="submit" class="sub" name="register" value="REGISTER"></td>
			</tr>
		</table>
	</form>
	<br><br>
	<?php if (count($errors) > 0) :?>
		<center><div id="show">
			<h2>Sorry there are some wrong inputs :</h2>
			<?php foreach ($errors as $error) : ?>
				<p><h3><?php echo $error ?></h3></p>
			<?php endforeach ?>
			<button id="close" onclick="exit()">OK</button>
		</div></center>
	<?php endif ?>
	<div class="footer">Copyright&copy Jobfinder 2018</div>
</body>
</html>

<script> //this script is only for the interactive quotes
	//script Author : Stefen Kristanto Tunggul
	//Description : to make quotes in the page that always change
	//Last Modified by : Stefen Kristanto Tunggul 22-11-2018
var text = ["If you can DREAM it, you can DO it. – Walt Disney", "Choose a job you love, and you will never have to work a day in your life. – Confucius", "Make sure your worst enemy doesn’t live between your two ears. – Laird Hamilton", "Success consists of going from failure to failure without loss of enthusiasm. – Winston Churchill", "A mind that is stretched by new experiences can never go back to its old dimensions. – Oliver Wendell Holmes, Jr.", "Love the life you live. Live the life you love. – Bob Marley", "Keep away from people who try to belittle your ambitions. Small people always do that, but the really great ones make you feel that you too can become great. – Mark Twain", "I’ve missed more than 9,000 shots in my career. I’ve lost almost 300 games. 26 times, I’ve been trusted to take the game winning shot and missed. I’ve failed over and over and over again in my life. And that is why I succeed. – Michael Jordan"];
var counter = 0;
var elem = document.getElementById("qt");
var inst = setInterval(change, 3000);

function go1(){ //function to go to menu page
	window.location.href = "menu.php";
}

function go2(){ //function to go to login page
	window.location.href = "login.php";
}

function change() { //function to change the quotes text
  elem.innerHTML = text[counter];
  counter++;
  if (counter >= text.length) {
    counter = 0;
  }
}

function exit(){ //function to close the pop up message box
	document.getElementById("show").style.display = "none";
}
</script>