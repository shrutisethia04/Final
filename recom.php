<html>
<head>
<link rel="stylesheet" type="text/css" href="demo.css">
<link rel="stylesheet" type="text/css" href="demo1.css">
<link rel="stylesheet" type="text/css" href="fontcss.css">
</head>
<body>

<div id="header">
<section class="color-1">
			<nav class="cl-effect-1">
					<a href="home2.php">Home</a>
					<?php
					session_start();
                                          if($_SESSION['role']=='nons')
					        echo ' <a href="#">Dashboard</a> ';
					  else echo ' <a href="recom.php">Dashboard</a> '; ?>

				</nav>
			
</section>
 <div class="click-nav">
			<ul class="no-js">
				<li>
					<a class="clicker"><img src="i-7.png" alt="Icon" style="height:30">
                    <img src="i-10.png" alt="Icon" style="margin-left:32px;margin-top:10px"></a>
					<ul style="z-index:10;">
						<li><a href="#"><img src="i-5.png" alt="Icon">My Referrals</a></li>
						<li><a href="#"><img src="i-5.png" alt="Icon">Edit Profile</a></li>
						<li><a href="#"><img src="i-5.png" alt="Icon">Change Password</a></li>
						<li><a href="logout.php?userr=<?php echo $_SESSION['role']; ?> "><img src="img/i-5.png" alt="Icon">Sign out</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- /Clickable Nav -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		
		<script>
		$(function() {
			// Clickable Dropdown
			$('.click-nav > ul').toggleClass('no-js js');
			$('.click-nav .js ul').hide();
			$('.click-nav .js').click(function(e) {
				$('.click-nav .js ul').slideToggle(200);
				$('.clicker').toggleClass('active');
				e.stopPropagation();
			});
			$(document).click(function() {
				if ($('.click-nav .js ul').is(':visible')) {
					$('.click-nav .js ul', this).slideUp();
					$('.clicker').removeClass('active');
				}
			});
		});
		</script>
	






<a href="https://www.facebook.com/pages/Grow-Online-with-Stride-Line/312753672253683?fref=ts" target="_blank"><img src="img2.png" style=" margin-left:1150;margin-top:-64;height:50px;width:50px;border-radius:30px"></a><br><br>

</section>
</div>
<h1>Welcome <?php $_SESSION['uname'];?></h1>
<div id="button">
  <ul>
    <li><a href="applied.php" active>Applied Internships</a></li>
    <li><a href="refer.php">Referred Internships</a></li>
    <li><a style="background-color: slategrey; font-weight: bold;" href="recom.php">Recommended Internships</a></li>
   
  </ul>
<div id="applied">
		<div id="table">

 <ul id="bleh">
<?php 
include 'c.php';
session_start();
$id=$_SESSION['uname'];
$q="Select interest from pref where id='$id'";
$q1=mysqli_query($conn,$q);
$rw=mysqli_fetch_array($q1);
$rw1=explode(",",$rw[0]);	
foreach($rw1 as $var)                 //$rw1 hmara array hai pref ka
{
     $app.="'".$var."'".",";	
}
$app=rtrim($app,",");
//***************
$flag=array();
$flag[$rw1[0]]=0;
$flag[$rw1[1]]=100;
$flag[$rw1[2]]=200;

//***************
function cmp($a, $b)
{
    return $a['key'] - $b['key'];
}
//***************
$gg="select post_no from applied where app_no ='$id'";
$gg1=mysqli_query($conn,$gg);
if(mysqli_num_rows($gg1)>0) {
while($rgg=mysqli_fetch_array($gg1))
{
$app1.="'".$rgg[0]."',";	
}
$app1=rtrim($app1,",");
}
else $app1="''";


$a="select * from company_post where intern_profile IN (".$app.") and post_no NOT IN(".$app1.")";
$smthng=array();

if ($r= mysqli_query($conn,$a) ) {
while($rw2=mysqli_fetch_array($r))
	{ 
      array_push($smthng,array('key'=>$flag[$rw2['intern_profile']],'0'=>$rw2['C_name'],'1'=>$rw2['intern_profile'],'2'=>$rw2['intern_type'],'3'=>$rw2['stipend'],'4'=>$rw2['min_stipend'],'5'=>$rw2['max_stipend'],'6'=>$rw2['min_duration'],'7'=>$rw2['dur_period'],'8'=>$rw2['post_no']));
      $flag[$rw2['intern_profile']]+=5;
	}
}

?>
 <ul id="bleh">
 <?php

usort($smthng,"cmp");


foreach($smthng as $var)
	{ 	//echo '<script>alert('.$var[0].');</script>';

      $qq=mysqli_query($conn,"Select C_logo from company_details where C_name='$var[0]' ");
      $row=mysqli_fetch_array($qq);
      $rr=$row['C_logo'];
      echo'<li>
           <div class="main">
           <img src="'.$rr.'" class="logo">
	   <div class="details">'.$var[0].' <h3></h3>
           <p>'.$var[1].'</p>
           <p>Work From '.$var[2].'</p>';
           if($var[3]=='performance')
             echo '<p>Performance Based .</p>';
            else if ($var[3]=='fixed')
                   echo '<p>Rs. '.$var[4].'/- </p>';
            else if ($var[3]=='variable')
                   echo '<p>Rs. '.$var[4].'-'.$var[5].'/- </p>';
            echo '<p>Min Duration: '.$var[6].' '.$var[7].' </p></div>';
             echo '<a href="fullpost.php?post='.$var[8].'" ><input type="button" class="one" value="Apply"></a>
			 <button class="two"> Refer </button>
     </div></li>';
 }

?>
</ul>
<br/>
</div>
</div>
</div>

<div id="header">Footer</div>
</body>
</html>