<?php 
error_reporting(0);
session_start();
include_once('../licenceFunction.php');	
 
$dbhost = $_SESSION['host'];
   $dbusername = $_SESSION['username'];
  $dbpassword = $_SESSION['password'];
 $db = $_SESSION['db']; 
try {
		$link = new PDO('mysql:host='.$dbhost.';dbname='.$db, $dbusername, $dbpassword);
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
	

$Guid = NewGuid($_REQUEST['lYear']);
 
$b= beedy($Guid);
  $foruser =  NewGuidR( beedy($b));
 
  $c2= NewGuidR( beedy($foruser));
		$dateFrom=date('Y-m-d');
				
				$days=40;
 	$dateTo= date('Y-m-d', strtotime($dateFrom. '+'. $days.' days'));
				
$active='Try';
$school=$link->prepare("UPDATE beedySchool SET code1=:code1, code2=:code2, codekey=:codekey, dateFrom=:dateFrom, dateTo=:dateTo, active=:active");
 	
	 $school->bindParam(':code1', $foruser, PDO::PARAM_STR);
	$school->bindParam(':code2', $c2, PDO::PARAM_STR);
	$school->bindParam(':codekey', $Guid, PDO::PARAM_STR);
	 $school->bindParam(':dateFrom', $dateFrom, PDO::PARAM_STR); 
	  $school->bindParam(':dateTo', $dateTo, PDO::PARAM_STR); 
	   $school->bindParam(':active', $active, PDO::PARAM_STR); 

if($school->execute()):
echo $Guid;

endif;

?>