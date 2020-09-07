
<?php
//Author : Daniel Hosea
//Description : input Page user's profile
//last Modified by : Daniel Hosea 12-4-2018
	include 'connection.php';
	session_start();

	if(!isset($_SESSION['login'])){
		header("Location: login.php");
		exit;
	}
	$userid = $_SESSION['user_id'];
	$query = "SELECT * FROM profile where user_id = '$userid'";
	$sql = mysqli_query($conn,$query);
	if(mysqli_num_rows($sql) === 1){
		header("Location: index.php");
	}

		$errors = array();
	if(isset($_POST['Submit'])){
		$fname=$_POST["fname"];
		$lname=$_POST["lname"];
		$phone=$_POST["Pnumber"];
		$city=$_POST["city"];
		$dob=$_POST["dob"];
		$exp=$_POST["exp"];
		$ledu=$_POST["last_edu"];
		$prov=$_POST["province"];

		$resume= addslashes(file_get_contents($_FILES['myfile']['tmp_name']));
		$resumename= addslashes($_FILES['myfile']['name']);

		$userid = $_SESSION['user_id'];

		if(!preg_match('/^[a-zA-Z\s]+$/', $fname)){
			array_push($errors,"first name mush be aphabet!");
		}
		if(!preg_match('/^[a-zA-Z\s]+$/', $lname)){
			array_push($errors,"last name mush be aphabet!");
		}
		if(!is_numeric($phone)){
			array_push($errors,"phone number mush be numeric!");
		}
		if($prov==""){
			array_push($errors,"province can't be left blank!");
		}
		if($city==""){
			array_push($errors,"city can't be left blank!");
		}
		if($dob==""){
			array_push($errors,"date of birth can't be left blank!");
		}
		if($ledu==""){
			array_push($errors,"last education can't be left blank!");
		}
		if($resume==""){
			array_push($errors,"resume can't be left blank!");
		}

		if(count($errors)==0) {
		$query = "INSERT INTO `profile` Values('','$fname','$lname','$dob','$phone','$exp','$resume','$resumename','$city','$ledu','$userid')";
		$sql = mysqli_query($conn,$query);
		echo "<center><div id='show'><h2>U have successfully registered your profile</h2><button onclick='gotopage()'>Next</button></div></center>";
		}
	}

?>

<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js " type="text/javascript"></script>
<style>
#show{z-index: 2;color:white; width:80%; background-color:black; top:80px; height:500px; padding-top:20px;opacity:0.9;border-radius:15px; position:fixed;left:10%; animation-name:down; animation-duration:3s;}
#close{min-width:100px;}
.home{position:fixed; top:24px; z-index:2; color:white; right:200px; cursor:pointer;}
.login{position:fixed; top:24px; z-index:2; color:white; right:100px; cursor:pointer;}
.header{width:100%; height:50px;background-color:#16A3B5;top:0;left:0;position:fixed;color:white;padding-left:100px; padding-bottom:10px;}
.pos1{position:fixed; top:16px; color:white; z-index:2; left:100px; font-size:26px;}
.footer{width:100%; height:35px;background-color:#16A3B5;bottom:0;left:0;position:fixed;color:white; padding-top:20px; text-align:center; font-size:17.3px;}
</style>
</head>
<script>
function getProvince(val) {
	$.ajax({
	type: "POST",
	url: "get_Province.php",
	data:'province_id='+val,
	success: function(data){
		$("#cityList").html(data);
	}
	});
}


</script>
<body>
	<div class="home" onClick="go1()">HOME</a></div>
	<div class="login" onClick="go2()">LOGOUT</div>
	<div class="header"></div>
	<div class="pos1">PROFILE</div>
<form action="" method="POST" enctype="multipart/form-data">
	<table align="center" style=" padding-top: 100px; line-height: 250%;">
<tr>
	<td>First Name</td>
	<td>:</td>
	<td><input type="text" name="fname"></td>
</tr>
<tr>
	<td>Last Name</td>
	<td>:</td>
	<td><input type="text" name="lname"><td>
</tr>
<tr>
	<td>Phone Number</td>
	<td>:</td>
	<td><input type="text" name="Pnumber"></td>
</tr>

<tr>
	<td>Province</td>
	<td>:</td>
  <td><select name="province" id="provinceList" onChange="getProvince(this.value);">
    <option value="">Select Province</option>
    <?php
      $result = mysqli_query($conn,"SELECT * FROM province");
      while ($row = $result -> fetch_assoc()) {
        ?>
        <option value="<?php echo $row['province_id']; ?>"><?php echo $row['province_name']; ?></option>
    <?php
      }
     ?>
  </select></td>
</tr>
<tr>
	<td>City</td>
	<td>:</td>
  <td><select name="city" id="cityList">
    <option value="">Select City</option>
  </select></td>
</tr>
<tr>
  <td>Date of birth</td>
	<td>:</td>
	<td><input type="date" name="dob" max="1999-12-31"></td>
</tr>
<tr>
	<td>Experiences</td>
	<td>:</td>
	<td><textarea rows="4" cols="50" name="exp"> </textarea></td>
	</td>
</tr>
<tr>
	<td>Last education</td>
	<td>:</td>
	<td><select name="last_edu" id="lasteducation">
		<option value="">last education</option>
		<?php
			$result = mysqli_query($conn,"SELECT * FROM academic");
			while ($row = $result -> fetch_assoc()) {
				?>
				<option value="<?php echo $row['acd_id']; ?>"><?php echo $row['last_edu']; ?>-<?php echo $row['experties']; ?></option>
		<?php
			}
		 ?>
	</select></td>
</tr>
<tr>
	<td>Input your resume</td>
	<td>:</td>
	<td><input type="file" name="myfile" id="myfile"></td>
</tr>
<tr>
	<td><input type="Submit" value="Submit" name="Submit"></td>
</tr>
</table>
</form>

<?php if (count($errors) > 0) :?>
	<center><div id="show">
		<h2>Sorry there are some wrong inputs :</h2>
		<?php foreach ($errors as $error) : ?>
			<p><h3><?php echo $error ?></h3></p>
		<?php endforeach ?>
		<button id="close" onclick="exit()">OK</button>
	</div></center>
<?php endif ?>
<script>

function go1(){
	window.location.href = "menu.php";
}

function go2(){
	window.location.href = "logout.php";
}
function gotopage(){
	window.location.href = "index.php";
}

function exit(){
	document.getElementById("show").style.display = "none";
}
</script>
<div class="footer">Copyright&copy Jobfinder 2018</div>
</body>

</html>
