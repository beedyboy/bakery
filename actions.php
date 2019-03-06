<?php 

require_once "software/classes/db.php";
require_once "software/classes/functions.php";
$conn = Database::getInstance();
date_default_timezone_set("Etc/GMT-8");
global $GetSession;
if(isset($_POST['action'])){ 
//started here 

if($_POST['action'] == "login"){
$feedbck = 0; $username = $_POST['username']; $password = $_POST['password']; /*$password = md5($_POST['login_pass'] );*/

$stmt = $conn->db->prepare("SELECT * FROM user WHERE username = ? AND password = ? ");
$stmt->execute( array($username,$password) );
$member = $stmt->fetch();
if(!empty($member)){ 

$user_id = $member['id'];
$user_name = $member['username']; 
$name = $member['name'];
 

 $GetSession->Login(TRUE, $user_name, $name, $user_id);
   $GetSession->UserPosition(TRUE,$member['position']);

   $GetSession->setLastActivity(time());

echo $feedbck = 1;
} 
else {
echo $feedbck;
}	
}

if($_POST['action'] == "systemWindow"){ echo System::systemWindow();}
 if($_POST['action'] == "activateKey"){ echo System::activateKey();}
  
 //all ends here;
}
 

?>


