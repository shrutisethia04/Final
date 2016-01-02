<?php

 $conn = mysqli_connect("localhost","root","","internship");
  if( $conn)
  {  //echo "connected";

  }
  else { echo "Sorry, some technical errors! Could not connect ";
         echo mysqli_connect_error();
         die(); }

?>