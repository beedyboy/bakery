<?php 
error_reporting(0);
session_start();
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

<script type="text/javascript" src="js/Datetimepicker.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>

</head>
<body>
<div class="heading">Database created
<div style="background-image:url(images/step3_new.gif); background-repeat:no-repeat; background-position:49% 15px; height:500px;">
<form name='step3' id='step3' method="post" enctype="multipart/form-data" action="Ins3.php">
<table border="0" cellspacing="2" cellpadding="3" align="center">
<tr>
<td  align="center" style="padding-top:28px; padding-bottom:5px"><br />Step 3 of 5</td>
</tr>
<tr>
<td align="center" valign="top" style="padding-top: 10px;">
<table width="400" border="0" cellpadding="0" align="center" cellspacing="0" id="table1">
<tr>
<td>
<div>All fields are important.</div>
<div style="height:3px;"></div>
<div>
<table width="100%" border="0" cellspacing="2" cellpadding="0" align="center">
<tr align="left">
<td colspan="3" align="center" valign="top"><div id="error">&nbsp;</div></td>
</tr>
<tr>
<td align="left">Company Name </td><td></td><td>
<input type="text" class="form-control" name="beedyCompanyName" id="beedyCompanyName" placeholder="Enter Company Name" required></td>
</tr>



<tr>
<td align="left">Company Address</td><td> </td><td><input type="text" class="form-control" name="beedyCompanyAddress" id="beedyCompanyAddress" placeholder="Enter Company Address" required>
</td>
</tr> 

<tr>
<td align="left">Email</td><td></td><td> <input type="email" class="form-control" name="beedyCompanyEmail" id="beedyCompanyEmail" placeholder="Enter Company Email" required>
</td>
</tr>
<tr>
<td align="left">Phone Number</td><td> </td><td><input type="text" class="form-control" name="beedyCompanyPhoneNum" id="beedyCompanyPhoneNum" placeholder="Enter Company Phone Number" required>
</td>
</tr> 
</tr>
 
<tr>
<td  align="right" colspan='3'><input type="submit" value="Save & Next" class="btn btn-info"  name="btnsyear" onclick="return check();" /></td>
</tr>
</table>
</div>
  
</td>
</tr>
</table>
<script language="JavaScript" type="text/javascript">
function validatedate(inputText)
{
var dateformat = /^(0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])[\/\-]\d{4}$/;

if (inputText.match(dateformat))
{

var opera1 = inputText.split('/');
var opera2 = inputText.split('-');
lopera1 = opera1.length;
lopera2 = opera2.length;
// Extract the string into month, date and year  
if (lopera1 > 1)
{
var pdate = inputText.split('/');
}
else if (lopera2 > 1)
{
var pdate = inputText.split('-');
}
var mm = parseInt(pdate[0]);
var dd = parseInt(pdate[1]);
var yy = parseInt(pdate[2]);
// Create list of days of a month [assume there is no leap year by default]  
var ListofDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
if (mm == 1 || mm > 2)
{
if (dd > ListofDays[mm - 1])
{

return false;
}
}
if (mm == 2)
{
var lyear = false;
if ((!(yy % 4) && yy % 100) || !(yy % 400))
{
lyear = true;
}
if ((lyear == false) && (dd >= 29))
{

return false;
}
if ((lyear == true) && (dd > 29))
{

return false;
}
}
}
else
{

return false;
}
}
function check()
{
var sample_data = document.getElementById('sample_data');
var sname = document.getElementById("sname");
var beg_date = document.getElementById("beg_date");
var end_date = document.getElementById("end_date");
if (sname.value != '' && beg_date.value != '')
{



if (sname.value == '')
{
document.getElementById("error").innerHTML = '<font style="color:red"><b>Company name cannot be blank.</b></font>';

sname.focus();
return false;
}
else
{
if (sname.value.length > 50)
{
document.getElementById("error").innerHTML = '<font style="color:red"><b>Maximum length of Company name is 50</b></font>';

sname.focus();
return false;
}
}
if (beg_date.value == '')
{
document.getElementById("error").innerHTML = '<font style="color:red"><b>Begining date cannot be blank.</b></font>';

beg_date.focus();
return false;
}
else
{
if (false == validatedate(beg_date.value))
{
document.getElementById("error").innerHTML = '<font style="color:red"><b>Begining date format is wrong.</b></font>';

beg_date.focus();
return false;
}
}
if (end_date.value == '')
{
document.getElementById("error").innerHTML = '<font style="color:red"><b>Ending date cannot be blank.</b></font>';

end_date.focus();
return false;
}
else
{
if (false == validatedate(end_date.value))
{
document.getElementById("error").innerHTML = '<font style="color:red"><b>Ending date format is wrong.</b></font>';

beg_date.focus();
return false;
}
}
}
if (sample_data.checked == false && sname.value == '')
{
document.getElementById("error").innerHTML = '<font style="color:red"><b>Please Enter Company name with Begining and Ending date or check sample data. </b></font>';
sname.focus();
return false;
}

}


function blankValidation() {
var Company_name = $('sname');
var beg_date = $('beg_date');
var end_date = $('end_date');
var sample_data = $('sample_data');


var bd = beg_date.value.split("/");
var ed = end_date.value.split("/");





if ((Company_name.value != '' && beg_date.value != '' && end_date.value != '') || sample_data.checked == true) {
if (Company_name.value != '' || beg_date.value != '' || end_date.value != '') {
if (!(Company_name.value != '' && beg_date.value != '' && end_date.value != '')) {
document.getElementById("error").innerHTML = '<font style="color:red"><b>Please provide required info.</b></font>';

return false;
}

}
bd[0] = parseInt(bd[0]);
bd[1] = parseInt(bd[1]);
bd[2] = parseInt(bd[2]);
ed[0] = parseInt(ed[0]);
ed[1] = parseInt(ed[1]);
ed[2] = parseInt(ed[2]);

if (bd[2] > ed[2]) {
document.getElementById("error").innerHTML = '<font style="color:red"><b>End date must be greater than begin date.</b></font>';

return false;
} else if (bd[2] < ed[2]) {
return true;

}
else if (bd[2] == ed[2] && bd[0] > ed[0]) {
document.getElementById("error").innerHTML = '<font style="color:red"><b>End date must be greater than begin date.</b></font>';

return false;

} else if (bd[0] < ed[0]) {

return true;
}
else if (bd[0] == ed[0] && bd[1] > ed[1]) {
document.getElementById("error").innerHTML = '<font style="color:red"><b>End date must be greater than begin date.</b></font>';

return false;

} else if (bd[1] <= ed[1]) {
return true;
}


return true;
}
else
{
document.getElementById("error").innerHTML = '<font style="color:red"><b>Please provide required info.</b></font>';

return false;
}


}

var frmvalidator = new Validator("step3");

frmvalidator.setAddnlValidationFunction("blankValidation");
</script>
</td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>
