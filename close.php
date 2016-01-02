<?php
include 'c.php';
$q=$_GET['q'];
$post=$_GET['post'];
$query=mysqli_query($conn,"update company_post set closed=$q where post_no=$post ");
if($query)
{ if($q==1)
	echo 'Internship Closed';
else
	echo 'Internship Available';
}
	
	else
	echo 'n';



?>