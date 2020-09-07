<!DOCTYPE html PUBLIC>
<head>
<script type="text/javascript">//alert("sdfsd");</script>
</head>
<body>
<?php
//Author : Daniel Hosea
//Description : input Page user's profile
//last Modified by : Daniel Hosea 12-4-2018
include 'connection.php';

	$query ="SELECT * FROM city WHERE province_id = '" . $_POST["province_id"] . "'";
	$results = mysqli_query($conn,$query);
?>
<?php
	while($row=$results->fetch_assoc()) {
?>
	<option value="<?php echo $row["city_id"]; ?>"><?php echo $row["city_name"]; ?></option>
<?php

}
?>
</body>
</html>
