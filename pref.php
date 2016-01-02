<?php
include 'c.php';
$lis = $_GET['items'];
//$field=$_GET['field'];
session_start();
$f=$_SESSION['field'];
$l = explode(",", $lis);
foreach($l as $var)
{
	$app.=$var.",";
}
$app=rtrim($app,",");
$role=$_SESSION['role'];
$id=$_SESSION['uname'];
$qq="Select * from pref where id='$id'";
$qq1=mysqli_query($conn,$qq);
if(mysqli_num_rows($qq1)>0)
{
	$q="update pref  set interest='$app',field='$f' where id='$id'";//haad hai meri...
	echo $app;
}
else{
$q="insert into pref values('$id','$role','$f','$app')";
}
$q1=mysqli_query($conn,$q);
 if($q1)  {
	 
	 //echo 'ins';
     }
 else
	echo'not';
//session_destroy();

?>