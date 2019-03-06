<?php 
include 'functions/ParamLibFnc.php';
error_reporting(0);
session_start();
$_SESSION['db'] = clean_param($_REQUEST["db"],PARAM_DATA);
$purgedb = clean_param($_REQUEST["purgedb"],PARAM_ALPHA); // Added variable to check for removing existing data.
 $db = $_SESSION['db'];

$dbconn = mysql_connect($_SESSION['host'],$_SESSION['username'],$_SESSION['password'])
or 
exit($err);
$sql="select count(*) from information_schema.SCHEMATA where schema_name = '".$_SESSION['db']."'" ;
$res = mysql_query($sql);

   
$dbhost = $_SESSION['host'];
   $dbusername = $_SESSION['username'];
   $dbpassword = $_SESSION['password'];
  
 try {
		$pdo = new PDO('mysql:host='.$dbhost.';dbname='.$db, $dbusername, $dbpassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
	
while ($row = mysql_fetch_row($res)) {
    $exists =  $row[0];
}
if($exists!=0)
{
    if (empty($purgedb))
    {
        header('Location: Step2.php?err=Database Exists. Enter a different name');
        exit;
    }
    else
    {
        $result = mysql_select_db($_SESSION['db']);
        if(!$result)
        {
            echo "<h2>" . mysql_error() . "</h2>\n";
            exit;
        }
 
            // Drop all tables.
	 $pdo->query("DROP DATABASE IF EXISTS $db ");
 

            if(!$delete_db)
            {
                echo 'Unable to drop ' . $_SESSION['db'] . '<br>';
            }
			
            //This begins the add portion
           $delete_table = "CREATE DATABASE IF NOT EXISTS $db";
			$result = mysql_query($delete_table);
			
        $myFile = "beedy.sql";
        executeSQL($myFile);
      
        header('Location: Step3.php');
    }
} 
else
{
    $sql="CREATE DATABASE `".$_SESSION['db']."` CHARACTER SET=utf8;";
    $result = mysql_query($sql);
    if(!$result)
    {
        echo "<h2>" . mysql_error() . "</h2>\n";
        exit;
    }
    $result = mysql_select_db($_SESSION['db']);
    if(!$result)
    {
        echo "<h2>" . mysql_error() . "</h2>\n";
        exit;
    }
     
    $myFile = "beedy.sql";
    executeSQL($myFile);
    
    mysql_close($dbconn);

    
// edited installation
    header('Location: Step3.php');
}

function executeSQL($myFile)
{	
    $sql = file_get_contents($myFile);
    $sqllines = split("\n",$sql);
    $cmd = '';
    $delim = false;
    foreach($sqllines as $l)
    {
        if(preg_match('/^\s*--/',$l) == 0)
        {
            if(preg_match('/DELIMITER \$\$/',$l) != 0)
            {
                $delim = true;
            }
            else
            {
                if(preg_match('/DELIMITER ;/',$l) != 0)
                {
                    $delim = false;
                }
                else
                {
                    if(preg_match('/END\$\$/',$l) != 0)
                    {
                        $cmd .= ' END';
                    }
                    else
                    {
                        $cmd .= ' ' . $l . "\n";
                    }
                }
                if(preg_match('/.+;/',$l) != 0 && !$delim)
                {
                    $result = mysql_query($cmd) or die(mysql_error());
                    $cmd = '';
                }
            }
        }
    }
}
  
        mysql_close($dbconn);

?>
