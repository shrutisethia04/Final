<?php
include_once("/config.php");
include_once("/includes/functions.php");
//destroy facebook session if user clicks reset
if(!$fbuser){
	$fbuser = null;
	$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl,'scope'=>$fbPermissions));
	echo '<a href="'.$loginUrl.'"><img src="images/fb_login.png"></a>'; 	
}else{
	$user_profile = $facebook->api('/me');
	$user = new Users();
	$user_data = $user_profile;
	if(!empty($user_data)){
		//session_start();
		$_SESSION['userdata'] = $user_data;
		print_r($user_profile);
		//header("Location:account.php");
	}else{
		die('Some problem occurred, please try again.');
	}
}
?>