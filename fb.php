<?php
require_once('Facebook/Facebook.php');
$config=array(
'appid'=>'803950939721783',
'secret'=>'dd5df881999156a170560fc1a6110663',
'fileUpload'=>false,
);
$facebook=new Facebook/Facebook($config);
$user_id=$facebook->getUser();
if($user_id)
{
	try{
		
	$user_profile=$facebook->api('/me','GET');
	echo '<pre>';
	
	print_r($user_profile);
	echo '</pre>';
	}catch(FacebookApiException $e)
	{
		$login_url=$facebook->getLoginUrl();
		echo'Please <a href="'.$login_url.'">login.</a>';
	}
}
else
{
	$login_url=$facebook->getLoginUrl();
	echo'No log. Please <a href="'.$login_url.'">login.</a>';
	
}


?>