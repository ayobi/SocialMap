<?php 

	$conn = mysqli_connect("socialmapclub.ipagemysql.com", "socialmapclub", "Socialmap2016!", "smdb");

	if(!$conn){
		die("Conneciton failed: ".mysqli_connect_error());
	}
?>