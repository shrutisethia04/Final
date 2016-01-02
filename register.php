<?php
include 'c.php';
if(isset($_POST['submit']))
{
	$cn=htmlentities($_POST['cname']);
	$e=htmlentities($_POST['email']);
	$p=md5(htmlentities($_POST['password']));	
	$fn=htmlentities($_POST['first_name']);
	$ln=htmlentities($_POST['last_name']);
	$cc=htmlentities($_POST['country_code']);
	$pc=htmlentities($_POST['phone_primary']);
	$q="insert into `company_register`(C_name,C_email,password,first_name,last_name,country_code,phone_primary) values('$cn','$e','$p','$fn','$ln','$cc','$pc')";
	$t=mysqli_query($conn,$q);
	if($t)
		{ session_start();
		  $_SESSION['email']=$e;
		  $_SESSION['cname']=$cn;
		  $_SESSION['role']='comp';
                  header('location:intern.php?edit=N');
                }
	else
		echo mysqli_error($conn);
}

?>
<html>
<head>
<title>Company Registration </title>
<link rel="stylesheet" href="s.css" type="text/css">
<script>
function namever(username)
{  
  var xmlhttp;
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.open("get","getname.php?email="+username,true);
  xmlhttp.setRequestHeader("Content-type", "text/xml");
  //xmlhttp.send("u="+username.value);
  // xmlhttp.send(params);
  xmlhttp.send();

   xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {// alert(xmlhttp.responseText);
      var rval= xmlhttp.responseText;
     //  alert(rval);
      if (rval.trim()== "found")
      { document.getElementById("chk").innerHTML="<sup style='color:red'>Email id already Exists</sup>";
        username.value="";
      }
	  else document.getElementById("chk").style.display="none";
     }
  }
}
</script>
</head>
<body>
<div style="text-align:centre;border: black; background:#C8C8C8 ; width:30%;margin: 63px auto;height:65%;padding:24px;border-radius:32px">
<form action="register.php" id="registration-form" method="post">

                        <div class="form-group">
                            <label for="company_name" class="control-label">Company Name:</label><br>
                            <input type="text" class="form-control" id="company_name" name="cname" required>
                        </div><br>
                        <div class="form-group">
                            <label for="email" class="control-label">Your Email: <span class="label_hint">(Strongly recommend an official email id)</span></label><br>
                            <input type="email" class="form-control" id="email" name="email" placeholder='Your email' onchange="namever(this.value)"required>
                            <div  id="chk"></div>
                        </div><br>
                        <div class="form-group">
                            <label for="password" class="control-label">Choose Password (min. 6 characters):</label><br>
                            <input type="password" class="form-control" id="password" name="password" minlength="6" maxlength="15" placeholder='Choose Password'required>
                        </div><br>
                        <div class="col-xs-6" id="first_name_container">
                            <div class="form-group">
                                <label for="first_name" class="control-label">First Name:</label><br>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder='Your First Name'required>
                            </div>
                        </div><br>
                        <div class="col-xs-6" id="last_name_container">
                            <div class="form-group">
                                <label for="last_name" class="control-label">Last Name:</label><br>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder='Your Last Name'>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label for="phone_primary" class="control-label">Mobile Number:</label><br>
                            <div class="input-group">
                                <input type="text" class="form-control country-code" id="country_code" name="country_code" value="+91" style="width:40px" />
                                <input type="number" class="form-control mobile-number" id="phone_primary" name="phone_primary" min=1000000000 max"9999999999" placeholder='Your 10 Digit Mobile Number'required>
                            </div>
                        </div><br>

                        <div id="employer_registration_button">
                           <input type="submit" value="Register" name="submit"class="button" />

                    </form>
					
</div>
</div>
</body>
</html>