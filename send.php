<?php

$typ=$_GET['type'];
// echo($_GET['mails'][0]);
// echo($_GET['mails'][1]);
// echo($_GET['mails'][2]);
$value = unserialize($_POST['mails']);
print_r($value);
if(isset($_POST['senda']))
{
echo 'a';
// $_POST['content']	
}
if(isset($_POST['sends']))
{
echo 's';	
}
if ($typ=='msg')
	{
		$m=$_POST['content'];
	}
else if($typ=='mail')
		{
		  $sub=$_POST['sub'];
		  $body=$_POST['content'];
		}
	  else if($typ=='both')
			  {
				$m=$_POST['msgcon'];
				$sub=$_POST['sub'];
				$body=$_POST['mailcon'];
			  }
		  
// echo $typ.' '.$sendto; 

// $_POST[]
// $_POST[]
// mail
?>