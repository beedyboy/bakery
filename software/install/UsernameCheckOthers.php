<?php 
error_reporting(0);
session_start();
$_SESSION['admin_name'] = $_POST['username'];
$_SESSION['admin_pwd'] = md5($_POST['password']);
$dbconn = new mysqli($_SESSION['host_mod'],$_SESSION['username'],$_SESSION['password'],$_SESSION['db']) ;
if(isset($_REQUEST['username']) && $_REQUEST['username']!='')
        {
           $result_username= $dbconn->fetch_assoc($dbconn->query('SELECT COUNT(1) as USERNAME_EX FROM systemAdmin WHERE username=\''.$_REQUEST['username'].'\''));
        }
        if($result_username['USERNAME_EX']==0)
        {
            echo '0';
        }
 else {
     echo '1';
 }
        ?>