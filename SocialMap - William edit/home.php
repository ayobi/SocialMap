<?php
/*Welcome page here you can display user data accessing session userdetails value. */

session_start();
if($_GET['id']=='logout')
{
unset($_SESSION['userdetails']);
session_destroy();
}

require 'instagram.class.php';
require 'instagram.config.php';
if (!empty($_SESSION['userdetails']))
{
$data=$_SESSION['userdetails'];

echo '<img src='.$data->user->profile_picture.' >'; 
echo 'Name:'.$data->user->full_name;
echo 'Username:'.$data->user->username;
echo 'User ID:'.$data->user->id;
echo 'Bio:'.$data->user->bio;
echo 'Website:'.$data->user->website;
echo 'Profile Pic:'.$data->user->profile_picture;
echo 'Access Token: '.$data->access_token;

// Store user access token
$instagram->setAccessToken($data);
// Your uploaded images
$popular = $instagram->getUserMedia($data->user->id);
foreach ($popular->data as $data) {
echo '<img src='.$data->images->thumbnail->url.'>';
}

// Instagram Data Array
print_r($data);
}
else
{ 
header('Location: index.php');
}
?>