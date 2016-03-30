<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"> 
		<title>SocialMap</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<header>
			<center><img src="http://socialmap.netau.net/Socialmap.png" class='logo' height="150" width = "600"/></center>					
				<?php
					if(isset($_SESSION['id'])){	
						echo "<ul class='menu'>
							  <li><a href='map.php'>Home</a></li>
							  <li><a href='profile.php'>Profile</a></li>
							  <form action='includes/logout.inc.php' class='logoutForm'>
							  <button>Log Out</button></form></ul>";
					}
					else{
						$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
						if (strpos($url, 'error=empty') != false){
							echo "<center><h3>Fill out all fields!</center></h3>";
						}
						else if (strpos($url, 'error=username') != false){
							echo "<h3>Username already exists!</h3>";
						}
						echo "<form action='includes/login.inc.php' method='POST' class='loginForm'>
						<input type='text' name='username' placeholder='Username'>
						<input type='password' name='password' placeholder='Password'>
						<button type='submit'>Log In</button></form>";
						echo "<br><p class = 'headline'>Welcome to SocialMap! Please Login or create an account.</p></br>";
						
						echo "<br><form action='includes/signup.inc.php' method='POST' class='signupForm'>
								<input type='text' name='firstName' placeholder='First Name'><br>
								<input type='text' name='lastName' placeholder='Last Name'><br>
								<input type='text' name='username' placeholder='Username'><br>
								<input type='text' name='password' placeholder='Password'><br>
								<button type='submit'>SIGN UP</button></form></br>";
							
						
					}
				?>
		</header>
	</body>
		
</html>