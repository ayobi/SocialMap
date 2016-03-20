<?php
	include 'header.php';
	ini_set('mysql.connect_timeout',300);
    ini_set('default_socket_timeout',300);
?>
<html>
	<style type="text/css">
	#ProfilePage
	{
		/* Move it off the top of the page, then centre it horizontally */
		margin: 50px auto;
		width: 635px;

	/* For visibility. Delete me */
	border: 1px solid red;
	}

	#LeftCol
	{
		/* Move it to the left */
		float: left;

		width: 200px;
		text-align: center;

		/* Move it away from the content */
		margin-right: 20px;

	/* For visibility. Delete me */
	border: 1px solid brown;
	}

	#Photo
	{
		/* Width and height of photo container */
		width: 200px;
		height: 200px;

	/* For visibility. Delete me */
	border: 1px solid green;
	}

	#PhotoOptions
	{
		text-align: center;
		width: 200px;

	/* For visibility. Delete me */
	border: 1px solid brown;
	}

	#Info
	{
		width: 400px;
		text-align: center;

		/* Move it to the right */
		float: right;

	/* For visibility. Delete me */
	border: 1px solid blue;
	}

	#Info strong
	{
		/* Give it a width */
		display: inline-block;
		width: 100px;

	/* For visibility. Delete me */
	border: 1px solid orange;
	}

	#Info span
	{
		/* Give it a width */
		display: inline-block;
		width: 250px;

	/* For visibility. Delete me */
	border: 1px solid purple;
	}
	</style>

	<div id="ProfilePage">
		<div id="LeftCol">
			<div id="Photo">
			<img src="http://cdn87.psbin.com/img/mw=160/mh=210/cr=n/d=g6p4a/p8nrrquhs51v015z.jpg" alt="Diego" style="max-width:100%;max-height:100%;">
			</div>
			<div id="ProfileOptions">
			</div>
		</div>

		<div id="Info">
			<p>
				<strong>Name:</strong>
				<span>Diego</span>
			</p>
			<p>
				<strong>Last Name:</strong>
				<span>Gimenez</span>
			</p>
			<p>
				<strong>Username:</strong>
				<span>tjack</span>
			</p>
			<p>
				<strong>Number Pictures:</strong>
				<span>3</span>
			</p>
			<p>
				<strong>Number Albums:</strong>
				<span>1</span>
			</p>
		</div>

		<!-- Needed because other elements inside ProfilePage have floats -->
		<div style="clear:both"></div>
	</div>
		<link rel="stylesheet" type="text/css" href="style.css">		
		<body>
			<form method="post" id="picForm" enctype="multipart/form-data">
			<br/>
				<input type="file" name="image" />
				<br/><br/>
				<input type="submit" name="submit" value="Upload" />
				<input type="submit" name="delete" value="Delete" />
			</form>
			<?php
				if(isset($_POST['submit']))
				{
					if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
					{
						echo "Please select an image.";
					}
					else
					{
						$image= addslashes($_FILES['image']['tmp_name']);
						$name= addslashes($_FILES['image']['name']);
						$image= file_get_contents($image);
						$image= base64_encode($image);
						saveimage($name,$image);
					}
				}
				else if(isset($_POST['delete']))
				{
					
					$con=mysql_connect("localhost","root","");
					mysql_select_db("socialmap",$con);
					$qry="DELETE FROM images";
					$result=mysql_query($qry,$con);
					if($result)
					{
						echo "<br /><h3>Image deleted.</h3>";
					}
				}
				displayimage();
				function saveimage($name,$image)
				{
					$con=mysql_connect("localhost","root","");
					mysql_select_db("socialmap",$con);
					$qry="insert into images (name,image) values ('$name','$image')";
					$result=mysql_query($qry,$con);
					if($result)
					{
						echo "<br/><h3>Image uploaded.</h3>";
					}
					else
					{
						echo "<br/>Image not uploaded.";
					}
				}
				function displayimage()
				{
					$con=mysql_connect("localhost","root","");
					mysql_select_db("socialmap",$con);
					$qry="select * from images";
					$result=mysql_query($qry,$con);
					while($row = mysql_fetch_array($result))
					{
						echo '<img height="300" width="300" src="data:image;base64,'.$row[2].' "> ';
					}
					mysql_close($con); 
				}
			?>
		</body>
</html>