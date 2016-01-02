<?php
include 'c.php';
$q =$_GET['q'];
$sql="SELECT options from $q";
$r= mysqli_query($conn,$sql);
while($rw=mysqli_fetch_array($r))
	{
		echo '<option value="'.htmlspecialchars($rw['options']).'">'.$rw['options'].'</option>';
    }
?>
