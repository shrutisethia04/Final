<?php
	include 'c.php';
	$opt=$_GET['field'];
	session_start();
	$_SESSION['field']=$opt;
?>


<html>
<head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link type="text/css" href="style.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
  <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

  <script type="text/javascript">
  $(function() {
    $( "#sortable1, #sortable2" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
  });
  </script>
 <script>
function f()
{
  var lis = new Array();
// Iterate through the <li> items
    $("#sortable2").children("li").each(function()
{
    lis.push($(this).text());
});
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
  xml.open("get","pref.php?items="+lis,true);
  xml.setRequestHeader("Content-type", "text/xml");
  xml.send();
  xml.onreadystatechange=function()
  {
     if(xml.readyState==4 && xml.status==200)
         { rval= xml.responseText;
           //alert(xml.statusText);
            alert(rval);
         }
        // alert (rval);

    }
//  header('location:home2.php');
 // exit();
}
 </script>

</head>
<body>
<div id="header">

<section class="color-1">
        <nav class="cl-effect-1">
          <a href="#" style="font-family:arial">Header</a>
        </nav>
      </section>

</div>
<hr />
 <p class="text1" >Fields</p>
<p class="text2" >Preference</p>
<p class="text3">*Drag the entries to move between columns</p>
<?php
 echo "<form  name='frm' action='home2.php'>";
?>
<ul id="sortable1" class="connectedSortable">

<?php
 session_start();
 $id=$_SESSION['uname'];
 $qa="select interest from pref where id='$id' and field='$opt'";
 $qa1=mysqli_query($conn,$qa);
 $rw2="";
	if(mysqli_num_rows($qa1)>0)
	{
		$rw1=mysqli_fetch_array($qa1);
		$rw2=explode(",",$rw1[0]);
		foreach($rw2 as $v1)
		{
			$leftopt.="'".$v1."',";
			$left.=$v1.',';
		}
	    $leftopt=rtrim($leftopt,',');
	    $left=rtrim($left,',');

	}
	else
	{
		$leftopt="";
	}
	if(empty($leftopt))
	{
		$q="Select options from $opt WHERE options NOT IN ('".$leftopt."') ";
	
	}
	else
	{
		$q="Select options from $opt WHERE options NOT IN (".$leftopt.") ";
	}
	if($q1=mysqli_query($conn,$q))
	{
		while($rw=mysqli_fetch_array($q1))
		{
			echo'<li class="ui-state-default">'.$rw[0].'</li>';
		}
	}
	echo '</ul>';
 ?>

 <ul id="sortable2" class="connectedSortable" name="sel">
 <?php

	if(!empty($rw2))
	{
		$rw2=explode(",",$left);
		foreach($rw2 as $v)
		{
			echo'<li class="ui-state-default">'.$v.'</li>';
		}
	}
?>
</ul>

 

<input type="submit" class="button2" value="Submit" name="submit" onclick="f()">
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div id="footer">Footer</div>

</body>
</html>