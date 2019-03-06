<?php
include 'DBBackup.class.php';
$db = new DBBackup(array(
	'driver' => 'mysql',
	'host' => '127.0.0.1',
	'user' => 'root',
	'password' => '',
	'database' => 'pos'
));
$backup = $db->backup();
if(!$backup['error']){
	// If there isn't errors, show the content
	// The backup will be at $var['msg']
	// You can do everything you want to. Like save in a file.
//  $fp = fopen('file.sql', 'a+');fwrite($fp, $backup['msg']);fclose($fp);
//header("Content-type: application/pdf");
//header("Content-Disposition: attachment; filename='file.sql");

 
$fp = fopen('file.sql', 'w');fwrite($fp, $backup['msg']);fclose($fp);

} else {
	echo 'An error has ocurred.';
}


	

//
 
//exit;

?>