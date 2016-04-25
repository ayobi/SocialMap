<?php
	include 'header1.php';
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />


<!--Set up the CSS styles-->
<style type="text/css">
      html { 
	      height: 100%;
	  }
      
	  body {
		  height: 100%; 
		  margin: 0; 
		  padding: 0;
		  background-color: #eeedef;
	  }
      
	  /*Adapt the following styling depending on where you want to put your map. If you want a 'full screen' map, then set the width and height to 100 percent and remove the margins.*/
	  #social-Map { 
	  	  height: 75%;
		  width: 75%; 
		  margin-left: auto;
          margin-right: auto;
	  }
	  
	  .pop_up_box_text {
	 	  font-family: Georgia, 'Times New Roman', Times, serif; 
		  font-size: 16px; 
		  line-height: 22px; 
		  color: #ffffff; 
		  display: inline; 
	  }
	  
	  .picForm {
		  float: left;
		  padding-left: 30px;
	  }
	 </style>
</head>
<body>
<center>




<?php
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$username = $_SESSION['username'];

?></center>


	<div class="clearfix CONT_PS_StaticContent CONT_STANDARD">
			<h1 class='H_Title'>For more info, please visit our forum: 
				<a href ="http://socialmapforum.proboards.com/">SocialMap Forums </a>
			</h1>



<?php
$username = $_SESSION['username'];
$access_token = $_SESSION['access_token'];
//echo "ACCESS TOKEN $access_token";
displayimage();
	if(isset($_POST['submit']))
	{
		if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
		{
			echo "<div class='CONT_MsgBox_Error'>
					<div class='H_MsgBox'>Error Message</div>
					<ul class='feedbackPanel'>
						<li>
							<span>Please select an image.</span>
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
			saveimage($username, $name, $image);//, $Latitude, $Longitude);

		}
	}
	else if(isset($_POST['delete']))
	{
		
		$con=mysql_connect("socialmapclub.ipagemysql.com", "socialmapclub", "Socialmap2016!");
		mysql_select_db("smdb",$con);
		$qry="DELETE * FROM images";
		$result=mysql_query($qry,$con);
		if($result)
		{
			echo "<div class='CONT_MsgBox_Complete'>
					<div class='H_MsgBox'>Success</div>
					<ul class='feedbackPanel'>
						<li>
							<span>Image deleted.</span>
						</li>
					</ul>
				</div>";
		}
	}

	function saveimage($username, $name, $image)//, $Latitude, $Longitude)
	{
		$con=mysql_connect("socialmapclub.ipagemysql.com", "socialmapclub", "Socialmap2016!");
		mysql_select_db("smdb",$con);
		$qry="insert into images (user, name, image) values ('$username', '$name', '$image')";
		//$qry="insert into images (user, name, image, Latitude, Longitude) values ('$username', '$name', '$image', '$Latitude', '$Longitude')";
		$result=mysql_query($qry,$con);
		if($result)
		{
			echo "<div class='CONT_MsgBox_Complete'>
					<div class='H_MsgBox'>Success</div>
					<ul class='feedbackPanel'>
						<li>
							<span>Image uploaded.</span>
						</li>
					</ul>
				</div>";
			//displayimage();
		}
		else
		{
			echo "<div class='CONT_MsgBox_Error'>
					<div class='H_MsgBox'>Error Message</div>
					<ul class='feedbackPanel'>
						<li>
							<span>Image not uploaded.</span>
						</li>
					</ul>
				</div>";
			//displayimage();
		}
		echo $username;
		displayimage();
	}
	function displayimage()
	{
		//echo $username;
		$con=mysql_connect("socialmapclub.ipagemysql.com", "socialmapclub", "Socialmap2016!");
		mysql_select_db("smdb",$con);
		$qry="SELECT name, image FROM images WHERE user=$username";
		$result=mysql_query($qry,$con);
		while($row = mysql_fetch_array($result))
		{
			echo '<img height="225" width="225" src="data:image;base64,'.$row[4].' "> ';
		}
		mysql_close($con); 
	}
