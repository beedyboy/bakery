<?php 
if(!session_id()):
	session_start(); 
endif;

 if(isset($_SESSION['page']) AND $_SESSION['page']!= "logged"): 
  beedy_goto('../log/logout.php');
  endif;
 ?>
 