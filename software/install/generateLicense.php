<?php 
error_reporting(0);
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
<link rel='stylesheet' href='css/bootstrap.css' type='text/css' />
<link rel="stylesheet" href="styles/Installer.css" type="text/css" />
<script type="text/javascript" src="js/Validator.js"></script>

<script src="../js/jquery.min.js"></script>	
<script src="../js/jquery.js"></script>
<style>

fieldset {
	position: relative;
	  font-family:Georgia, "Times New Roman", Times, serif;
	font-weight:bold;
	 
	border:3px solid #005581;
	border-radius:18px 18px 0 0;
	 }
</style>
</head>
<body>
<div class="heading">Licensing Window
<div style=" background-repeat:no-repeat; background-position:49% 15px; height:270px;">
    
    <table border="0" cellspacing="3" cellpadding="3" align="center">
            <tr>
        <td align="left" valign="top">
		   <form class="submitForm" role="form" action="#">
				<fieldset><legend>Activation Key criteria</legend>
			<div class="row">
<div class="col-md-12">
<input type="text" id="lYear" name="lYear" class="form-control" placeholder="Enter year" required />
</div>

	<div class="col-md-offset-8 col-md-4">
	<button type="button" id="refresh" class="btn btn-xs btn-success searchStd" title="Click to Search">
	<i class="icon-search icon-small"></i>&nbsp;Get Key</button> 
	</div> 
	</div> 
	 </fieldset>
	 </form>
	 
	<div class="row">
	<div class="col-md-12">
			<div class="alert hide" id="criteria">  </div> 
	</div> 
	</div> 
	
		 <form name='step4' id='step4' method="post" action="verifyKey.php">
     <fieldset><legend>Verify License Key</legend>
		<table width="100%" border="0" cellpadding="4" cellspacing="0" id="table1">
              <tr>
       
              <td colspan="2">Insert Key </td>
			  </tr>
			  <tr>
                     <td colspan="2" height="40" valign="top">
			  <input name="key1" id="key1" type="text" size="4" required >-
			  <input name="key2" id="key2" type="text"  size="4" required />-
			  <input name="key3" id="key3" type="text"  size="4" required />-
			  <input name="key4" id="key4" type="text" size="4"  required /></td>
            </tr>
               <tr>
              <td></td>
              <td align="center"><input type="button"  class="btn btn-info verify"  title="Click to Activate" value="Activate"  id="verify" /></td>
               </tr>
          </table> 
	 </fieldset>
	 </form>	
	 
	</td>
        <script type="text/javascript">
$(document).ready( function() {
$('.searchStd').click( function() { 
  
 var lYear = $('#lYear').val(); 
if(lYear==""){
	alert("Enter number of years");
	$('#lYear').focus();
}
else
{
$.ajax({

type: "POST",
url: "getKey.php",
data: ({lYear: lYear}),
cache: false, 
success: function(result){ 
$("#criteria").empty();
	$("#criteria").append(result);
	$("#criteria").removeClass('hide').addClass('alert-danger');
} 
}); 
 
 }
});	 
$('.verify').click( function() { 
  
 var key1 = $('#key1').val(); 
var key2 = $('#key2').val(); 
var key3 = $('#key3').val(); 
var key4 = $('#key4').val(); 
if(key1==""){
	alert("A field is empty");
	$('#key1').focus();
}
else if(key2==""){
	alert("A field is empty");
	$('#key2').focus();
}
else if(key3==""){
	alert("A field is empty");
	$('#key3').focus();
}
else if(key4==""){
	alert("A field is empty");
	$('#key4').focus();
}
else
{
$.ajax({

type: "POST",
url: "verifyKey.php",
data: ({key1: key1,key2: key2,key3: key3,key4: key4}),
cache: false, 
success: function(result){ 

if(result==1)
{ 
 location.href='completed.php?msg=License Activated';
 }
 else
{ 
alert("Invalid Key");
}
} 
}); 
 
 }
});	 
 });		
 	
</script>
		</tr>
    </table>
 
</div>
</div>
</body>
</html>
