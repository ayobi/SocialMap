<?php
	session_start();
	include '../dbh.php';
	
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$username = $_POST['username1'];
	$password = $_POST['password1'];
	
	if (empty($firstName) || empty($lastName) || empty($username) || empty($password)){
		header("Location: ../index1.php?error=empty");
		exit();
	}
	else {
		$sql = "SELECT username FROM users WHERE username='$username'";
		$result = $conn->query($sql);
		$usernameCheck = mysqli_num_rows($result);
		if ($usernameCheck > 0){
			header("Location: ../index1.php?error=username");
			exit();
		} else{
			$enPW = password_hash($password, PASSWORD_DEFAULT);
			$sql = "INSERT INTO users (firstName, lastName, username, password)
			VALUES('$firstName', '$lastName', '$username', '$enPW')";
			$result = $conn->query($sql);
		
			header("Location: ../index1.php");
		}
	}
?>