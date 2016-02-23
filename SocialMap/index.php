<?php
	include 'header.php';
?>	
<?php 
		if(isset($_SESSION['id'])){
			header("Location: map.php");
		}
		else{
			echo "Welcome to SocialMap! Please Login or create an account.";
			//echo "You are not logged in!";
		}
	?>
