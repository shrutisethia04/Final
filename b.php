<?php

 if(isset($_POST['submit']))
  {
	$skill=$_POST['skill'];
	$trgtdir = "images/";
        $name = $_FILES["poster"]["name"];
        $tmp_name = $_FILES["poster"]["tmp_name"];
        $size= $_FILES["poster"]["size"];
        $extension = strtolower(substr($name, strpos($name,'.')+1) );
		$upload_status =1;
		echo $name;
}
?>
<form method=post action="b.php" enctype="multipart/form-data"> 
	<input type="file" name="poster" required>
	<input type="text" name="skill" >
	<input type="submit" name="submit" value="submit" >
  </form>	