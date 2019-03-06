<?php include('classes/session.php'); ?>
 
 <?php
 $GetSession = new Session;
  $out= $GetSession->logout();
if($out)
{
//beedy_goto("","index.php"); 
 
echo "<script>location.href='../index.php';</script>";
}
?>