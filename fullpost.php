<?php
include 'c.php';
session_start();
$post = $_GET['post'];
$q="Select * from company_post where post_no=$post";
if($q1=mysqli_query($conn,$q))
{
    if($rw=mysqli_fetch_assoc($q1)){
      //print_r($rw);
    $gl=$rw[C_name];
	//global $gl ;
    $qq=mysqli_query($conn,"Select C_logo,C_description from company_details where C_name='$rw[C_name]'");
    $row=mysqli_fetch_array($qq);
    $rr=$row['C_logo'];
    echo '<br><div style="font-size:45px" onclick="func(desc)"><img height="29px" width="50px" alt="logo" src="'.$rr.'">';
    echo '  '.$rw[C_name].'</div><br>';
    echo '<div id="desc" style="display:none">'.$row[C_description].'</div>';
    echo '<br>Location<br> '.$rw[intern_location];
    echo '<br><br>Stipend <br> ';
    if($rw['stipend']=='performance')
             echo 'Performance Based .';
            else if ($rw['stipend']=='fixed')
                   echo 'Rs. '.$rw['min_stipend'].'/- ';
            else if ($rw['stipend']=='variable')
                   echo 'Rs. '.$rw['min_stipend'].'-'.$rw['max_stipend'].'/- ';
            echo '<br><br>Min Duration<br>'.$rw['min_duration'].' '.$rw['dur_period'].' ';
            echo '<br><br>Last Date of Applying <br>'.$rw['app_deadline'];
            echo '<br><br>Description  <br>'.$rw['intern_des'];
      }
    echo '<br>';
  //  session_start();
 if($_SESSION['role']=='nons' || $_SESSION['role']=='str' )       //nons - non strider and str = strider
 { echo '<form method=post action="Apply.php?post='.$post.'&name='.$gl.'">
         <br><input type=submit  value="Apply Now"  >
		 </form>'  ;  
 }
 else
    {
	    echo '<br><a onClick="func(frm); return false;" href="#">Edit Internship Details</a>
		<form action="fullpost.php?post='.$post.'" method="post" style="display:none" id="frm">
	   <br><br> Internship Description<br><textarea cols="50" rows="6" name="ndes" >'.$rw['intern_des'].'</textarea>';
         echo '<br><br>Last Date of Applying <br><input  type="date" name="d" value="'.$rw['app_deadline'].'">
		<br><br> <input type="submit" name="submit" value="Edit" >
		 </form>';
	if(isset($_POST['submit']))
	{
		$post=$_GET['post'];
		$ndes=$_POST['ndes'];
        $nd=$_POST['d'];
		$upt=mysqli_query($conn,"update company_post set intern_des='$ndes',app_deadline='$nd' where post_no=$post");
		if($upt)
			header('Location:fullpost.php?f=edit');
		else
			echo '<script>alert("Please Try again!!")</script>';
	}
	}

}
else if(isset($_GET['f']))
{
	
	echo '<script>alert("Internship Updated")</script>';
}
else
	echo 'not found';
?>
<script src="https://code.jquery.com/jquery-1.10.2.js">  </script>

 <script>
 function edit(div)
 {
 }
 function func(Div_id)
 {
   if (false == $(Div_id).is(":visible")) {
                $(Div_id).show(250);
            }
            else {
                $(Div_id).hide(250);
            }

 }


function showfield(str) {
	if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
	}
	var xmlhttp;
	try{
		 xmlhttp = new XMLHttpRequest();
	}catch(e)
	{
		 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	if(xmlhttp)
	{
		var form=document['form1'];
		 xmlhttp.open("GET","getuser.php?q="+str,true);
		  xmlhttp.onreadystatechange = function()
		  {
            if (xmlhttp.readyState == 4)
			{
				var s=document.createElement("select");
				s.name="state";
				s.style.height='35px';
				s.innerHTML=this.responseText;

              // s.innerHTML = this.responseText;
				if(form['state'])
				{
					form.replaceChild(s,form['state']);
				}else
					form.insertBefore(s,form['field']);
            }
		  }
		  xmlhttp.send(null);
	}
}
 </script>