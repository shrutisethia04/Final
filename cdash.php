<html>
<meta http-equiv="refresh" >
</html>


<?php
include 'c.php';
 session_start();
 $_SESSION['role']='comp';
if(isset($_SESSION['cname']))
{
	$cname=$_SESSION['cname'];
	echo'<h2>Welcome '.$cname;
    $q=mysqli_query($conn,"Select * from company_details where C_name='$cname'");
	$rw=mysqli_fetch_array($q);

	$r=$rw['C_logo'];
	echo '<br><img height="29px" width="50px" alt="logo" src="'.$r.'"><br></h2>';
	echo '<div style="width:360px ;height:77px"><span style="font-size:33px">About Company</span><br><a href="intern.php?edit=Y">Edit Details</a><br><br>'.$rw['C_description'].'</div><br><br>';
	echo '<p>Website : </p><a href="'.$rw['C_website'].'">'.$rw['C_website'].'</a>';


$q="Select * from company_post where C_name='$cname'";
if($q1=mysqli_query($conn,$q))
{  echo'<ul style="list-style-image: url(\'i-5.png\'); " >';
  while($rw=mysqli_fetch_array($q1))
  {  $no=$rw['post_no'];
    echo'<li>
           <div style=" border:1px solid black">';
         echo '  <p>'.$rw['intern_profile'].'</p>';
		// echo '  <p>'.strtotime($rw['app_deadline'].'</p>';
		 echo date("jS F, Y", strtotime($rw['app_deadline'])); 
		 echo '  <p>Number of Applicants :'.$rw['No_of_app'].'</p>';
		 echo '  <a href="postdetails.php?post='.$no.'">View Details</a>&nbsp&nbsp&nbsp&nbsp';
		 echo '  <a href="shortliststud.php?post='.$no.'">Shortlisted Student</a>
		         <br><br><input type="button" name="closed" value=';if($rw['closed']==1) echo 'Closed';else echo 'Close'; 
				 echo ' onclick="close1('.$no.',1)">&nbsp&nbsp
				     <a onclick="close1('.$no.',0)" ><img src="refresh.png" height="14px" width="18px" style="background-color: transparent"/></a>';
         echo '</div>
        </li><br>';

  }
}

echo '
</ul>
<br/>';
echo '<a href="post.php?flag=p"><input type="button" name="post" value="+POST"></a>';
}

?>
<script>
function close1(str,val)
{
//	alert(str);

	 var xmlhttp;
	 try{
		  xmlhttp = new XMLHttpRequest();
	 }catch(e)
	 {
		  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	 }
	 
	 xmlhttp.open("GET","close.php?q="+val+"&post="+str,true);
	  xmlhttp.send();
		   xmlhttp.onreadystatechange = function()
		   {
                if (xmlhttp.readyState == 4)
			    {
				   var res=xmlhttp.responseText;
				  // alert(res);
			    }
		   }	
window.location.reload();
}






</script>














