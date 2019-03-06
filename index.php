 <?php 
require "software/includes/functions.php";
include_layout_template('software/includes/','DelDirectoryFnc.php');
include_layout_template('software/includes/','ParamLibFnc.php');
 $url=validateQueryString(curPageURL());
if($url===FALSE){
 header('Location: index.php');
 }
$url="install/index.php";

if(isset($_GET['ins'])):

$install = optional_param('ins','',PARAM_ALPHAEXT);

if($install == 'comp')
{
	if (is_dir('install'))
	{
		$dir = 'install/'; // IMPORTANT: with '/' at the end
           $remove_directory = delete_directory($dir);
	}

}


endif;

if(file_exists($url))
{
header('location: install/index.php');
?>
<script>
//window.location='install/index.php';
</script>
<?php
}
require "software/classes/session.php";
require_once "software/classes/db.php";
require_once "software/classes/functions.php";
$GetSession = new Session;
$loadSystem = System::loadTbl('system'); 
$i = 0;
foreach($loadSystem as $Data):
$i++;
$companyName= $Data['companyName'];
$companyEmail= $Data['CompanyEmail'];
$companyPhoneNum= $Data['CompanyPhoneNum'];
$address= $Data['address'];
$logo= $Data['logo']; 
$version= $Data['version']; 
endforeach; 
 
 $GetSession->companyName=$companyName;
 $GetSession->companyEmail=$companyEmail;
 $GetSession->companyPhoneNum=$companyPhoneNum;
  $GetSession->logo=$logo;
 $GetSession->address=$address;
 $GetSession->version=$version;

$GetSession->setCompanyName($companyName);
$GetSession->setCompanyContact($companyEmail,$companyPhoneNum,$address);
 $GetSession->setVersion($version);

 
  
 
 


if($GetSession->loggedin== TRUE):  
beedy_goto('software/index.php');
else:
 ?>
 
<?php 
  
 require "login.php"; 

endif; 
 ?>
 
