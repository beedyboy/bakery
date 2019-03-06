<?php 
include 'functions/ParamLibFnc.php';
error_reporting(0);
session_start();
$_SESSION['username'] = $_POST["addusername"];
$_SESSION['password'] = $_POST["addpassword"];
$_SESSION['server'] = $_POST["server"];
$_SESSION['port'] = $_POST["port"];
$_SESSION['host'] = $_POST['server'] . ':' . $_POST['port'];
$err .= "
<html>
<head>
<link rel='stylesheet' type='text/css' href='styles/Installer.css' />
</head>
<body>
<div class='heading'>Couldn't connect to database server: " . $_SESSION['host'] . "
<div style='height:280px;'>

<br /><br /><span class='header_txt'>Possible causes are:</span>

<ul class='error_cause'>
<li>1. MySQL is not installed. Try downloading from <a href='http://dev.mysql.com/downloads/' target=_blank>MySQL Website</a></li>
<li>2. Username or Password or MySQL Configuration is incorrect</li>
<li>3. Php.ini is not properly configured. Search for MySQL in php.ini</li>
</ul>
<div style='height:55px;'>&nbsp;</div>";
if(clean_param($_REQUEST['mod'],PARAM_ALPHAMOD)=='upgrade'){
$err.="<a href='Step1.php?mod=upgrade'>";
}else {
$err.="<a href='Step1.php'>";
}
$err.="<img src='images/retry.png' border='0' /><a>

</div>
</div>
</body>
</html>
";


$dbconn = mysql_connect($_SESSION['host'],$_SESSION['username'],$_SESSION['password'])
or 
exit($err);


if(clean_param($_REQUEST['mod'],PARAM_ALPHAMOD)=='upgrade')
{
header('Location: Selectdb.php');
}
else
{
header('Location: Step2.php');
}
?>
                    