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
<br><br>
<input type='text' id='userInput' value='Enter URL Here' /><br>
<a href="" id=lnk></a> <br>

<input type='text' id='userInput2' value='Enter Longitude Here' /><br>
<a href="" id=lnk2></a> <br>

<input type='text' id='userInput3' value='Enter Latitude Here' /><br>
<a href="" id=lnk3></a> <br>

<input type='button' onclick='javascript:loadMapMarkers ()' value='Insert Image'/><br>


<script>

</script>

<!--Connect to the google maps api-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyqLywtRdPq21DKjVtkGWXcvaN-Q8kKaU&sensor=true"></script>

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
loadMapMarkers();

}


//Function that loads the map markers.
function loadMapMarkers (){

var userInput2 = document.getElementById('userInput2').value;
var lnk2 = document.getElementById('lnk2');
lnk2.href = "" + userInput2;

var userInput3 = document.getElementById('userInput3').value;
var lnk3 = document.getElementById('lnk3');
lnk3.href = "" + userInput3;


//Setting the position of the Picture map marker.
var locationLong = 28.031883;
var locationLat = -81.946817;
var markerPositionSM1 = new google.maps.LatLng(userInput2, userInput3);

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
</body>
</html>