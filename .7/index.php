<?php
	include 'header.php';
	include 'facebook.php';
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
		<a class="link" onclick="logOauth(0)" href="https://api.instagram.com/oauth/authorize/?client_id=	34bfaa366dde4b559db81f4a06f3a3af&redirect_uri=http://socialmap.club/map.php/&response_type=token">
			<img src="/igbutton.png" border="0">
		</a>
	    </div>
		<script class='facebook'>
		  window.fbAsyncInit = function() {
			FB.init({
			  appId      : '1006593146053954',
			  xfbml      : true,
			  version    : 'v2.5'
			});
		  };

		  (function(d, s, id){
			 var js, fjs = d.getElementsByTagName(s)[0];
			 if (d.getElementById(id)) {return;}
			 js = d.createElement(s); js.id = id;
			 js.src = "//connect.facebook.net/en_US/sdk.js";
			 fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>
	</body>
</html>
