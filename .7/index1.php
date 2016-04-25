<?php
session_start();
?>
<?php
	include 'header1.php';
	if(isset($_SESSION['id'])){	
		header("Location: map1.php");
	}
?>	

	<!-- Main Content -->
	<div class='clearfix CONT_PS_StaticContent CONT_STANDARD'>
	<form action='includes/login.inc.php' method='POST'>
		<h1 class='H_Title'>Sign In or Create an Account</h1>

	<?php
		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if (strpos($url, 'error=empty') != false){
			echo "<div class='CONT_MsgBox_Error'>
					<div class='H_MsgBox'>Error Message</div>
					<ul class='feedbackPanel'>
						<li>
							<span>Fill out all fields for either Sign In or Create an Account!</span>
						</li>
					</ul>
				</div>";
		}
		else if (strpos($url, 'error=username') != false){
			echo "<div class='CONT_MsgBox_Error'>
					<div class='H_MsgBox'>Error Message</div>
					<ul class='feedbackPanel'>
						<li>
							<span>Username already exists!</span>
						</li>
					</ul>
				</div>";
		}
	?>
	
		<div class='CONT_Default'>
			<h2 class='H_Partial'>Sign In</h2>
			<div class='CONT_Row CONT_Cell W33'>
				<div class='PAD_Bottom'>
					<input type='text' name='username' placeholder='Username' class='W26'>
				</div>
				<div class='PAD_Top'>
					<input type='password' name='password' placeholder='Password' class='W26'>
				</div>
			</div>
			<div class='CONT_Row'>
				<div class='CONT_Cell'>
					<div class='BTN_Layout_Center'>
						<input type='submit' value='Login' class='BTN_Green' />
					</div> 
				</div>
			</div>

			<a onclick='logOauth(0)' href='https://api.instagram.com/oauth/authorize/?client_id=34bfaa366dde4b559db81f4a06f3a3af&redirect_uri=http://socialmap.club/redirect.php&response_type=code'>
				<img src='igbutton.png' border='0' />
			</a>
		</div>
	</form>
			
	<form action='includes/signup.inc.php' method='POST' onsubmit='return checkCreateForm(this);'>
		<div class='CONT_Default'>
			<h2 class='H_Partial'>Create an Account</h2>
			<div class='CONT_Row CONT_Cell W33'>
				<div class='PAD_Bottom'>
					<input title='Enter your first name' type='text' required pattern='\w+' name='firstName' placeholder='First Name' class='W26' onblur='this.value = this.value.substr(0, 1).toUpperCase() + this.value.substr(1);'>	
				</div>
				<div class='PAD_Top'>
					<input title='Enter your last name' type='text' required pattern='\w+' name='lastName' placeholder='Last Name' class='W26' onblur='this.value = this.value.substr(0, 1).toUpperCase() + this.value.substr(1);'>	
				</div>
				<div class='PAD_Top'>
					<input title='Enter your username' type='text' required pattern='\w+' name='username1' placeholder='Username' class='W26'>	
				</div>
				<div class='PAD_Top'>
					<input title='Password must contain at least 6 characters, including UPPER/lowercase and numbers' type='password' required pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' name='password1' placeholder='Password' class='W26' onchange='
					this.setCustomValidity(this.validity.patternMismatch ? this.title : "");
					if(this.checkValidity()) form.confirmpassword.pattern = this.value;'>	
				</div>
				<div class='PAD_Top'>
					<input title='Please enter the same Password as above' type='password' required pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' name='confirmpassword' placeholder='Confirm Password' class='W26' onchange='
					this.setCustomValidity(this.validity.patternMismatch ? this.title : "");'>	
				</div>
			</div>
			<div class='CONT_Row'>
				<div class='CONT_Cell'>
					<div class='BTN_Layout_Center'>
						<input type='submit' value='Sign Up' class='BTN_Green' />
					</div> 
				</div>
			</div>
		</div>
	</form>
</div>	
</body>
</html>