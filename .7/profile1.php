<?php
session_start();
?>
<?php
	include 'header1.php';
	include 'dbh.php';
	ini_set('mysql.connect_timeout',300);
    ini_set('default_socket_timeout',300);
?>
<html>
<body>
	<!-- Main Content -->
	<div class="clearfix CONT_PS_StaticContent CONT_STANDARD">

		<h1 class='H_Title'>Profile</h1>
	
		<?php
			
			echo $result;
				
				if(isset($_POST['submit']))
				{
					if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
					{
						echo "<div class='CONT_MsgBox_Error'>
								<div class='H_MsgBox'>Error Message</div>
								<ul class='feedbackPanel'>
									<li>
										<span>Please select an image</span>
									</li>
								</ul>
							</div>";
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
						echo "<div class='CONT_MsgBox_Complete'>
								<div class='H_MsgBox'>Image deleted</div>
                                                           </div>";
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
						echo "<div class='CONT_MsgBox_Complete'>
								<div class='H_MsgBox'>Image uploaded</div>
							</div>";
						displayimage();
					}
					else
					{
						echo "<div class='CONT_MsgBox_Error'>
								<div class='H_MsgBox'>Error Message</div>
								<ul class='feedbackPanel'>
									<li>
										<span>Image not uploaded</span>
									</li>
								</ul>
							</div>";
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

	<div class='CONT_Default'>
			<form method="post" class="profilePicForm" enctype="multipart/form-data">
				<h2 class='H_Partial'>File Upload or Delete</h2>
				<div class='CONT_Row CONT_Cell W33'>
					<div class='PAD_Bottom'>
						<input type="file" name="image" />
					</div>
				</div>
				
				<div class='CONT_Row'>
					<div class='CONT_Cell'>
						<div class='BTN_Layout_Center' class='W26'>
							<input type='submit' name="submit" value="Upload"  class="BTN_Green" />
							<input type="submit" name="delete" value="Delete"  class="BTN_Green" />
						</div> 
					</div>
				</div>
			</form>
		</div>
		</div>			
</body>
</html>