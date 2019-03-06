<?php
 include('classes/session.php'); 

 $GetSession = new Session;
//global $GetSession; 
if(isset($GetSession->lastActivity)  && (time() - $GetSession->lastActivity > 30*60)):

//header('location: signout.php');
//
 
$out= $GetSession->logout();
 

echo 5;
	//echo "<script>location.href='../index.php';</script>";
//beedy_goto("","index.php"); 
// header('Location: ../index.php');
//echo "<script>location.href='../index.php';</script>";
 else:
 	//echo $GetSession->lastActivity;
endif;


?>


