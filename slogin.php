<?php
include 'c.php';
if(isset($_POST['submit']))
{
	$e=htmlentities($_POST['email']);
	$p=htmlentities($_POST['password']);
	$a="select C_name, password from company_register where C_email='$e' ";
	$t=mysqli_query($conn,$a);
	$num=mysqli_num_rows($t);
	if($num>0)
	{
		$row=mysqli_fetch_array($t);
		if($row['password']==$p)
		{
			session_start();
			$_SESSION['email']=$_POST['email'];
			$_SESSION['cname']=$row['C_name'];
			$_SESSION['role']='comp';
			header('Location:cdash.php');
			
			
		}
		else
			echo '<script> alert("Invalid email or password") </script>';	
	}
	else
		echo '<script> alert("Invalid email or password") </script>';
	
	
	
}
?>
<head>

<link rel="stylesheet" href="s.css" type="text/css"> 
</head>
<div style="text-align:centre;border: black; background:#C8C8C8 ; width:30%;margin: 63px auto;height:25%;padding:24px;border-radius:32px">
<form action="slogin.php" method="post">
Email<br>
<input type="email" name="email" placeholder="Company email" ><br><br>
Password<br>
<input type="password" name="password"><br><br>
<input type="submit" name="submit" value="Login" class="button">
</form>
 <a href="register.php"><input type="button" value="Register" name="submit" class="button" style="margin-left:55px"/></a>
</div>