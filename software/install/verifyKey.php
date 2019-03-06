<?php 
error_reporting(0);
session_start();
include_once('../licenceFunction.php'); 
  $db = $_SESSION['db']; 
 $userProvide = $_REQUEST['key1'].$_REQUEST['key2'].$_REQUEST['key3'].$_REQUEST['key4'];
 //$userProvide = "UVRNME9TMUJSRE0z";
  $rear = NewGuidR($userProvide);
$dbconn = mysql_connect($_SESSION['host'],$_SESSION['username'],$_SESSION['password']);
mysql_select_db($db);


$dbhost = $_SESSION['host'];
   $dbusername = $_SESSION['username'];
   $dbpassword = $_SESSION['password'];
   
try {
		$link = new PDO('mysql:host='.$dbhost.';dbname='.$db, $dbusername, $dbpassword);
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
	 
 
	$result=@mysql_query("SELECT * from beedySchool");
   $bal=@mysql_num_rows($result);
   if($row = mysql_fetch_array($result))
	
	{
			$member = mysql_fetch_assoc($result);
	$code1 = $row['code1'];
	 $code2 = $row['code2'];
	 $codekey = $row['codekey'];
	 
	   $keycode = charFormat($code1);
	 }
mysql_close($dbconn);

 
$b= beedy($codekey);
  $foruser =  NewGuidR(beedy($b));
 
  $c2= NewGuidR( beedy($foruser));
				
			 if($userProvide==$keycode):
			  
			 if($rear === $foruser)
			 {
			
 
$fluff = substr($codekey, 10, 1);          // $fluff is "lint"
 $days=$fluff * 365;
		$dateFrom=date('Y-m-d');
				
				$active = "active";
 	$dateTo= date('Y-m-d', strtotime($dateFrom. '+'. $days.' days'));
			
$school=$link->prepare("update beedySchool SET dateFrom=:dateFrom, dateTo=:dateTo, active=:active");
 	 
	 $school->bindParam(':dateFrom', $dateFrom, PDO::PARAM_STR); 
	  $school->bindParam(':dateTo', $dateTo, PDO::PARAM_STR); 
	   $school->bindParam(':active', $active, PDO::PARAM_STR); 

if($school->execute()):
echo 1;
  // header('Location: completed.php?msg=License Activated');
   
   endif;
			 }
			
else
echo 0;
			endif;

			 ?>
