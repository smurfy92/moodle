<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once($CFG->libdir.'/adminlib.php');
include_once($CFG->dirroot.'/mnet/lib.php');

global $USER;

$name=$USER->username;

require_once ('facepp_sdk.php');
error_reporting(E_ALL ^ E_DEPRECATED);

$im = imagecreatefrompng($_POST['image']);

if(!empty($name)){
    $current= "images/".$name.".jpg";
    imagejpeg($im, "images/".$name.".jpg");
}else{
    $current = "images/anonymous.jpg";
    imagejpeg($im, "images/anonymous.jpg");
}



$apikey = "622fe219600c16304847c1c76eeca5bd";
$apisecret = "-BXv1Wb2oEPglz0-J5ZIL7nOvBxJoRff";


########################
###     example      ###
########################

$faceapp = new Facepp();
$faceapp->api_key       = "622fe219600c16304847c1c76eeca5bd";
$faceapp->api_secret    = "4K1Nbh-ioBJCtmnkddjoPfse191eJ64n";
#detect local image 
$params['img']          = $current;
$response               = $faceapp->execute('/detection/detect',$params);
$response=$response["body"];
$response=json_decode($response);
$face=$response->face;

if($face){
    echo "ok";
}else{
    echo "no";
}



?>