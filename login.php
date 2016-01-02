<?php
include "intern_db.php" ;
  if(!empty($_GET['p']) && !empty($_GET['e']))
   {    $uname= $_GET['e'] ;
        $q1=" SELECT email,password from `non_str` WHERE email='$uname' " ;
        if ( $q2= mysqli_query($conn,$q1) )
        {
           if($row=mysqli_fetch_array($q2,MYSQLI_BOTH))
             {
               if($row['password']== $_GET['p'])
                {
                  session_start();
                  $_SESSION['role']='nons';
                  $_SESSION['uname']=$uname;
                   session_write_close();
                   echo 'login successfull!!' ;
                }
                else echo 'pwd/uname incorrect';
             }
           else {
                $q3= "INSERT INTO `non_str` (email,password) VALUES ('$_GET[e]','$_GET[p]')";
                if(mysqli_query($conn,$q3)) {
                  echo "Account created !!";
                  session_start();
                  $_SESSION['role']='nons';
                  $_SESSION['uname']=$uname;
                   session_write_close();
                }
                else echo "Error..!!" ;
                }
        }
        else echo 'Error'.mysqli_error($conn);
   }

?>