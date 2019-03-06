<?php
 
require_once "classes/db.php";
require_once "classes/functions.php";
$conn = Database::getInstance();
date_default_timezone_set("Etc/GMT-8");
if(isset($_POST['action'])){ 
//started here 

if($_POST['action'] == "login"){
echo $feedbck = 2;
}

if($_POST['action'] == "loginss"){$feedbck = 0; $username = $_POST['username']; $password = md5($_POST['password']);
$stmt = $conn->db->prepare("SELECT * FROM user WHERE username = ? AND password = ? ");
$stmt->execute( array($username,$password) );
$member = $stmt->fetch();
if(!empty($member)){
$_SESSION['page'] = "logged";	
$_SESSION['uid'] = $member['uid'];
$_SESSION['username'] = $member['username'];
$_SESSION['level'] = $member['level'];
$feedbck = $member['level'];
if($member['level'] == 1){
$fetchInfo = $conn->db->prepare("SELECT * FROM systemAdmin WHERE adminId = ?");
$fetchInfo->execute( array($member['adminId']) );
$info = $fetchInfo->fetch();
$_SESSION['firstname'] = $info['firstName'];
$_SESSION['lastname'] = $info['lastName'];
$_SESSION['adminId'] = $info['adminId'];
$_SESSION['image'] = $info['image'];
} else if($member['level'] == 2){
$fetchInfo3 = $conn->db->prepare("SELECT * FROM hrmEmployeeData WHERE empId = ?");
$fetchInfo3->execute( array($member['empId']) );
$info3 = $fetchInfo3->fetch();  

if($existCheck = System::existOne('classTeacher', 'empId', $member['empId']) > 0):
$classTeacher = $conn->db->prepare("SELECT * FROM classTeacher WHERE empId = ?");
$classTeacher->execute( array($member['empId']) );
$classInfo = $classTeacher->fetch();  
$_SESSION['class'] = $classInfo['genStudentClassId'];
$_SESSION['classTeacher'] = TRUE;
else:
$_SESSION['classTeacher'] = FALSE;

endif;

$_SESSION['firstname'] = $info3['empFirstName'];
$_SESSION['lastname'] = $info3['empMiddleName'];
$_SESSION['empId'] = $info3['empId'];
$_SESSION['image'] = $info3['empPhoto'];
} else if($member['level'] == 3){
$fetchInfo3 = $conn->db->prepare("SELECT * FROM beedyStudentProfile WHERE stdAddNum = ?");
$fetchInfo3->execute( array($member['stdAddNum']) );
$info3 = $fetchInfo3->fetch();
$_SESSION['firstname'] = $info3['stdSurname'];
$_SESSION['lastname'] = $info3['stdFirstName'];
$_SESSION['stdAddNum'] = $info3['stdAddNum'];
$_SESSION['image'] = $info3['stdPicture'];
} else {
$_SESSION['firstname'] = $member['firstname'];
$_SESSION['lastname'] = $member['lastname'];
}
echo $feedbck;
} else {
echo $feedbck;
}	
}
if($_POST['action'] == "loginForm"){if(isset( $_SESSION['uid'] )){echo 1;} else {echo 0;}}
if($_POST['action'] == "logout"){unset($_SESSION); session_destroy();}
 
if($_POST['action'] == "updateothInc"){  echo System::updateothInc(); }
 //all ends here;
}
?>