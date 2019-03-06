<?php 
error_reporting(0);
session_start();
echo '<script type="text/javascript">
var page=parent.location.href.replace(/.*\//,"");
if(page && page!="index.php"){
	window.location.href="index.php";
	}

</script>';
echo "<html><head><link rel='stylesheet' href='css/bootstrap.css' type='text/css' />
<link rel='stylesheet' type='text/css' href='styles/Installer.css'></head><body>";
  
$display_text='';
 	
  if($_SESSION['mod']!='upgrade'){
		$display_text="A system has been created in the name of: ".$_SESSION['beedyCompanyName'].".
You need to follow the instructions in the administrator manual for setting up the software properly.";
		  
 
echo "<div style=\"background-image:url(images/step5.gif); background-repeat:no-repeat; background-position:50% 20px; height:270px;\">
<table border=\"0\" width=\"500\" cellspacing=\"6\" cellpadding=\"3\" align=\"center\">
      <tr>
        <td  align=\"center\" style=\"padding-top:28px; padding-bottom:10px\"><br />Step 5 of 5</td>
      </tr>
	  <tr><td>
	  <div><h4>".$display_text."</h4></div>
	  </td></tr>
      <tr><td>
	 <h3>Continue as</h3>
	  </td></tr>
      <tr>
    <td valign=\"middle\" align=\"center\"><a href=\"completed.php?msg=Trial Mode\"><img src='images/freeT.jpeg' width=\"122\" alt=\"Trial Version Mode\" height=\"150\" border=\"0\" /></a></td> 
  <td valign=\"middle\" align=\"center\"><a href=\"generateLicense.php\"><img src=\"images/key.jpeg\" alt=\"Purchase Key\" width=\"122\" height=\"150\" border=\"0\"/></a></td> 

      </tr>
 	</td>
      </tr>
    </table></div></div>";
}
else
{
echo "<div class=\"heading\">System Successfully Upgraded
<div style=\"background-image:url(images/step4.gif); background-repeat:no-repeat; background-position:50% 20px; height:270px;\">
<table border=\"0\" cellspacing=\"6\" cellpadding=\"3\" align=\"center\">
      <tr>
        <td  align=\"center\" style=\"padding-top:36px; padding-bottom:16px\">Step 3 of 3</td>
      </tr> 
      <tr>
        <td align=\"center\"><a href='../index.php?modfunc=logout'><img src='images/login.png' border=0 /></a></td>
      </tr>
 	</td>
      </tr>
    </table></div></div>";
}

 
echo "</body></html>";
?>
 
