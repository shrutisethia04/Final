<?php
include 'c.php';

?>
<html>
<head>

<link href="css1/main.css" rel="stylesheet" type="text/css">
<link href="css1/demo.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="homecss3.css">
<link rel="stylesheet" type="text/css" href="fontcss.css">


</head>


<body>

<div id="header">
<section class="color-1">
				<nav class="cl-effect-1">
					<a href="#">Home</a>
					<?php
     					session_start();
     					$role = $_SESSION['role'] ;
                                          if($role=='nons')
					        echo ' <a href="#">Dashboard</a> ';
					  else  echo ' <a href="applied.php">Dashboard</a> ';
                                           ?>
				</nav>
			</section>
</div>

<!--button section-->


        <div class="click-nav">
			<ul class="no-js">
				<li>
					<a class="clicker"><img src="img/i-7.png" alt="Icon" style="height:30">
                    <img src="img/i-10.png" alt="Icon" style="margin-left:32px;margin-top:10px"></a>
					<ul style="z-index:10;">
						<li><a href="#"><img src="img/i-5.png" alt="Icon">My Referrals</a></li>
						<li><a href="#"><img src="img/i-5.png" alt="Icon">Edit Profile</a></li>
						<li><a href="#"><img src="img/i-5.png" alt="Icon">Change Password</a></li>
						<li><a href="logout.php?userr=<?php echo $role ; ?> "><img src="img/i-5.png" alt="Icon">Sign out</a></li>
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
function change4()
{
	document.getElementById("div2").className="visible2";
}
function change5()
{
	document.getElementById("div2").className="hidden";
	document.getElementById("div1").className="hidden";
	document.getElementById("id1").className="hidden";
}
function change6()
{
	document.getElementById("div3").className="visible3";
}
function change7()
{
	document.getElementById("div3").className="hidden";
	document.getElementById("div2").className="hidden";
	document.getElementById("div1").className="hidden";
	document.getElementById("id1").className="hidden";
}
function change8()
{
	document.getElementById("div4").className="visible4";
}
function change9()
{
	document.getElementById("div4").className="hidden";
	document.getElementById("div3").className="hidden";
	document.getElementById("div2").className="hidden";
	document.getElementById("div1").className="hidden";
	document.getElementById("id1").className="hidden";
}

function change10()
{
	document.getElementById("s1").className="visible2";
}
function change11()
{
	document.getElementById("s1").className="hidden";
}
function change12()
{
	document.getElementById("s2").className="visible3";
}
function change13()
{
	document.getElementById("s2").className="hidden";
	document.getElementById("s1").className="hidden";
}
function change14()
{
	document.getElementById("s3").className="visible4";
}
function change15()
{
	document.getElementById("s3").className="hidden";
	document.getElementById("s2").className="hidden";
	document.getElementById("s1").className="hidden";

}
		</script>

<a href="https://www.facebook.com/pages/Grow-Online-with-Stride-Line/312753672253683?fref=ts" target="_blank"><img src="http://www.niftybuttons.com/scribble/facebook.png" style=" margin-left:1050;margin-top:-65"></a><br><br>

<!--Refer box-->
<div id="ReferBox">
<p id="refer">Refer a friend and get paid.
<input type="button" id="How" onclick="change10()" value="How It Works?">
  <!--search box-->
  <div id="mainContent">
  <form action ="home2.php" method="post">
  <input id="search1" placeholder="Search here..." type="text" name="hmaratext">
  <input id="search2" type="submit" value="Search" name="hmarasearch" >
  </form>
  <?php
  if(isset($_POST['hmarasearch']))
  {
	  $search=$_POST['hmaratext'];
	if($q=mysqli_query($conn,"Select * from company_post where C_name like '%$search%' || intern_field like '%$search%' ||intern_profile like '%$search%' || intern_des like '%$search%' || intern_location like '%$search%' ")) 
	  while($rw=mysqli_fetch_array($q))
	  {
	    $qq=mysqli_query($conn,"Select C_logo from company_details where C_name='$rw[C_name]' ");
      $row=mysqli_fetch_array($qq);
      $rr=$row['C_logo'];
      echo'<li>
              <div class="main">
              <img src="'.$rr.'" class="logo">
  	      <div class="details">'.$rw['C_name'].' <h3></h3>
              <p>'.$rw['intern_profile'].'</p>
              <p>'.$rw['intern_type'].'</p>';
              if($rw['stipend']=='performance')
                     echo '<p>Performance Based .</p>';
              else if ($rw['stipend']=='fixed')
                     echo '<p>Rs. '.$rw['min_stipend'].'/- </p>';
              else if ($rw['stipend']=='variable')
                     echo '<p>Rs. '.$rw['min_stipend'].'-'.$rw['max_stipend'].'/- </p>';
              echo '<p>Min Duration: '.$rw['min_duration'].' '.$rw['dur_period'].' </p></div>';
  			$x=$rw['post_no'];
  			$y=$_SESSION['uname'];
  			$er = "SELECT * FROM `applied` WHERE post_no= '$x' AND app_no='$y'";
  			$qw = mysqli_query($conn,$er);
  			if (mysqli_num_rows($qw)>0)
  			{	//disable btn
  			  echo '<input type="button" class="one" value="Applied" onclick="face()" disabled>';
			  //alert("You have already applied");
  			}
  			else { echo '<a href="fullpost.php?post='.$rw['post_no'].'" ><input type="button" class="one" value="Apply"></a>'; }
  	      echo ' <button class="two"> Refer </button>
             </div>
        </li>
        <br>';
	  }
	  
	  
  }
  ?>
  </div>
