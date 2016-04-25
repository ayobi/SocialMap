<?php
	include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title>Social Map</title>

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
	 </style>
<center>
<?php


include 'Qassim_HTTP.php';

if( isset($_GET['code']) ){

	$data = http_build_query(
				array(
					"client_id" => "34bfaa366dde4b559db81f4a06f3a3af",
   					"client_secret" =>"edf7e6bfe342408c891b80fb7eb0fb63",
    				"grant_type" => "authorization_code", // do not change it!.
    				"redirect_uri" => "http://socialmap.club/success.php",
    				"code" => $_GET['code']
				)
			);

	$url = "https://api.instagram.com/oauth/access_token"; 

	$result = Qassim_HTTP(1, $url, 0, $data);

	//echo 'This is your access token, save it: '.$result['access_token'];
	//$_SESSION["access_token"] = $result;
	//$aToken = $_SESSION["access_token"];
	//echo "Here is the access token: $aToken";
$access_token = $_SESSION["access_token"]; // enter your access token.

$count = 5; // enter count of recent images.

$url = "https://api.instagram.com/v1/users/self/media/recent/?access_token=$access_token&count=$count"; 

$result = Qassim_HTTP(0, $url, 0, 0);

foreach ( $result['data'] as $image ) {
	echo '<p><img src="'.$image['images']['standard_resolution']['url'].'"height=200 width=200></p>'; // display recent images.
	echo 'This is your latitude: '.$image['location']['latitude'];
	echo ' and this is your longitude: '.$image['location']['longitude'];
}

}

?></center>
	  


	<div style="clear:both"></div>
	</div>
		<link rel="stylesheet" type="text/css" href="style.css">		
		<body>
			<form method="post" class="picForm" enctype="multipart/form-data">
			<br/>
				<input type="file" name="image" />
				<br/><br/>
				<input type="submit" name="submit" value="Upload" />
			</form> 
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
<br><center>
<form action='#' method='POST' class='upload_image'>
	<input type='text' name='URL' id='userInput' placeholder='URL'>
	<a href="" id=lnk></a> 
	<input type='text' name='Latitude' id='latitude' placeholder='Latitude'>
	<a href="" id=lnk2></a>
	<input type='text' name='Longitude' id='longitude' placeholder='Longitude'>
	<a href="" id=lnk3></a>
	<button type='button' onclick='javascript:loadMapMarkers ()'>Insert Image</button>
	*Right click on map to insert Latitude and Longitude values*</form></br></center>



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
		document.getElementById('longitude').value = lng;
		document.getElementById('latitude').value = lat;
	});	
}

//Function that loads the map markers.
function loadMapMarkers (){
	var latValue = document.getElementById('latitude').value;
	var lnk2 = document.getElementById('lnk2');
	lnk2.href = "" + latValue;
	var lonValue = document.getElementById('longitude').value;
	var lnk3 = document.getElementById('lnk3');
	lnk3.href = "" + lonValue;
	
	//Setting the position of the Picture map marker.
	var markerPositionSM1 = new google.maps.LatLng(latValue, lonValue);
	//Setting the icon to be used with the Picture map marker.
	var userInput = document.getElementById('userInput').value;
	var lnk = document.getElementById('lnk');
	lnk.href = "" + userInput;
	//lnk.innerHTML = lnk.href;
	var imageStore = 'http://i.imgur.com/MmAHgRa.jpg';
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

</head>

<body> 

     <!--Create the div to hold the map.-->
    <div id="social-Map"></div>

<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
</body>
	<center><p class="forum"> For more info, please visit our forum: <a href ="http://socialmapforum.proboards.com/"> 
	SocialMap Forums </a></p></center>
</html>