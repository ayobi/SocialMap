<?php
	include 'header.php';
	include 'dbh.php';
	ini_set('mysql.connect_timeout',300);
    ini_set('default_socket_timeout',300);
?>
<html>

		<!-- Needed because other elements inside ProfilePage have floats -->
		<div style="clear:both"></div>
	</div>
		<link rel="stylesheet" type="text/css" href="style.css">		
		<body>
			<center><form method="post" class="profilePicForm" enctype="multipart/form-data">
			<br/>
				<input type="file" name="image" />
				<br/><br/>
				<input type="submit" name="submit" value="Upload" />
				<input type="submit" name="delete" value="Delete" />
			</form></center>
					
			<?php
			
			echo $result;
				
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
					
					$con=mysql_connect("socialmapclub.ipagemysql.com", "socialmapclub", "Socialmap2016!");
					mysql_select_db("smdb",$con);
					$qry="DELETE FROM images";
					$result=mysql_query($qry,$con);
					if($result)
					{
						echo "<br /><h3>Image deleted.</h3>";
					}
				}
				//displayimage();
				function saveimage($name,$image)
				{
					$con=mysql_connect("socialmapclub.ipagemysql.com", "socialmapclub", "Socialmap2016!");
					mysql_select_db("smdb",$con);
					$qry="insert into images (name,image) values ('$name','$image')";
					$result=mysql_query($qry,$con);
					if($result)
					{
						echo "<br/><h3>Image uploaded.</h3>";
						displayimage();
					}
					else
					{
						echo "<br/>Image not uploaded.";
						displayimage();
					}
				}
				function displayimage()
				{
					$con=mysql_connect("socialmapclub.ipagemysql.com", "socialmapclub", "Socialmap2016!");
					mysql_select_db("smdb",$con);
					$qry="select * from images";
					$result=mysql_query($qry,$con);
					while($row = mysql_fetch_array($result))
					{
						echo '<img height="225" width="225" src="data:image;base64,'.$row[2].' "> ';
					}
					mysql_close($con); 
				}
			?>
		</body>
</html>