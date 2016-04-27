<?php
	include 'header.php';
?>	
<html>
<link rel="stylesheet" type="text/css" href="style.css">
	<?php 
		if(isset($_SESSION['id'])){
			header("Location: map.php");
		}
	?>
	<body>
		<div class="text2">
		     <a class="link" href=
                            "https://api.instagram.com/oauth/authorize/?client_id=34bfaa366dde4b559db81f4a06f3a3af&redirect_uri=http://socialmap.club/redirect.php&response_type=code">
			<img src="/igbutton.png" border="0">
		</a>
	    </div>
	</body>
</html>