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



<!--Connect to the google maps api-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyqLywtRdPq21DKjVtkGWXcvaN-Q8kKaU&sensor=true"></script>

<!--Main chunk of javascript that creates and controls the map.-->
<script type="text/javascript">

//Create the variables that will be used within the map configuration options.
//The latitude and longitude of the center of the map.
var socialMapCenter = new google.maps.LatLng(28.031788, -81.946012);

//The degree to which the map is zoomed in. This can range from 0 (least zoomed) to 21 and above (most zoomed).
var socialMapZoom = 6;

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

//Picture -----------------

//Setting the position of the Picture map marker.
var markerPositionSM1 = new google.maps.LatLng(27.997473, -81.865270);

//Setting the icon to be used with the Picture map marker.
var markerIconSM1 = {
  url: 'http://i.imgur.com/3AlH5zV.png',
  //The size image file.
  size: new google.maps.Size(150, 150),
 
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
      title: 'circle b',
	  //assigns the icon image set above to the marker.
	  icon: markerIconSM1,
	 
});
//Setting the position of the Picture map marker.
var markerPositionSM2 = new google.maps.LatLng(25.801157, -80.196215);

//Setting the icon to be used with the Picture map marker.
var markerIconSM2 = {
  url: 'http://i.imgur.com/ksKi7rz.png',
  //The size image file.
  size: new google.maps.Size(150, 150),
  
};

//Setting the shape to be used with the Picture map marker.
var markerShapeSM2 = {
      
};

//Creating the Picture map marker.
markerPicture = new google.maps.Marker({
      //uses the position set above.
	  position: markerPositionSM2,
	  //adds the marker to the map.
      map: socialMap,
      title: 'wynwood',
	  //assigns the icon image set above to the marker.
	  icon: markerIconSM2,
	 
});

//Setting the position of the Picture map marker.
var markerPositionSM3 = new google.maps.LatLng(27.931235, -81.964757);

//Setting the icon to be used with the Picture map marker.
var markerIconSM3 = {
  url: 'http://i.imgur.com/XZlTTVV.png',
  //The size image file.
  size: new google.maps.Size(150, 150),
  
};

//Setting the shape to be used with the Picture map marker.
var markerShapeSM3 = {
      
};

//Creating the Picture map marker.
markerPicture = new google.maps.Marker({
      //uses the position set above.
	  position: markerPositionSM3,
	  //adds the marker to the map.
      map: socialMap,
      title: 'carter road',
	  //assigns the icon image set above to the marker.
	  icon: markerIconSM3,
	  
});

}


</script>

</head>
<body>  
     <!--Create the div to hold the map.-->
    <div id="social-Map"></div>   
</body>
</html>

 <!--Connect to the google maps api-->

<a href ="http://socialmapforum.proboards.com/" class='link'> SocialMapForums </a>