<?php
	include 'header.php';
?>
	
	<?php 
		
		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if (strpos($url, 'error=empty') !== false){
			echo "Fill out all fields!";
		}
		else if (strpos($url, 'error=username') !== false){
			echo "Username already exists!";
		}
		if(isset($_SESSION['id'])){
			echo "<p class='pCenter'>Hi there user!</p>";
		}
		else{
			echo "<p class='pCenter'>You are not logged in!</p>";
		}
		
		if(isset($_SESSION['id'])){
			echo "You are already logged in!";
		}
		else{
			echo "<form action='includes/signup.inc.php' method='POST'>
				<input type='text' name='firstName' placeholder='First Name'><br>
				<input type='text' name='lastName' placeholder='Last Name'><br>
				<input type='text' name='username' placeholder='Username'><br>
				<input type='text' name='password' placeholder='Password'><br>
			<button type='submit'>SIGN UP</button>
			</form>";
		}
	?>
</html>