</div>

<!--overlay-->

<p class="hidden" id="s1">
<input type="button" value="X" onclick="change11()" style="position:fixed;left:96.5%;top:21%">
    <br/><br/><br/>
	<span style="color:darkblue;font-weight:bold">100% Referrals</span><br><br>You dont apply for jobs. You refer your friends<br>or you get reffered.<br><br>
	 <input type="button" value="Next" class="buttons" onclick="change12()">
</p>


<div id="s2" class="hidden">
<input type="button" value="X" onclick="change13()" style="position:fixed;left:96.5%;top:21%">
    <br/><br/><br/>
	<p style="color:darkblue;font-weight:bold">Great feeling-Easy Money</p><p>You get your friends and you make money <br> Rs.50 average per introduction. Cash out via PayPal or cheque.
	<br> <br>
<input type="button" value="Got It" class="buttons" onclick="change14()">
</div>



<div id="s3" class="hidden">
<input type="button" value="X" onclick="change15()" style="position:fixed;left:96.5%;top:21%">
<br/><br/><br/>
 <p style="color:darkblue;font-weight:bold">Simple Process</p>
 <p>Access your social contacts. <br>  Select who you want to introduce. <br> We take care of the rest. <br><br>
<input type="button" value="Refer Now" class="buttons" onclick="change15()">
</p>
</div>

<!--overlays end-->






<!--sort list on the left-->
<?php
 //error_reporting(E_ALL^E_WARNING );

//session_start();
echo '
<form id="form" action="home2.php" method="post">
   <p class="id1" >Narrow your search</p>
   <p class="select" id="locationp">Location</p>
        <select class="list" id="location" onchange="query(location,stipend,duration,fieldd)">';
		$dark="Select distinct intern_location from company_post";
		$dark1=mysqli_query($conn,$dark);
        echo '<option value="na">Location</option>';
		while($dark2=mysqli_fetch_array($dark1))
		{
			list($first, $last)=explode(',',$dark2[0]);
	        echo '<option>'.$first.','.$last.'</option>';
	    }
	    echo '</select>
<br>
<p class="select" id="stipendp">Stipend</p>
<select class="list" id="stipend" onchange="query(location,stipend,duration,fieldd)">
	<option value="na">Stipend</option>
	<option value=0>Any will do</option>
	<option value=5>5000-10000</option>
	<option value=10>10000- Above</option>
	</select>
<br>

<p class="select" id="durationp">Duration</p>
<select class="list" onchange="query(location,stipend,duration,fieldd)" id="duration">
	<option value="na">Duration</option>
	<option value=1>2-4 Weeks</option>
	<option value=2>2-3 Months</option>
	<optionvalue=4>4-6 Months</option>
</select>
<br>
<p class="select" id="fieldp">Field Name</p>
<select class="list" id="fieldd" onchange="query(location,stipend,duration,fieldd)">
	<option value="na">Field</option>
	<option value="engineering">Engineering</option>
	<option value="media">Media</option>
	<option value="science">Science</option>
</select>
<br>


<input type="checkbox" id="check" value="workfromhome" onchange="work_home()"><p id="select1">Work From Home</p>
<br>
<input class="button" type="reset" value="Reset">

</form> ';

echo '
<div id="div2" class="hidden">
<input type="button" value="X" onclick="change5()" style="position:fixed;left:96.5%;top:21%"> <br><br><br>
<p>
To apply, you must be logged in first. <br> <br>
	<input type="button" value="Login"   onclick="change6()" class="buttons"> &nbsp&nbsp&nbsp&nbsp
	<input type="button" value="Not Now" onclick="change5()" class="buttons">
</p>
</div>


<div id="div3" class="hidden">
<input type="button" value="X" onclick="change7()" style="position:fixed;left:96.5%;top:21%"><br><br><br>
<p>
<span style="color:darkblue; font-weight:bold;"> Login </span><br><br>

	Email ID:<input type="textarea"><br><br>
	Password:<input type="textarea"><br><br>
	<input type="button" value="Login" onclick="change8()" class="buttons"></a>
