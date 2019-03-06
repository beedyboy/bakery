<?php 
error_reporting(0);
session_start();
echo '<script type="text/javascript">
var page=parent.location.href.replace(/.*\//,"");
if(page && page!="index.php"){
	window.location.href="index.php";
	}

</script>';
 $msg= $_REQUEST['msg'];
 $db = $_SESSION['db'];
 $dbhost = $_SESSION['host'];
   $dbusername = $_SESSION['username'];
   $dbpassword = $_SESSION['password'];
  
$myFile = "../software/classes/db.php";
$fh = fopen($myFile, 'w');

if ($fh == TRUE)
{	
	$string ='';
    $string .= "<"."?php \n";
    
    $string .= "class Database \n";
	$string .= "{ \n";
 $string .= "public".' '."$"."db; \n";
 $string .= "private static".' '."$"."dsn = 'mysql:host=$dbhost;dbname=$db'; \n";
  $string .= "private static".' '."$"."user= '".$dbusername."'; \n";
 $string .= "private static".' '."$"."pass= '".$dbpassword."'; \n";

  $string .= "public static".' '."$"."instance; \n";
 $string .= "public function".' '."__construct() \n";
 $string .= "{ \n";
   $string .= "$"."this->db = new PDO(self::$"."dsn,self::$"."user,self::$"."pass); \n" ;
   $string .= "} \n";
   $string .= "\n";
    $string .= "public static function".' '."getInstance"."() \n";
 $string .= "{ \n";
  $string .= "if"."(!isset"."(self"."::$"."instance)) \n";
 
  $string .= "{ \n";
  $string .= "$"."object= __CLASS__; \n";
  $string .= "self"."::$"."instance= new".' '."$"."object; \n";
      $string .= "} \n";
	     $string .= "return self"."::$"."instance; \n";
 $string .= "} \n";
  $string .= "} \n";
	
    $string .="?".">";

    fwrite($fh, $string);
}

fclose($fh);
echo "<html><head><link rel='stylesheet' href='css/bootstrap.css' type='text/css' /><link rel='stylesheet' type='text/css' href='styles/Installer.css'></head><body>
<div class=\"heading\">Installation Successful
<div style=\"background-image:url(images/step5.gif); background-repeat:no-repeat; background-position:50% 20px; height:270px;\">
<table border=\"0\" width=\"500\" cellspacing=\"6\" cellpadding=\"3\" align=\"center\">
      <tr>
        <td  align=\"center\" style=\"padding-top:36px; padding-bottom:16px\"> <br />Step 5 of 5</td>
      </tr>
	  <tr><td align=\"center\" style=\"padding-top:36px; padding-bottom:16px\">
	  <div><h1>".$msg."</h1></div>
	  </td></tr>
      <tr>
        <td align=\"center\"><a href='../index.php?modfunc=logout&ins=comp' target=\"_parent\"><img src='images/login.png' border=0 /></a></td>
      </tr>
 	</td>
      </tr>
    </table></div></div>
</body></html>
";

session_unset();
session_destroy();
?>
