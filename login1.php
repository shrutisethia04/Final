<?php
session_start();
if(isset($_POST['submit']))
{
	$field=$_POST['field'];
	header("Location:list6.php?field=".$field);
	exit();
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style1.css">
<script type="text/javascript">
function mental(){

  var xml;
  var rval;
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xml=new XMLHttpRequest();
  }
   else
  {// code for IE6, IE5
  xml=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xml.open("get","fieldchoose.php?",true);
  xml.setRequestHeader("Content-type", "text/xml");
  xml.send();
  xml.onreadystatechange=function()
  {
     if(xml.readyState==4 && xml.status==200)
         { rval= xml.responseText;
           //alert(rval);
           document.getElementById('fieldy').value=rval;
         }
  }
}
function change()
{
	document.getElementById("id1").className="visible";
}
function change1()
{
	document.getElementById("id1").className="hidden";
}
function change2()
{
	document.getElementById("div1").className="visible1";
}
function change3()
{
	document.getElementById("div1").className="hidden";
	document.getElementById("id1").className="hidden";
}
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
function hmara()
{
  var pwd= login.pwd.value;
  var email=login.email.value ;
  var xml;
  var rval;
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xml=new XMLHttpRequest();
  }
   else
  {// code for IE6, IE5
  xml=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xml.open("get","login.php?e="+email+"&p="+pwd,true);
  xml.setRequestHeader("Content-type", "text/xml");
  xml.send();
  xml.onreadystatechange=function()
  {
     if(xml.readyState==4 && xml.status==200)
         { rval= xml.responseText;
          if( rval.trim()=="login successfull!!" || rval.trim() == "Account created !!")
          {
            mental();
            change8();
           }
          else if (rval.trim() =='pwd/uname incorrect')
          { login.pwd.value="";
            login.email.value="";
          }
         }
    }
 }
function hmara2()
{
  var name= frm.name.value;
  var str_id=frm.str_id.value ;
  var xml;
  var rval;
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xml=new XMLHttpRequest();
  }
   else
  {// code for IE6, IE5
  xml=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xml.open("get","login_st.php?n="+name+"&id="+str_id,true);
  xml.setRequestHeader("Content-type", "text/xml");
  xml.send();
  xml.onreadystatechange=function()
  {
     if(xml.readyState==4 && xml.status==200)
         { rval= xml.responseText;
           //alert(xml.statusText);
            alert(rval);
          if( rval.trim()=='login successfull!!' )
          {     mental();      change8();  }
          else if (rval.trim() =='Incorrect details')
          { frm.name.value="";
            frm.str_id.value="";
          }
         }
    }
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
</script>
</head>
<body>


<input type="button" value="Internships/Jobs" onclick="change()">

<p class="hidden" id="id1" style="color:white;font-size:30px;font-weight:bold;position:relative;font-family:verdana">

	<input type="button" value="X" onclick="change1()" id="aru" style="position:relative;left:96%;top:2%"><br><br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	ARE YOU A STRIDER?
	<input type="button" value="Strider" onclick="change2()" class="button">
	<input type="button" value="Non Strider" onclick="change4()" class="button">

</p>
<div id="div1" class="hidden">
<input type="button" value="X" onclick="change3()" style="position:fixed;left:95.5%;top:25%">
	<h1 class="heading">Login</h1>
        <form name="frm" >
	<p class="text">
	Name&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" class="inputbox" name=name><br><br>
	Stride Id<input type="password" class="inputbox" name=str_id><br><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <!-- ie wala functon -->
        <input type="button" value="Login" onclick="hmara2()" class="button">
        </form>
</p>

</div>



<div id="div2" class="hidden">
<input type="button" value="X" onclick="change5()" style="position:fixed;left:95.5%;top:25%"><br><br>
<p style="color:white">
<h1 class="heading1">Choose one option</h1><br><br><br><br><br>
	<input type="button" value="Login"   onclick="change6()" class="button1">
	<input type="button" value="Not Now" onclick="change8()" class="button1">
</p>
</div>


<div id="div3" class="hidden">
<h1 class="heading">Login</h1>
                                                <input type="button" value="X" onclick="change7()" style="position:fixed;left:95.5%;top:25%">
	<form method="post" name="login" >
        <p class="text">
	Email ID&nbsp&nbsp<input type="email" class="inputbox" name=email><br><br>
	Password<input type="password" class="inputbox" name=pwd minlength=6 maxlength=20><br><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="button" name="ns_login" value="Login" onclick="hmara()"  class="button">
        </form>
</p>
</div>

<div id="div4" class="hidden">
<input type="button" value="X" onclick="change9()" style="position:fixed;left:95.5%;top:25%">
<p style="color:white;font-family:verdana" class="text1">
Choose Your Area Of Interest
<form action="login1.php" method="post">
	<select class="list" name ="field" id="fieldy">

		<option value="na">Select the field</option>
		<option class="yo"  id="management" value="management">Management</option>
		<option  id="science" value="science">Science </option>
		<option  id="design" value="design">Design </option>
		<option  id="engineering" value="engineering">Engineering </option>
		<option  id="media" value="media">Media</option>
		<option   id="others" value="others">others</option>
	</select>
</p><br><br><br><br><br><br><br><br>
<input type="submit" value="Submit"  name="submit" class="button2">
</div>
</form>
</body>
</html>