</p>
</div>

<div id="div4" class="hidden">
<input type="button" value="X" onclick="change9()" style="position:fixed;left:96.5%;top:21%"><br><br><br>
<p>
Choose your area of interest :
	<select class="list">
		<option value="na">Select the field</option>
		<option class="yo">A</option>
		<option>B</option>
		<option>C</option>
		<option>D</option>
		<option>E</option>
	</select>
</p>
<a href="list6.html"><input type="button" value="Submit" class="buttons"></a>
</div>

<div id="table">';
//$_SESSION['uname'];

$q="Select * from company_post order by post_no desc";
if($q1=mysqli_query($conn,$q))
{  echo'<ul id="bleh">';
   while($rw=mysqli_fetch_array($q1))
   {
      $qq=mysqli_query($conn,"Select C_logo from company_details where C_name='$rw[C_name]' ");
      $row=mysqli_fetch_array($qq);
      $rr=$row['C_logo'];
      echo'<li>
              <div class="main">
              <img src="'.$rr.'" class="logo">
  	      <div class="details">'.$rw['C_name'].' <h3></h3>
              <p>'.$rw['intern_profile'].'</p>
              <p>'.$rw['intern_type'].'</p>';
              if($rw['stipend']=='performance')
                     echo '<p>Performance Based .</p>';
              else if ($rw['stipend']=='fixed')
                     echo '<p>Rs. '.$rw['min_stipend'].'/- </p>';
              else if ($rw['stipend']=='variable')
                     echo '<p>Rs. '.$rw['min_stipend'].'-'.$rw['max_stipend'].'/- </p>';
              echo '<p>Min Duration: '.$rw['min_duration'].' '.$rw['dur_period'].' </p></div>';
  			$x=$rw['post_no'];
  			$y=$_SESSION['uname'];
  			$er = "SELECT * FROM `applied` WHERE post_no= '$x' AND app_no='$y'";
  			$qw = mysqli_query($conn,$er);
  			if (mysqli_num_rows($qw)>0)
  			{	//disable btn
  			  echo '<input type="button" class="one" value="Applied" onclick="face()" disabled>';
			  //alert("You have already applied");
  			}
  			else { echo '<a href="fullpost.php?post='.$rw['post_no'].'" ><input type="button" class="one" value="Apply"></a>'; }
  	      echo ' <button class="two"> Refer </button>
             </div>
        </li>
        <br>';
  }
}


?>
</ul>
<br/>
</div>

<!--Right section-->
<!--Fields-->
<div id="field">
<p class="text"> Fields
	<ul class="text1">
		<li>Web Development</li>
		<li>Robotics</li>
		<li>Graphics</li>
		<li>Image Processing</li>
		<li>Electronics</li>
		<li>Computer</li>
		<li>Information Technology</li>
		<li>Mechanical</li>


	</ul>
</p>
</div>


<div id="success">

	<p class="id1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUCCESS IN THE AIR</p>
<p class="text">

	"Below is a sample of “Lorem ipsum dolor sit” dummy copy text often used to show font face samples"

</p>
<input type="button" value="Read More" class="button">

	</div>


<!--facebook like box-->

<div id="fb">
<p class="text"> Facebook Like Box
</p>
</div>
<div id="subscribe">
<input id="search" type="text" placeholder="Enter your Email-ID" >
<input id="submit" type="submit" value="Subscribe">
</div>
<div id="header">Footer</div>

</body>

</html>
<script>
function face()
{
	alert("Already Applied");
}
function query(loc,sti,dur,fie)
{
//input.value
var xml ;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xml=new XMLHttpRequest();
  }
   else
  {// code for IE6, IE5
  xml=new ActiveXObject("Microsoft.XMLHTTP");
  }
 // if (workfromhome.checked== true)    xml.open("get","int_post.php?l="+loc.value+"&s="+sti.value+"&d="+dur.value+"&f="+fie.value+"&v=1",true);
  xml.open("get","int_post.php?l="+loc.value+"&s="+sti.value+"&d="+dur.value+"&f="+fie.value,true);
  xml.setRequestHeader("Content-type", "text/xml");
  xml.send();
  xml.onreadystatechange=function()
  {
     if(xml.readyState==4 && xml.status==200)
         { document.getElementById("bleh").innerHTML=xml.responseText; }
    }
}

function work_home()
{ if (check.checked== true)
   { // alert("Clicked");
      location.value="home";
      query(location,stipend,duration,fieldd);
   }
  if (check.checked== false)  
  {//alert("UnClicked");
   query(location,stipend,duration,fieldd);
  }
}
</script>