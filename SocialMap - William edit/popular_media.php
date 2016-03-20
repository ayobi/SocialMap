<?php
/*Get Instagram popular media.*/
require 'instagram.class.php';

// Initialize class for public requests
$instagram = new Instagram('34bfaa366dde4b559db81f4a06f3a3af');

// Get popular instagram media
$popular = $instagram->getPopularMedia();

// Display results
foreach ($popular->data as $data) 
{
echo "<img src="\"{$data->images->thumbnail->url}\">";
}
?>