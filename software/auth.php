<?php
 
require_once "system.php"; 
//$GetSession = new Session;
global $GetSession;

if($GetSession->loggedin== FALSE):  
header('location: ../index.php');
  
endif; 
 ?>
 