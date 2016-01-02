<html>
<head>
<script>
function func(inp1,inp2,inp3)
{
	document.getElementById(inp1).style.display="block";
	document.getElementById(inp2).style.display="none";
	document.getElementById(inp3).style.display="none";
	
}
</script>
</head>
<body>
<style>
.abc li
{
	display: inline-block ;
	list-style:none;
	width:200px;
	min-height:30px;
	text-align:center;
	border: 1px solid black;
}

</style>
</body>
</html>
<?php
include "c.php" ;
session_start();
$emails= array();
$emaila= array();
//$comp = $_SESSION['cname'];
if(!empty($_GET['post']))
{
	$post = $_GET['post'];
	echo '
    <ul class="abc">
	<li onclick=\'func("accptd","shrt","k")\'>FINALIZED</li>
	<li onclick="func(\'shrt\',\'accptd\',\'k\')">SHORTLISTED</li> 
	</ul>';

    echo '<table id="accptd" style="display:block" border=5 cellpadding=20>';
	echo '<tr > <th > Applicant </th> <th> College Name </th> <th> Strider </th> <th> Skill </th> <th> CV </th> <th>Email</th><th>Contact no</th></tr>';
	if ($rw=mysqli_query($conn,"SELECT * FROM `applied` WHERE post_no=$post AND status=2 ORDER BY role DESC") )
	{ while($res=mysqli_fetch_array($rw))
		{   if($res['role']=='str')
			{$ans= mysqli_query($conn,"SELECT * FROM `applicant` WHERE str_id='$res[app_no]'");
			 $role='Strider';
			}
			else if ($res['role']=='nons')
				{$ans= mysqli_query($conn,"SELECT * FROM `non_str` WHERE email='$res[app_no]'");
				  $role='No';
				}
			if($ans) {
			while($answer=mysqli_fetch_array($ans)) {
				 array_push($emaila,$answer['email']);
				 echo '<tr><td>'.$answer['name'].'</td><td>'.$answer['clg_name'].'</td>
				 <td>'.$role.'</td><td>'.$answer['lang'].'</td><td>'.''.'</td><td>'.$answer['email'].'</td>
				 <td>'.$answer['phone'].'</td></tr>';
				                                    }
					}
		}
	echo '</table>';
	} 

	echo '<table id="shrt" style="display:none"border=5 cellpadding=20>';
	echo '<tr > <th > Applicant </th> <th> College Name </th> <th> Strider </th> <th> Skill </th> <th> CV </th> <th>Email</th><th>Contact no</th></tr>';
	if ($rw=mysqli_query($conn,"SELECT * FROM `applied` WHERE post_no=$post AND status=1 ORDER BY role DESC") )
	{ while($res=mysqli_fetch_array($rw))
		{   if($res['role']=='str')
			{$ans= mysqli_query($conn,"SELECT * FROM `applicant` WHERE str_id='$res[app_no]'");
			 $role='Strider';
			}
			else if ($res['role']=='nons')
				{$ans= mysqli_query($conn,"SELECT * FROM `non_str` WHERE email='$res[app_no]'");
				  $role='No';
				}
			if($ans) {
			while($answer=mysqli_fetch_array($ans))
			 {  array_push($emails,$answer['email']);
				echo '<tr><td>'.$answer['name'].'</td><td>'.$answer['clg_name'].'</td><td>'.$role.'</td><td>'.$answer['lang'].'</td><td>'.''.'</td><td>'.$answer['email'].'</td><td>'.$answer['phone'].'</td></tr>';
			 }
			}
		}
	}
	
	echo '</table>';
    echo '<div style="margin-top:20px">';
	echo 'Choose method to contact : <br>';
	echo '<input type="radio" name="contact" value="msg" onclick="func(\'cidm\' ,\'cide\',\'cidb\')">Message<br>
		  <input type="radio" name="contact" value="mail" onclick="func(\'cide\' ,\'cidm\',\'cidb\')">Email<br>
		  <input type="radio" name="contact" value="both" onclick="func(\'cidb\',\'cide\',\'cidm\')">Both<br>';
	 
	echo '<div id="cidm" style="display:none">
		  <form action="send.php?type=msg" method="post">
		  <h3>Type the message here :</h3>
		  <textarea name="content" rows=5 cols=50 required></textarea><br>
		  <input type="submit" name="sends" value="Send to Shortlisted">
		  <input type="submit" name="senda" value="Send to Accepted">
		  </form>
		  </div>';
	$serialized =htmlspecialchars(serialize($emails));
	echo '<div id="cide" style="display:none">
		  <form action="send.php?type=mail" method="post">
		  <h3>Type the email contents here :</h3>
		  Subject : <input type="text" name="sub"><br> Body:
		  <textarea name="content" rows=5 cols=50></textarea><br>
		  <input type="hidden" name="maila" value="'.$serialized.'" > 
		  <input type="hidden" name="mails" value="'.$serialized.'" > 
		  <input type="submit" value="Send to Shortlisted" name="sends">
		  <input type="submit" value="Send to Accepted" name="senda">
		  </form>
		  </div>';
	echo '<div id="cidb" style="display:none">
		  <form action="send.php?type=both" method="post">
		  <h3>Type the message here :</h3>
		  <textarea name="msgcon" rows=5 cols=50></textarea>
		  <h3>Type the email contents here :</h3>
		  Subject : <input type="text" name="sub"><br> Body:
		  <textarea name="mailcon" rows=5 cols=50></textarea><br>
		  <input type="submit" value="Send to Shortlisted" name="sends">
		  <input type="submit" value="Send to Accepted" name="senda">
		  </div>';
	echo '</div>';  
}
echo '<div id="k" style="display:none"></div>';	

 ?>
