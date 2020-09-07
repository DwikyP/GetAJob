<?php
	//Author : Dwiky Putra R R T
	//Description : login page with session and cookie
	//Last Modified by : Dwiky Putra R R T 2-12-2018
	include 'connection.php';
	session_start();

	if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
		$id = $_COOKIE['id'];
		$key = $_COOKIE['key'];

		$result = mysqli_query($conn, "SELECT username FROM users WHERE user_id = $id");

		$row = mysqli_fetch_assoc($result);

		if ($key === hash('sha256', $row['username'])) {
			$_SESSION['login'] = true;
			$_SESSION['username'] = $row['username'];
		}
	}

	if(isset($_SESSION['login'])){
    	header("Location: index.php");
    	exit;
 	 }

	if(isset($_POST["login"])){
		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$username'");

		if(mysqli_num_rows($result) === 1){
			$row = mysqli_fetch_assoc($result);
			if(password_verify($password, $row["password"])){
				$_SESSION["login"] = true;
				$_SESSION["username"] = $row['username'];
				$_SESSION["user_id"] = $row['user_id'];

				if(isset($_POST['remember'])){
					setcookie('id',$row['user_id'],time() + 60);
					setcookie('key',hash('sha256',$row['username']),time() + 60);
				}

				header("Location: index.php");
				exit;
			}
		}
		$error = true;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <style>
.header{width:100%; height:50px;background-color:#16A3B5;top:0;left:0;position:fixed;color:white;padding-left:100px; padding-bottom:10px;}
.footer{width:100%; height:35px;background-color:#16A3B5;bottom:0;left:0;position:fixed;color:white; padding-top:20px; text-align:center; font-size:17.3px;}
.home{position:fixed; top:24px; z-index:2; color:white; right:100px; cursor:pointer;}
.login{position:fixed; top:24px; z-index:2; color:white; right:100px; cursor:pointer;}
.header{width:100%; height:50px;background-color:#16A3B5;top:0;left:0;position:fixed;color:white;padding-left:100px; padding-bottom:10px;}
.pos1{position:fixed; top:10px; color:white; z-index:2; left:100px; font-size:26px;}
.logo{position:fixed; top:5px; left:50px;}
.a{background-color:grey;margin-top:10%; border-radius: 25px; width: 500px;margin-left:30%;position: relative;-webkit-animation: mymove 3s;-webkit-animation-fill-mode: forwards;animation: mymove 3s;animation-fill-mode: forwards;}
@keyframes mymove {from {top: -300px;} to {top: 10px; background-color: lightgrey;}}
  </style>
</head>
<body>
  <div class="home" onClick="go1()">HOME</a></div>
  <div class="header"></div>
  <div class="logo"><img src = "images/logo.png" height="40px"></div>
  <div class="pos1">Jobfinder</div>

	<form action="" method="post">
		<div class="a">

	<table table align="center" style="line-height: 350%;">
		<tr>
			<td><h2>Log In</h2></td>
		</tr>
		<tr>
      <td><label for="username">Username or Email</td>
      <td>:</td> </label>
			<td><input type="text" name="username" id="username"></td>
    </tr>
    <tr>
      <td><label for="password">Password</td>
      <td>:</td> </label>
			<td><input type="password" name="password"></td>
    </tr>
    <tr></tr><tr></tr>
    <tr>
      <td><label for="remember">Remember me </label></td>
			<td><input type="checkbox" name="remember"></td>
    </tr>
    <tr>
			<td><button type="submit" name="login">Login</button></td>
    </tr>
    </table>
		</div>
    <div class="footer">Copyright&copy Jobfinder 2018</div>
	</form>

	<?php
	if(isset($error)){
		if ($username == "" || $password == "")
			echo "<h3><center>username / password cannot left blank</center></h3>";
		else
			echo "<h3><center>username / password salah</center></h3>";
	}
	?>
<script>
function go1(){
	window.location.href = "menu.php";
}
</script>

</body>
</html>
