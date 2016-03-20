

<?php
/*Redirection page after login authentication success instagram API will send the user details object in a array data format.*/

require 'db.php';
require 'instagram.class.php';
require 'instagram.config.php';

// Receive OAuth code parameter
$code = $_GET['code'];

// Check whether the user has granted access
if (true === isset($code)) 
{

// Receive OAuth token object
$data = $instagram->getOAuthToken($code);

if(empty($data->user->username))
{
header('Location: index.php');
}
else
{
session_start();
// Storing instagram user data into session
$_SESSION['userdetails']=$data;
$user=$data->user->username;
$fullname=$data->user->full_name;
$bio=$data->user->bio;
$website=$data->user->website;
$id=$data->user->id;
$token=$data->access_token;
// Verify user details in USERS table
$id=mysqli_query("select instagram_id from instagram_users where instagram_id='$id'");
if(mysqli_num_rows($id) == 0)
{ 
// Inserting values into USERS table
mysqli_query("insert into instagram_users(username,Name,Bio,Website,instagram_id,instagram_access_token) values('$user','$fullname','$bio','$website','$id','$token')");
}
// Redirecting you home.php 
header('Location: home.php');
}
} 
else 
{
// Check whether an error occurred
if (true === isset($_GET['error'])) 
{
echo 'An error occurred: '.$_GET['error_description'];
}
}
?>