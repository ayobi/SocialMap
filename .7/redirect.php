<?php

/* By Qassim Hassan, wp-time.com */
include 'header.php';
include 'Qassim_HTTP.php';

if( isset($_GET['code']) ){

	$data = http_build_query(
				array(
					"client_id" => "34bfaa366dde4b559db81f4a06f3a3af",
   					"client_secret" =>"edf7e6bfe342408c891b80fb7eb0fb63",
    				"grant_type" => "authorization_code", // do not change it!.
    				"redirect_uri" => "http://socialmap.club/redirect.php",
    				"code" => $_GET['code']
				)
			);

	$url = "https://api.instagram.com/oauth/access_token"; 

	$result = Qassim_HTTP(1, $url, 0, $data);

	//echo 'This is your access token, save it: '.$result['access_token'];
echo $result['access_token'];
	$_SESSION["access_token"] = $result['access_token'];
$access_token = $_SESSION["access_token"]; // enter your access token.
//$access_token = "1725870120.34bfaa3.01a1bb8e2bda4969b765e619d8debe17";
$count = 5; // enter count of recent images.

$url = "https://api.instagram.com/v1/users/self/media/recent/?access_token=$access_token&count=$count"; 

$result = Qassim_HTTP(0, $url, 0, 0);

foreach ( $result['data'] as $image ) {
	echo '<p><img src="'.$image['images']['standard_resolution']['url'].'"></p>'; // display recent images.
	echo 'This is your latitude: '.$image['location']['latitude'];
	echo ' and this is your longitude: '.$image['location']['longitude'];
}

}

/* Now open this link in browser to get access token:
	https://www.instagram.com/oauth/authorize/?client_id=enter_your_client_id&redirect_uri=enter_your_redirect_uri&response_type=code
*/

?>