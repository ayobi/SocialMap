<?php 

	$conn = mysqli_connect("localhost", "root", "", "socialmap");

	if(!$conn){
		die("Conneciton failed: ".mysqli_connect_error());
	}
?>