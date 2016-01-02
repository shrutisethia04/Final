<?php
include 'c.php';
session_start();

if ($_SESSION['role']=='comp'){
      session_destroy();
	  header("Location:slogin.php");
      exit();}
else {
      if ($_SESSION['role']=='nons' || $_SESSION['role']=='str') {
	  session_destroy();
      header("Location:login1.php");
      exit(); }
      }
?>