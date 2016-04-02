<?php
	session_start();
	include '../dbh.php';
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username= '$username'"; 
	$result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $hash_pwd = $row['password'];
        $hash = password_verify($password, $hash_pwd);

        if($hash == 0) {
             header("Location: ../index.php?error=empty");
             exit();
        } else {

	$sql = "SELECT * FROM users WHERE username='$username' AND password='$hash_pwd'"; 
	$result = $conn->query($sql);
	
	if(!$row = $result->fetch_assoc()){
		echo "Your username or password is incorrect!";
	}
	else{
		$_SESSION['id'] = $row['id'];
	}
	
	header("Location: ../map.php");

        }
?>