?>




		<form method="post" enctype="multipart/form-data">
			<div class='CONT_Default'>
				<h2 class='H_Partial'>File Upload</h2>
				<div class='CONT_Row CONT_Cell W33'>
					<div class='PAD_Bottom'>
						<input type="file" name="image" />
					</div>
				</div>
				
				<div class='CONT_Row'>
					<div class='CONT_Cell'>
						<div class='BTN_Layout_Center'>
							<input type="submit" name="submit" value="Upload"  class="BTN_Green" />
							<input type="submit" name="delete" value="Delete"  class="BTN_Green" />
						</div> 
					</div>
				</div>
			</div>
		</form>
		<form action='#' method='POST'>
			<div class='CONT_Default'>
				<h2 class='H_Partial'>Right click on map to insert Latitude and Longitude values</h2>
				<div class='CONT_Row CONT_Cell W33'>
					<div class='PAD_Bottom'>
						<input type='text' name='URL' id='userInput' placeholder='URL' class='W26'>
						<a href="" id=lnk></a> 
					</div>
					<div class='PAD_Top'>
						<input type='text' name='Latitude' id='Latitude' placeholder='Latitude' class='W26'>
						<a href="" id=lnk2></a>
					</div>
					<div class='PAD_Top'>
						<input type='text' name='Longitude' id='Longitude' placeholder='Longitude' class='W26'>
						<a href="" id=lnk3></a>
					</div>
				</div>
				
				<div class='CONT_Row'>
					<div class='CONT_Cell'>
						<div class='BTN_Layout_Center'>
							<button type='button' class='BTN_Green' onclick='javascript:loadMapMarkers()'>Insert Image</button>
						</div> 
					</div>
				</div>
			</div>
		</form>
</div>



<!--Create the div to hold the map.-->
<div id="social-Map"></div>
<!--Connect to the google maps api-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0ftkFxnjdqxD0XZgjOXYr6IXFr1bfcDQ"></script>

<!--Main chunk of javascript that creates and controls the map.-->
<script type="text/javascript">
//Create the variables that will be used within the map configuration options.
//The latitude and longitude of the center of the map.
var socialMapCenter = new google.maps.LatLng(38.647707, -98.165434);
//The degree to which the map is zoomed in. This can range from 0 (least zoomed) to 21 and above (most zoomed).
var socialMapZoom =4;
//The max and min zoom levels that are allowed.
var socialMapZoomMax = 18;
var socialMapZoomMin = 3;
//These options configure the setup of the map. 
var socialMapOptions = { 
		  center: socialMapCenter, 
          zoom: socialMapZoom,
		  //The type of map. In addition to ROADMAP, the other 'premade' map styles are SATELLITE, TERRAIN and HYBRID. 
          mapTypeId: google.maps.MapTypeId.ROADMAP,
		  maxZoom:socialMapZoomMax,
		  minZoom:socialMapZoomMin,
		  //Turn off the map controls as we will be adding our own later.
		  panControl: false,
		  mapTypeControl: false,
};
//Create the variable for the main map itself.
var socialMap;
//When the page loads, the line below calls the function below called 'loadsocialMap' to load up the map.
google.maps.event.addDomListener(window, 'load', loadsocialMap);
//THE MAIN FUNCTION THAT IS CALLED WHEN THE WEB PAGE LOADS--------------------------------------------------------------------------------
function loadsocialMap() {

//The empty map variable ('socialMap') was created above. The line below creates the map, assigning it to this variable. The line below also loads the map into the div with the id 'social-Map' (see code within the 'body' tags below), and applies the 'socialMapOptions' (above) to configure this map. 
socialMap = new google.maps.Map(document.getElementById("social-Map"), socialMapOptions);

//Calls the function below to load up all the map markers.
clickLocation();
}

function clickLocation(){
	google.maps.event.addListener(socialMap, "rightclick", function(event) {
		var lng = event.latLng.lng();
		var lat = event.latLng.lat();
		document.getElementById('Longitude').value = lng;
		document.getElementById('Latitude').value = lat;
	});	
}

//Function that loads the map markers.
function loadMapMarkers (){
	var latValue = document.getElementById('Latitude').value;
	var lnk2 = document.getElementById('lnk2');
	lnk2.href = "" + latValue;
	var lonValue = document.getElementById('Longitude').value;
	var lnk3 = document.getElementById('lnk3');
	lnk3.href = "" + lonValue;
	
	//Setting the position of the Picture map marker.
	var markerPositionSM1 = new google.maps.LatLng(latValue, lonValue);
	//Setting the icon to be used with the Picture map marker.
	var userInput = document.getElementById('userInput').value;
	var lnk = document.getElementById('lnk');
	lnk.href = "" + userInput;
	var markerIconSM1 = {
	  
	  url: userInput,
	  scaledSize: new google.maps.Size(100, 100),
 
};

//Setting the shape to be used with the Picture map marker.
var markerShapeSM1 = {
      
};
//Creating the Picture map marker.
markerPicture = new google.maps.Marker({
      //uses the position set above.
	  position: markerPositionSM1,
	  //adds the marker to the map.
      map: socialMap,
      title: '',
	  //assigns the icon image set above to the marker.
	  icon: markerIconSM1,
	 
});
}
</script>



</body>
</html>