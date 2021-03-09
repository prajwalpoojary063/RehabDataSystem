<?php 
$conn=mysqli_connect('localhost','root','','rehab_system');
	if (!$conn) {
		echo 'connection error'.mysqli_connect_error();
	}
?>