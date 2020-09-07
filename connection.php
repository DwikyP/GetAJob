<?php
define ('server', 'localhost');
define ('dir', 'root');
define ('dir2', '');
define ('dbase', 'FJusers');
$conn = mysqli_connect(server, dir, dir2, dbase);
if (!$conn)
	echo "NOT CONNECTED";
?>
