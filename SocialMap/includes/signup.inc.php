<?php
	session_start();
	include '../dbh.php';
	
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if (empty($firstName) || empty($lastName) || empty($username) || empty($password)){
		header("Location: ../signup.php?error=empty");
		exit();
	}
	else {
		$sql = "SELECT username FROM user WHERE username='$username'";
		$result = $conn->query($sql);
		$usernameCheck = mysqli_num_rows($result);
		if ($usernameCheck > 0){
			header("Location: ../signup.php?error=username");
			exit();
		}
		else{
			$sql = "INSERT INTO users (firstName, lastName, username, password) 
			VALUES('$firstName', '$lastName', '$username', '$password')";
			$result = $conn->query($sql);
		
			header("Location: ../index.php");
		}
	}
?>