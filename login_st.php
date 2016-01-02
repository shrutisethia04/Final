<?php
include "intern_db.php" ;

  if(!empty($_GET['n']) && !empty($_GET['id']))
   {    //echo 'dfbg';
        //search if email already exists ..!!
        $uname= $_GET['id'] ;
        $q1=" SELECT name,str_id from `applicant` WHERE str_id='$uname' " ;
        if ( $q2= mysqli_query($conn,$q1) )
        {
           if($row=mysqli_fetch_array($q2,MYSQLI_BOTH))
             {
               if($row['name']== $_GET['n'])
                { echo 'login successfull!!' ;
                  session_start();
                  $_SESSION['role']='str';
                  $_SESSION['uname']=$uname;
                }
                else echo 'Incorrect details';
             }

        }
        else echo 'Error'.mysqli_error($conn);
   }

?>