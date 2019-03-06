 <body>
<?php
include_once('classes/functions.php');
include_once('classes/session.php');
global $GetSession;
$loadSystem = System::loadTbl('system'); 
$beedySystem = System::loadTbl('beedySystem'); 
$i = 0;
foreach($loadSystem as $Data):
$i++;
$companyName= $Data['companyName'];
$address= $Data['address'];
$logo= $Data['logo']; 
$version= $Data['version']; 
endforeach; 
 
 $GetSession->companyName=$companyName;
 $GetSession->logo=$logo;
 $GetSession->address=$address;
 $GetSession->version=$version;

 
define('_COMPANY_NAME_', $companyName);
define('_COMPANY_ADDRESS_', $address);
define('_COMPANY_LOGO', $logo);
define('_CURRENT_VERSION_', $version);

 
?>
 
<?php 
   
$i = 0;
foreach($beedySystem as $Beedy):
$i++;
$active= $Beedy['active'];
$dateTo= $Beedy['dateTo'];
$dateFrom= $Beedy['dateFrom'];
$code1= $Beedy['code1'];
$code2= $Beedy['code2'];
$codekey= $Beedy['codekey'];
endforeach;
 
$schArray['dateFrom'] = $dateFrom;
$schArray['dateTo'] = $dateTo;
$schArray['code1'] = $code1;
$schArray['code2'] = $code2;
$schArray['codekey'] = $codekey;
$schArray['active'] = $active;




$now= time();
$today=date('Y-m-d'); 
 
 $dateFrom = new DateTime($schArray['dateFrom']);
 $dateTo = new DateTime($schArray['dateTo']);
 $td = new DateTime($today);
 $bdLast= $td->diff($dateTo)->format("%R%a");
 
  						

  
	 
	  //$dateDiff=  $dateTo- $dateFrom;
//$bdLast = strtotime($schArray['dateTo']) - strtotime($today);
	//   $date= floor($dateDiff/(60*60*24));
 //$bdLast= floor($bdLast/(60*60*24));


define('dateFrom',$schArray['dateFrom']);
define('dateTo', $schArray['dateTo']);
define('code1', $schArray['code1']);
define('code2', $schArray['code2']);
define('codekey', $schArray['codekey']);
define('active', $schArray['active']);
//define('lastDay', $date);
//define('dateDiff', $date);
define('today', $today);
define('bdLast', $bdLast);


	?>