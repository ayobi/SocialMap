<?php
	session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" /> 
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<title>SocialMap</title>
	<link rel="stylesheet" type="text/css" href="style1.css" />
 <script type="text/javascript" src="script.js"></script> 

</head>
<body>
	<div class="UCS_PS"></div>
	<div class="APP_PS">
           <a href='index1.php' class="APP_STR_ApplicationName">Welcome
                <?php
			$username = $_SESSION['username'];
			echo " $username ";
		?>to SocialMap
            </a>
        </div>

	<div class="jqueryslidemenu">
		<?php
			if(isset($_SESSION['id'])){	
				echo "<ul>
						<li><a href='map1.php'>Home</a></li>
						<li><a href='includes/logout.inc.php'>Log Out</a></li>
					</ul>";
			}
			else{
				echo "<ul>
						<li><a href='index1.php'>Home</a></li>
					</ul>";
			}
		?>				
		<br style="clear: left" />
    </div>
		
