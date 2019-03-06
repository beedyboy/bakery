<?php
 
error_reporting(0);
session_start();
session_destroy();
echo '<script type="text/javascript">
var page=parent.location.href.replace(/.*\//,"");
if(page && page!="index.php"){
	window.location.href="index.php";
	}

</script>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Untitled Document</title>
     
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
 <link rel="stylesheet" href="styles/Installer.css" type="text/css" /> </head>
    <body>
        <div class="heading">SmartShopper Installer<!--, Please remember to read the <a href="../INSTALL.txt" target="_new">INSTALL.TXT</a> file first.-->
         
            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                    <td>
	      <table style="height:270px;" border="0" cellspacing="12" cellpadding="12" align="center">
                            <tr>
                                <?php
if($_GET["upreq"] == 'true')
{
                                    echo '<td>You were redirected to this page because an upgrade is needed.<br>
     Please, proceed using the action below.</td>';
                                    echo '</tr><tr>';
    echo '<td valign="middle" align="center"><a href="Step0.1.php?mod=upgrade"><img src="images/upgrade.png" class="img-rounded" alt="Upgrade OpenSIS" width="122" height="150" border="0"/></a></td>';
   
                                }
else
{
    echo '<td valign="middle" align="center"><a href="Step1.php"><img src="images/install.png" class="img-rounded" width="122" alt="New Installation" height="150" border="0"/></a></td>';
    echo '<td valign="middle" align="center"><a href="Step0.1.php?mod=upgrade"><img src="images/upgrade.png" class="img-rounded" alt="Upgrade OpenSIS" width="122" height="150" border="0"/></a></td>';
}
                                ?>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
