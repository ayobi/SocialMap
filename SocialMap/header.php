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
			<h1>
				<img src="SM.png" height="100" width = "100"/>
				<h2>SocialMap</h2>
			</h1>
			<nav>
				<ul>
					<li><a href="index.php">HOME</a></li>
					<?php
						if(isset($_SESSION['id'])){		
							echo "<form action='includes/logout.inc.php'>
								<button>LOG OUT</button>
							</form>";
							echo "<li><a href='profile.php'>PROFILE<a></li>";
						}
						else{
							echo "<form action='includes/login.inc.php' method='POST'>
							<input type='text' name='username' placeholder='Username'>
							<input type='text' name='password' placeholder='Password'>
						<button type='submit'>LOGIN</button>
						</form>";
							echo "<li><a href='signup.php'>SIGNUP<a></li>";
						}
					?>
					
				</ul>
			</nav>
		</header>
	</body>
		
</html>