<?php 

	$conn = mysqli_connect("mysql7.000webhost.com", "a7552541_admin", "password123", "a7552541_social");

	if(!$conn){
		die("Conneciton failed: ".mysqli_connect_error());
	}
?>