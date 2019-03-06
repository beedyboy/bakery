<?php 
error_reporting(0);
session_start();
include 'functions/ParamLibFnc.php';
 
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
	
	


if(isset($_REQUEST['beedyCompanyName']) && $_REQUEST['beedyCompanyName']!='')
    
$_SESSION['Company_installed']='user';

$beedyCompanyName = $_REQUEST['beedyCompanyName'];
//$beedyCompanyMotto = $_REQUEST['beedyCompanyMotto'];
$address = $_REQUEST['beedyCompanyAddress'];
$beedyCompanyEmail = $_REQUEST['beedyCompanyEmail'];
$beedyCompanyPhoneNum = $_REQUEST['beedyCompanyPhoneNum'];
$version = 'Vs-W2.0.0.1';

$_SESSION['beedyCompanyName'] = $_REQUEST['beedyCompanyName']; $query = $link->prepare("INSERT INTO system (CompanyName, address, CompanyEmail, CompanyPhoneNum, version) 
 VALUES (:CompanyName, :address, :CompanyEmail, :CompanyPhoneNum, :version)"); 
		
	 $query->bindParam(':CompanyName', $beedyCompanyName, PDO::PARAM_STR);
	$query->bindParam(':address', $address, PDO::PARAM_STR);
	 $query->bindParam(':CompanyEmail', $beedyCompanyEmail, PDO::PARAM_STR); 
	 $query->bindParam(':CompanyPhoneNum', $beedyCompanyPhoneNum, PDO::PARAM_STR); 
	  $query->bindParam(':version', $version, PDO::PARAM_STR); 
	  
	$query->execute();
	$adminId = $link->lastInsertId();
	  
		
/*		
 $file = $_FILES ['photo'];
$name1 = $file ['name'];
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name']; 

if($name1!="")
{
if(move_uploaded_file ($tmppath, '../CompanyData/'.$name1))//image is a folder in which you will save image
{
$im = "CompanyData/".$name1;

$pic="update beedyCompanydata SET beedyCompanyLogo='$im' "; 
$res = mysql_query($pic);

}

}
 */
  

echo '<script type="text/javascript">window.location = "Step4.php"</script>';

 
?>
