<?php

//***********************Function for cleaning input****************************
function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
   $string = str_replace('-', '', $string);
   return preg_replace('/[^A-Za-z0-9\-]/','',$string); // Removes special chars.
}
//******************************************************************************


include "c.php";
session_start();
$gl=$_GET['name'] ;
$post=$_GET['post'];
$id =$_SESSION['uname'] ;
$role=$_SESSION['role'];
if($_SESSION['role']=='nons')
   {
//<!--pop-up jo mange cv and skill  -->
	 echo '
	<form method=post action="Apply.php?post='.$post.'&name='.$gl.'" enctype="multipart/form-data"> 
	<br>Applicant Name<br><input type="text" name="app_name" required><br><br>
	College Name<br><input type="text" name="c_name" required><br>
	<br>Uplaod your CV<br><input type="file" name="cv" required><br><br>
	Language Known(optional)<br><input type="text" name="lang" ><br><br>
	<input type="submit" name="upload" value="submit" >
    </form>	' ;
  if(isset($_POST['upload']))
  {
	  
	$app_name=$_POST['app_name'];
	$cv_name=clean($_POST['app_name']);
    $c_name=$_POST['c_name'];	
	$skill=$_POST['lang'];
	$trgtdir = "m/";
        $name = $_FILES["cv"]["name"];
        $tmp_name = $_FILES["cv"]["tmp_name"];
        $size= $_FILES["cv"]["size"];
        $extension = strtolower(substr($name, strpos($name,'.')+1) );
		$upload_status =1;
		 if ($size ==0 )
                 {  
			          $upload_status =0;
                      echo "<script>alert('File empty !!')</script>";
                 }
                 else   
				 {  
			          if($extension == "pdf" || $extension == "txt" || $extension == "docx" || $extension == "doc"||$extension=="rtf" )
                           $upload_status =1;
                      else  
					  { 
				           echo "<script>alert('Only  files are allowed.')</script>"; $upload_status =0; 
					  }
                  }                
	     $cv=  $trgtdir. $cv_name.'.'.$extension;

	
	     if(move_uploaded_file($tmp_name, $trgtdir.$cv_name.'.'.$extension) && $upload_status==1 )
	    {
		$q="update non_str set name='$app_name',clg_name='$c_name',cv='$cv',lang='$skill' where email='$id'";
		$q1=mysqli_query($conn,$q);
			if($q1)
			{	//echo 'inserted';
		    }
			else
				echo'no';
		}
  }	  
	  
  }
	 if($role=='nons')
	 {
		 if($q1)
		 {
			 $query1= "INSERT INTO `applied` (role,post_no ,app_no ,C_name) VALUES ('$role',$post,'$id','$gl') " ;
	         if(mysqli_query($conn,$query1)) 
			 {
	                if($res=mysqli_query($conn,"Select `No_of_app` from `company_post` where post_no=$post "))
                 	{  // echo 'dffdd';
		                 $value= mysqli_fetch_array($res) ;
		                 //print_r($value);
		                 $cnt= $value[0]+1;
	                
			        $query="update `company_post` set No_of_app =$cnt where post_no=$post";
		      	        if(mysqli_query($conn,$query))
	                    { //echo 'inserted !';	 
                        }
     	                else echo 'no';
					}
		     }
		 
	      }
		  
	 }	  
	 else if($role=='str')
	 {
		 $query1= "INSERT INTO `applied` (role,post_no ,app_no ,C_name) VALUES ('$role',$post,'$id','$gl') " ;
	         if(mysqli_query($conn,$query1)) 
			 {
	                if($res=mysqli_query($conn,"Select `No_of_app` from `company_post` where post_no=$post "))
                 	{  // echo 'dffdd';
		                 $value= mysqli_fetch_array($res) ;
		                 //print_r($value);
		                 $cnt= $value[0]+1;
	                   $query="update `company_post` set No_of_app =$cnt where post_no=$post";
		 	           if(mysqli_query($conn,$query))
	                   { //echo 'inserted !';	 
                       }
	                   else echo 'no';
					}
	        }

     }
  ?>