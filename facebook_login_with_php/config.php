<?php
include_once("/inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '1520641384863128'; //Facebook App ID
$appSecret = 'a7c4f6e90ef74d4bc80b9561d71b332f'; // Facebook App Secret
$return_url = 'http://localhost/Final/facebook_login_with_php/';  //return url (url to script)
$homeurl = 'http://localhost/Final/facebook_login_with_php/';  //return to home
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret

));
$fbuser = $facebook->getUser();
?>