<?php
session_start();
if(!isset($_SESSION['userdata']['oauth_uid'])):header("Location:index.php");endif;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login with Facebook</title>
<style type="text/css">
	h1
	{
	font-family:Arial, Helvetica, sans-serif;
	color:#999999;
	}
	
</style>
</head>
<body>
<div>
<h1>Facebook Profile Details </h1>
<?php
echo '<h3>Welcome '.$_SESSION['userdata']['fname'].'</h3>';
echo 'Facebook ID : ' . $_SESSION['userdata']['oauth_uid'];
echo '<br/>Name : ' . $_SESSION['userdata']['fname'].' '.$_SESSION['userdata']['lname'];
echo '<br/>Email : ' . $_SESSION['userdata']['email'];
echo '<br/>Gender : ' . $_SESSION['userdata']['gender'];
echo '<br/>Locale : ' . $_SESSION['userdata']['locale'];
echo '<br/>You are login with : Facebook';
echo '<br/>Logout from <a href="logout.php?logout">Facebook</a>'; 
?>
</div>

</body>
</html>