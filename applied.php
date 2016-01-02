<html>
<head>
<link rel="stylesheet" type="text/css" href="demo.css">
<link rel="stylesheet" type="text/css" href="demo1.css">

<link rel="stylesheet" type="text/css" href="fontcss.css">
</head>

<body>
<!--header part-->
<div id="header">
<section class="color-1">
				<nav class="cl-effect-1">
					<a href="home2.php">Home</a>
					<?php
					session_start();
                                          if($_SESSION['role']=='nons')
					        echo ' <a href="#">Dashboard</a> ';
					  else echo ' <a href="applied.php">Dashboard</a> '; ?>

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
</div>
<!--header finish-->


<h1>Welcome User</h1>
<div id="button">
  <ul>
    <li><a style="background-color: slategrey;font-weight: bold;" href="applied.php">Applied Internships</a></li>
    <li><a href="refer.php">Referred Internships</a></li>
    <li><a href="recom.php">Recommended Internships</a></li>
   
  </ul>
<div id="applied">
		<div id="table">
<?php 
include 'c.php';
session_start();
$id=$_SESSION['uname'];
$q="Select post_no,status from applied where app_no='$id'";
$q1=mysqli_query($conn,$q);
if($q1)
	echo 'y';
else
	echo'n'; 
$status=array();
while($rw=mysqli_fetch_array($q1))
{
     $app.=$rw[0].",";
     if($rw[1]==1)	 array_push($status,"Shortlisted");
	 else if($rw[1]==2)	 array_push($status,"Accepted");
	      else if($rw[1]==-1)	 array_push($status,"Declined");
		       else  array_push($status,"Applied");
}
$app=rtrim($app,",");
echo $app;
$a="select * from company_post where post_no IN (".$app.")";   //jo already applied h , they shudnt show in recmndd
?>
 <ul id="bleh">
 <?php
 $i=0;
 if ($r= mysqli_query($conn,$a) ) {
while($rw2=mysqli_fetch_array($r))
	{
      $qq=mysqli_query($conn,"Select C_logo from company_details where C_name='$rw2[C_name]' ");
      $row=mysqli_fetch_array($qq);
      $rr=$row['C_logo'];
      echo'<li>
           <div class="main">
           <img src="'.$rr.'" class="logo">
	   <div class="details">'.$rw2['C_name'].' <h3></h3>
           <p>'.$rw2['intern_profile'].'</p>
           <p>Work From '.$rw2['intern_type'].'</p>';
           if($rw2['stipend']=='performance')
             echo '<p>Performance Based .</p>';
            else if ($rw2['stipend']=='fixed')
                   echo '<p>Rs. '.$rw2['min_stipend'].'/- </p>';
            else if ($rw2['stipend']=='variable')
                   echo '<p>Rs. '.$rw2['min_stipend'].'-'.$rw2['max_stipend'].'/- </p>';
            echo '<p>Min Duration: '.$rw2['min_duration'].' '.$rw2['dur_period'].' </p></div>';
            echo '<button class="one">'.$status[$i].'</button>
			
	<button class="two"> Refer </button>
    </div></li>'; $i++;
 }
// $i++;
}
?>

</ul>
</div>
</div>
</div>

<div id="header">Footer</div>
</body>
</html>