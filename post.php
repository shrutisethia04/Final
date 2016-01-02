<?php
session_start();
if(isset($_SESSION['cname']))
	$cname=$_SESSION['cname'];
else
{
	echo '<script>alert("You are not logged in..")</script>';
	exit();
}
?>
<html>
<head>
<style type="text/css">
  .select{
	  width:560px;
	  height:35px;
  }
  .button {
	  text-align: center;
	  display: block;
	  border: 1px solid white;
	  padding: 15px;
	  background-color: rgb(75, 61, 74);
	  color: white;
	  height:44px;
	  width:96px;
	  font-weight: bold;
	  text-decoration: none;
	  float:left;


}

.button:hover {
	background-color: grey;
}
</style>
<script src="https://code.jquery.com/jquery-1.10.2.js">  </script>
<script>
	function func(item) {
		if(item=='variable'){
	 $("#variable").after("<br><input type=number name=min placeholder=min >");
  $("#variable").before("<br><input type=number name=max placeholder=max >");
		}
		else
			if(item=='fixed'){
				$("#fixed").after("<br><input type=text name=min placeholder=min >");
			}
	}
 </script>
<script>
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
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
<script type="text/javascript">
   function init() {
      var input = document.getElementById('searchTextField');
      var autocomplete = new google.maps.places.Autocomplete(input);
	  
   }
   google.maps.event.addDomListener(window, 'load', init);
   
</script>
<script src="https://code.jquery.com/jquery-1.10.2.js">  </script>
 <script>
function Show_Div(Div_id ,rest_id , rest1_id) {
            if (false == $(Div_id).is(":visible")) {
                $(Div_id).show(250);
             if (true == $(rest_id).is(":visible")) {     $(rest_id).hide(250); }
              if (true == $(rest1_id).is(":visible")) {     $(rest1_id).hide(250); }
            }

}

</script>
</head>
<body>
<?php

include 'c.php';
include 'file_chk.php';
if(isset($_POST['submit'])&&isset($_SESSION['cname']))
{
$typ=htmlentities($_POST['type']);
$fd=htmlentities($_POST['field']);
$pro= htmlentities($_POST['state']);
$des=htmlentities($_POST['des']);
$place=htmlentities($_POST['place']);
$split = explode(",", $place);
$country= $split[count($split)-1];
list($first, $last)=explode(',',$place);
$stipend=$_POST['click'];
if($stipend=='variable')
{
	$min=htmlentities($_POST['min']);
	$max=htmlentities($_POST['max']);
	$s_period=htmlentities($_POST['s_period']);
}
if($stipend=='fixed')
{
	$min=htmlentities($_POST['amt']);
	$s_period=htmlentities($_POST['s_period']);
}
$app=htmlentities($_POST['app']);
$sd=htmlentities($_POST['sd']);
$dur=htmlentities($_POST['dur']);
$per=htmlentities($_POST['period']);
$ad=htmlentities($_POST['ad']);
//intern_type,intern_profile,intern_des,intern_location,stipend,min_stipend,max_stipend,stipend_period,app_deadline,start_date,min_duration,dur_period,additional
if($stipend=='variable')
{
$query="insert into company_post (C_name,intern_type,intern_field,intern_profile,intern_des,intern_location,country,stipend,min_stipend,max_stipend,stipend_period,app_deadline,start_date,min_duration,dur_period,addition_details,first,last)values ('$cname','$typ','$fd','$pro','$des','$place','$country','$stipend','$min','$max','$s_period','$app','$sd','$dur','$per','$ad','$first','$last')";
}
else if($stipend=='fixed')
{
	$query="insert into company_post (C_name,intern_type,intern_field,intern_profile,intern_des,intern_location,country,stipend,min_stipend,max_stipend,stipend_period,app_deadline,start_date,min_duration,dur_period,addition_details,first,last) values ('$cname','$typ','$fd','$pro','$des','$place','$country','$stipend','$stipend','$min','$s_period','$app','$sd','$dur','$per','$ad','$first','$last')";
}
else
	$query="insert into company_post (C_name,intern_type,intern_field,intern_profile,intern_des,intern_location,country,stipend,app_deadline,start_date,min_duration,dur_period,addition_details,first,last) values ('$cname','$typ','$fd','$pro','$des','$place','$country','$stipend','$app','$sd','$dur','$per','$ad','$first','$last')";

$query1=mysqli_query($conn,$query);
if($query1)
{	echo '<script>alert("Your Internship has been Posted")</script>';
        header('location:cdash.php');
}
else
	echo mysqli_error($conn);
}
?>
<form action="post.php" method="post" name="form1">
Internship Type
<br>
<select name="type" class="select" required>
<option value="">Select Type...</option>
<option value="home">Work from Home</option>
<option value="office">Work from Office</option>
</select>
<br><br>
Internship Field<br><select name="field" onchange="showfield(this.value)" class="select" required>
 <option value="">Select Field</option>
  <option value="engineering">Engineering</option>
  <option value="media">Media</option>
  <option value="management">Management</option>
  <option value="design">Designing</option>
  <option value="others">others</option>
  </select>
 <br>
  <br>Internship Description<br>
  <textarea name="des" placeholder="Describe about internship in atmost 500 words" rows="9b" cols="69" required></textarea>
  <br><br>
  Internship location<div>
      <input name="place" id="searchTextField" type="text" size="50" placeholder="Start Typing.." autocomplete="on" class="select" required>
   </div>
   <br><br>
   Stipend<br>
      <input type="radio" name="click" onclick= Show_Div(variable,performance,fixed)  value="variable">Variable
   <div id="variable" style="display:none"><input type="number" name="min" min=250>&nbsp&nbspto&nbsp <input type="number" name="max">&nbsp&nbsp&nbsp <select name="s_period"><option value="month(s)">/ Month</option><option value="week(s)">/ Week</option></select></div>
   <input type="radio" name="click" onclick= Show_Div(fixed,variable,performance)  value="fixed">Fixed
      <div id="fixed" style="display:none"> <input type="number" name="amt" min=250>&nbsp&nbsp&nbsp <select name="s_period"><option value="month(s)">/ Month</option><option value="weeks(s)">/ Week</option></select></div>

   <input type="radio" name="click" onclick= Show_Div(performance,variable,fixed) value="performance">Performance Based
      <div id="performance" style="display:none"></div>
    <br><br>
   Application Deadline<br>
   <input type="date" name="app" onchange="Validate_date(this);" class="select">
   <br><br>
   Internship Start Date<br>
   <input type="date" name="sd" onchange="Validate_date(this);" class ="select">
<br><br>
   Internship Duration<br>
   <input type="number" name="dur" class="select">&nbsp&nbsp&nbsp <select name="period" style="width:150px; height:34px"><option value="month(s)">Month(s)</option><option value="weeks(s)">Week(s)</option>
   </select><br><br>
   Additional Details<br>
  <textarea name="ad" placeholder="If any thing is missed above write here..." rows="9b" cols="69"></textarea>

 <br><br>
 <div><input type="submit" name="submit" value="Submit" class="button"/>
</form>
<a href="logout.php?userr='comp' "><input type="button" value="Logout" class="button"style="margin-left:55px"></a>
</div>
</body>
</html>