<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$connect = mysql_connect("mysql13.000webhost.com", "a3832556_sm", "socialmap2016")
		or die ("Couldn't connect!");
		mysql_select_db("a3832556_smap") or die ("Couldn't find DB");
		
		$query = mysql_query("SELECT * FROM users WHERE username='$username'
		AND password='$password'");
		
		$numrows = mysql_num_rows($query);
		echo $numrows;

?>
