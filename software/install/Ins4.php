<?php 
error_reporting(0);
session_start();
include_once('../licenceFunction.php');
$_SESSION['admin_name'] = $_POST['auname'];
$_SESSION['admin_pwd'] = md5($_POST['password']);
 $db = $_SESSION['db'];  
 
$dbhost = $_SESSION['host'];
   $dbusername = $_SESSION['username'];
   $dbpassword = $_SESSION['password'];
   
 
define('_HOST_NAME_', $dbhost);
	define('_USER_NAME_', $dbusername);
	define('_DB_PASSWORD', $dbpassword);
	define('_DATABASE_NAME_', $db);
	
	//PDO Database Connection
	try {
		$link = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
	
	 
		 	
	 $firstName= $_REQUEST['firstName'];
	$lastName= "Admin";
	$adminUsername= $_REQUEST['username'];
	$adminPassword=$_REQUEST['password'];
	//$adminPassword= md5($_REQUEST['password']);
		 	 $adminLevel=1;

 
	 $query = $link->prepare("INSERT INTO user (name, position, username, password)
 VALUES (:firstName, :position, :username, :password)"); 
		
	 $query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
	$query->bindParam(':position', $lastName, PDO::PARAM_STR);
	 $query->bindParam(':username', $adminUsername, PDO::PARAM_STR); 
	  $query->bindParam(':password', $adminPassword, PDO::PARAM_STR); 
	  
	$query->execute();
	$adminId = $link->lastInsertId();
	  
	   
  $A=0;  $B=0; $C=4; $D=0; 
	  
	  $charFormat =NewGuid(); 
 
	$id = 1;
 $c1 = substr_replace($charFormat,$A,0,1); 
 
 $c2 = substr_replace($c1,$B,5,1); 
 
  $c3 = substr_replace($c2,$C,10,1);  
  
 $c4 = substr_replace($c3,$D,15,1);  
 
 $Guid= NewGuidR($c4); 
 $mode ="Trial";
$b=beedy($Guid); //decode
  $foruser = NewGuidR(beedy($b));
  $system=NewGuidR(beedy($foruser)); //to be confirmed


$updateClass = $link->prepare("INSERT INTO systemwindow (code1, code2, codekey, active) VALUES (:code1, :code2, :codekey, :active)"); 
$updateClass->bindParam(':code1', $foruser, PDO::PARAM_STR);  
$updateClass->bindParam(':code2', $system, PDO::PARAM_STR);  
$updateClass->bindParam(':codekey', $Guid, PDO::PARAM_STR);  
$updateClass->bindParam(':active', $mode, PDO::PARAM_STR);  
$updateClass->execute();
 $dateFrom=date('Y-m-d');
				
				$days=40;
 	$dateTo= date('Y-m-d', strtotime($dateFrom. '+'. $days.' days'));
				
				$active='Trial';
				
$school = $link->prepare("INSERT INTO beedySystem (code1, code2, codekey, dateFrom, dateTo, active)
 VALUES (:code1, :code2, :codekey, :dateFrom, :dateTo, :active)"); 
		
	 $school->bindParam(':code1', $foruser, PDO::PARAM_STR);
	$school->bindParam(':code2', $system, PDO::PARAM_STR);
	$school->bindParam(':codekey', $Guid, PDO::PARAM_STR);
	 $school->bindParam(':dateFrom', $dateFrom, PDO::PARAM_STR); 
	  $school->bindParam(':dateTo', $dateTo, PDO::PARAM_STR); 
	   $school->bindParam(':active', $active, PDO::PARAM_STR); 
	
	if($school->execute()):
	 
header('Location: Step5.php');
endif;
?>
