<?php
	include 'c.php';
	session_start();
	$id=$_SESSION['uname'];
	$q="Select field from pref where id='$id'";
        $q1=mysqli_query($conn,$q);
	if(mysqli_num_rows($q1)>0)
	{
		$rw=mysqli_fetch_array($q1);
		$f1= $rw[0];
	}
	else  {  $f1='na';
	}
        echo $f1;
        session_write_close();
	?>