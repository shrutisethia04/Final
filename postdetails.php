<?php
include 'c.php';
$postno=$_GET['post'];
$query= "SELECT * FROM `applied` WHERE post_no=$postno  order by role desc";
if( $ans = mysqli_query($conn,$query))
{ $cnt=1;
$count=mysqli_num_rows($ans);
$i=0;
  echo '<table border=5 cellpadding=20>';
 
 echo '<tr > <th > Sno </th> <th> College Name </th> <th> Applicant </th> <th> Strider </th> <th> Skill </th> <th> CV </th><th>Shortlist</th><th>Accept</th><th>Waitlist</th><th> Decline </th></tr>';
 echo '<form action="postdetails.php?val='.$count.'&post='.$postno.'" method="post">';
 while( $rw = mysqli_fetch_array($ans) )
  {  
          echo '<tr> <td>'.$cnt++.'</td>';
	      if ($rw['role']=="str")
		  {	 
				$a=mysqli_query($conn,"SELECT clg_name,name,lang FROM `applicant` WHERE str_id = '$rw[app_no]' ");
				$y="YES";
		  }
	      else if ($rw['role']=="nons")
		  {
				$a=mysqli_query($conn,"Select clg_name,name,lang from non_str where email='$rw[app_no]'");
				$y="NO";
		  }
		 
	      $row = mysqli_fetch_array($a);
		  echo '<td>'.$row['clg_name'].'</td>';
		  echo '<td>'.$row['name'].'</td>';
		  echo '<td>'.$y.'</td>';
		  echo '<td>'.$row['lang'].'</td>';
		  echo '<td><a href="download.php?filename=textmining1.pdf"><img src="img.jpg" width=20px height=20px alt="CV"></a></td>';
		 /* echo '<td><input type="checkbox" name="short" onclick="short(this)" value="'.$rw['app_no'].'"';
		  if($rw['shortlisted']==1) echo 'checked';
		  echo '/></td>'; 
		  echo '<td><input type="checkbox" name="decline" onclick="short(this)" value="'.$rw['app_no'].'"';
		  if($rw['shortlisted']==-1) echo 'checked';
		  echo '></td>'; 
		  echo '<td><input type="checkbox" name="accept" onclick="short(this)" value="'.$rw['app_no'].'"';
		  if($rw['shortlisted']==2) echo 'checked';
		  echo '></td></tr>'; */
		  echo '<td><input type="radio" name="status'.$i.'[]" value=1 ';if($rw['status']==1) echo 'checked';
		  echo  '></td>
		        <td><input type="radio" name="status'.$i.'[]" value=2 ';if($rw['status']==2) echo 'checked';
				echo '></td>
				<td><input type="radio" name="status'.$i.'[]" value=0 ';if($rw['status']==0) echo 'checked';
				echo'></td>
				<td><input type="radio" name="status'.$i.'[]" value=-1 ';if($rw['status']==-1) echo 'checked';
				echo '></td></tr>';
		     $i++;
			// echo $i;
  }	   
  echo '<tr><td><input type="submit" name="submit" value="submit"></td></tr></form></table>';
}
  echo ' <a href="fullpost.php?post='.$postno.'">View Full Post</a> ';
?>
 <?php
 if(isset($_POST['submit']))
 {   $j=0;
     $i=$_GET['val'];
	 $post=$_GET['post'];
	 $q=mysqli_query($conn,"select app_no from applied where post_no =$post");
	 //$t=mysqli_num_rows($q);
	 //echo $t;
	 while($rw=mysqli_fetch_array($q))
	 {
	//echo $j;
           $c="status".$j;
	       foreach($_POST[$c] as $var)
	      {
                $q1=mysqli_query($conn,"update applied set status=$var where app_no='$rw[0]' and post_no=$post");
                if($q1)
                echo 'y';
                else
                echo 'n';					
		
	      }
	      $j++;
	 }
	 
	 $loc='postdetails.php?post='.$post;
	 header("Location:$loc");
 }
 
 
 
 ?>