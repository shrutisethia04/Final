<?php
include 'c.php';
 session_start(); $e=$_SESSION['email'];
 $v="select C_name from company_register  where C_email='$e'";
 $v1=mysqli_query($conn,$v);
 $v2=mysqli_fetch_array($v1);
 $cname=$v2['C_name'];
 if($_GET['edit']=='N')
 { $des="";
   $csite=""; 
 }
 else 
 {if($_GET['edit']=='Y')
    {
		$query="Select * from company_details where C_name='$cname' ";
		$query1=mysqli_query($conn,$query);
		if($query1)
		{
			$rw=mysqli_fetch_array($query1);
			$des=$rw['C_description'];
			$csite=$rw['C_website'];
		}
    }
  else if($_GET['edit']=='r')
  {	echo $_POST['csite'];  
	$csite=$_POST['csite'];
	$des=htmlspecialchars($_POST['des'],ENT_QUOTES);
  }
 
 }
 
 
 
 if(isset($_POST['submit']))
{
	
	
	$trgtdir = "m/";
$name = $_FILES["l"]["name"];

$tmp_name = $_FILES["l"]["tmp_name"];
$size= $_FILES["l"]["size"];
$extension = strtolower(substr($name, strpos($name,'.')+1) );

$upload_status =1;
if ($size >=2097152)
{  $upload_status =0;
   echo "<script>alert('File too large ! greater than 2 mb')</script>";
}
else  { if ($size ==0 )
          {  $upload_status =0;
             echo "<script>alert('File empty !!')</script>";
          }
          else   {  if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "gif" )
                          $upload_status =1;
                     else  { echo "<script>alert('Only JPG, JPEG, PNG & GIF files are allowed.')</script>"; $upload_status =0; }
                  }

}
	$logo =  $trgtdir. $cname.'.'.$extension;

	
	if(move_uploaded_file($tmp_name, $trgtdir.$cname.'.'.$extension) && $upload_status==1 )
	{
		 echo '<script>alert("Uplaoded Successfully!!")</script>' ;
         $sql=" INSERT INTO `company_details`(C_name,C_website,C_description,C_logo) VALUES ('$cname','$csite','$des','$logo')";
         if (mysqli_query($conn,$sql))
           { 
	   header('Location:cdash.php');
	   //echo 'inserted';
	       }
         else {echo "<script>alert('All fields are Compulsory')</script>" ;}
     }
	 else echo 'uploading error' ;
}
	
?>
<html>
<head>
<link rel="stylesheet" href="s.css" type="text/css">
</head>
<body>

<div style="text-align:centre;border: black; background:#C8C8C8 ; width:40%;margin: 63px auto;height:60%;padding:24px;border-radius:32px">
<table>
<form id='jsform' action= "intern.php?edit=r" method="POST" enctype="multipart/form-data" >
<tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><td>Company Name </td><tr><td> <input type="text" name="cname" readonly="readonly" value="<?php echo $cname;?>"required /></td></tr></tr><tr></tr><tr></tr>
<tr><tr></tr><tr></tr><tr></tr><tr></tr><td>Company Website </td><tr><td> <input type="url" name="csite"value="<?php echo $csite ?>" required /></td></tr></tr><tr></tr><tr></tr>
<tr><tr></tr><tr></tr><tr></tr><tr></tr><td>Company Description </td></tr><tr><td><textarea rows="5" cols="50" name="des"  required><?php echo $des ?></textarea></td></tr><tr></tr><tr></tr>
<tr><tr></tr><tr></tr><tr></tr><tr></tr><td>Company logo</td></tr><tr><td><input type="file" name="l"  id="l" /></td></tr><tr></tr><tr></tr>
<tr><tr></tr><tr></tr><tr></tr><tr></tr><td><input type="submit" name="submit"  value="Next"  class="button"></td>
</form>
<td><a href="logout.php"><button class="button">Logout</button></a></td></tr>
</table>
</div>
</body>
</html>