<?php
include 'c.php';
$post=$_GET['q'];
$q=mysqli_query($conn,"Select intern_des,app_deadline,addition_details from company_post where post_no=$post ");
$rw=mysqli_fetch_array($q);
echo $rw['intern_des'];
//echo '<input type="date" name="d" value="'.$rw['app_deadline'].'">';

?>