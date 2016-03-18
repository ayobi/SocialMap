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
		<script>
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