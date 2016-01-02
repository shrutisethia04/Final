<html>
<link href="css1/main.css" rel="stylesheet" type="text/css">
<link href="css1/demo.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="homecss3.css">
<link rel="stylesheet" type="text/css" href="fontcss.css">
</html>

<?php
include 'c.php';
$s=$_GET['s'];
$d=$_GET['d'];
$f=$_GET['f'];
$l=$_GET['l'];
//echo 's='.$s.' d='.$d.' f='.$f.' l='.$l.' ' ;
/*
for($i=0 ; $i<3; $i++)
{ echo'<li>
sdfghytjhgfvrfd
</li> ';
}
*/
$str='where ';

if ($s =="na" AND $d =="na" AND $f =="na" AND $l =="na") { $sql="Select * from company_post " ;}
else {
$cnt=0;
if($s =="na"  || $s==0 ) {}
else {
  if ($cnt==1)  $str=$str.' AND ';
  $str=$str.' (stipend !="performance") AND ';
  if ($s==5) $str= $str.' (min_stipend >= 5000 AND max_stipend <= 10000)' ;
  else if ($s==10) $str= $str.' (min_stipend >= 10000)' ;
  $cnt=1 ;}
if($d =="na") {}
else {
  if ($cnt==1)  $str=$str.' AND ';
  if ($d ==1 ) $str= $str.' ((min_duration <= 4 AND dur_period ="weeks(s)" ) OR (min_duration = 1 AND dur_period = "month(s)" )) ' ;
  else if ($d ==2 ) $str= $str.' (( min_duration > 4 AND dur_period ="weeks(s)" AND min_duration <= 16 ) OR (min_duration >= 2 AND dur_period = "month(s)"  AND min_duration <= 3) ) ' ;
  else if ($d ==4 ) $str= $str.' (( min_duration > 16 AND dur_period ="weeks(s)") OR (min_duration >= 4 AND dur_period = "month(s)") ) ' ;
  $cnt=1;
     }
if($f =="na") {}
else { //+"&=intern_type1"
  if ($cnt==1)  $str=$str.' AND ';
  $str= $str.' (intern_field ="'.$f.'") ' ;
  $cnt=1;
     }
if($l =="na") {}
else {
  if ($cnt==1) $str=$str.' AND ';
  if ($l == "home") { $str= $str.' (intern_type = "home") ' ;}
  else {
        list($first, $last)=explode(',',$l);
        $str= $str.' (( first ="'.$first.'") OR (last ="'.$last.'") ) ' ;
        }
  $cnt=1;
      }
//echo $str ;
$sql="Select * from company_post ".$str;
}
//echo '<br>'.$sql ;
if ($r= mysqli_query($conn,$sql) ) {
while($rw=mysqli_fetch_array($r))
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
            echo '</li>';
 }
}

 ?>