<?php
include 'c.php';
$opt=$_GET['field'];
 session_start();
 $id=$_SESSION['uname'];
 $qa="select interest from pref where id='$id' and field='$opt'";
 $qa1=mysqli_query($conn,$qa);
 $rw2="";
	if(mysqli_num_rows($qa1)>0)
	{
		$rw1=mysqli_fetch_array($qa1);
		$rw2=explode(",",$rw1[0]);
		foreach($rw2 as $v1)
		{
			$leftopt.="'".$v1."',";
			$left.=$v1.',';
		}
	    $leftopt=rtrim($leftopt,',');
	    $left=rtrim($left,',');

	}
	else
	{
		$leftopt="";
	}
	if(empty($leftopt))
	{
		$q="Select options from $opt WHERE options NOT IN ('".$leftopt."') ";
	
	}
	else
	{
		$q="Select options from $opt WHERE options NOT IN (".$leftopt.") ";
	}
	if($q1=mysqli_query($conn,$q))
	{
		while($rw=mysqli_fetch_array($q1))
		{
			echo'<li class="ui-state-default">'.$rw[0].'</li>';
		}
	}
 ?>
