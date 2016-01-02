<?php 
   include 'c.php';  
   $email=$_GET['email'];
   $r=mysqli_query($conn," SELECT C_email FROM company_register where C_email='$email'");
   $c=mysqli_num_rows($r);
   if($c>0)
   {
	   echo 'found';
   }
   else
   {
	   echo 'valid';
   }
	   
?>