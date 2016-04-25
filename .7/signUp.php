<?php
	
?>	
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="script.js"></script>
	<?php 
		if(isset($_SESSION['id'])){
			header("Location: map.php");
		}
	?>
	<body>
<br><form action='includes/signup.inc.php' method='POST' class='signupForm'>
                       
        		<input type='text' name='firstName' onfocus='signup(this)' placeholder='First Name'><div id=‘signupdiv’>Testing</div><br>
								<input type='text' name='lastName' placeholder='LastName' onblur='this.value = this.value.substr(0, 1).toUpperCase() + this.value.substr(1);'><br>
								<input type='text' name='username' placeholder='Username'><br>
								<input type='text' name='password' placeholder='Password'><br>
								<button type='submit' onclick='alert('Submitted');'>SIGN UP</button></form></br>
	</body>
</html>