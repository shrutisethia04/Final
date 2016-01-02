<?php
include "c.php";

$arr= $_GET['slist'];
$post=$_GET['post'];
$status=$_GET['do'];
// print_r ($arr) ;
// echo $post ;
//print_r ($arr) ;
$slist = explode(",",$arr);

//foreach()
// $sslist = implode(",",$slist);

foreach($slist as $var) {
if ($status=='s')
$query = "UPDATE `applied` SET shortlisted =1 WHERE post_no=$post AND app_no='$var'   " ;
if ($status=='d')
$query = "UPDATE `applied` SET shortlisted =-1 WHERE post_no=$post AND app_no='$var'   " ;
if ($status=='a')
$query = "UPDATE `applied` SET shortlisted =2 WHERE post_no=$post AND app_no='$var'   " ;
$sslist.="'".$var."',";
//echo $var;
if(mysqli_query($conn,$query))
{
	echo "Yes";
}
else echo "No" ;
}
$sslist =rtrim($sslist,",");
echo $sslist ;
// if(mysqli_query($conn,"UPDATE `applied` SET shortlisted =2 WHERE app_no NOT IN ($sslist)"))
// {
	 // echo "yeahh" ;

// }
	 // else echo "nahh" ;
?>