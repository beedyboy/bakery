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
</head>
<body>
<div class="heading">Your Company has been created
<div style="background-image:url(images/step4_new.gif); background-repeat:no-repeat; background-position:49% 15px; height:270px;">
    <form name='step4' id='step4' method="post"  enctype="multipart/form-data" action="Ins4.php">
        <input type="hidden" id="auname_flag" value="2"/>
    <table border="0" cellspacing="3" cellpadding="3" align="center">
      <tr>
        <td  align="center" style="padding-top:28px; padding-bottom:16px"><br />Step 4 of 5</td>
      </tr>
      <tr align="center">
                <td colspan="2" align="center" valign="top"><div id="error">&nbsp;</div></td>
      </tr>
      <tr>
        <td align="center"><strong>Please create Admin Username and Password:</strong></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellpadding="4" cellspacing="0" id="table1">
            <tr>
              <td width="65">Full Name:</td>
              <td width="140"><input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter First Name" required>
	</td>
              <td width="100">Username:</td>
              <td>
			  <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" onblur="check_username_install(this.value);" required /></td>
            <td><div id="ucheck" style="font-weight:bold;"></div></td>
            </tr>
             
              <td>Password:</td>
              <td>	<input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required autocomplete="off" onkeyup="passwordStrength(this.value);" /></td>
          <td>Confirm Password:</td>
              <td><input type="password" class="form-control" id="capassword" name="capassword" size="20" tabindex="6" /></td>
             </tr>
            <tr>
              <td> </td>
              <td> </td>
               </tr>
            <tr>
              <td></td>
              <td align="center"><input type="submit"  class="btn btn-info"  title="Click to Save" value="Save & Next"  class="btn_wide" name="btninsert" onclick="return pass_check();" /></td>
              <td>Password Strength:</td><td> <div id="passwordStrength" style="font-weight:bold;"></div></td>
            </tr>
          </table>
          <script language="JavaScript" type="text/javascript">
			
			function CheckPasswords()
			{
				  var frm = document.forms["step4"];
				  if(frm.password.value != frm.capassword.value)
					{
						alert('The Password and Confirm Password does not match!');
						frm.capassword.focus();
						return false;
					  }
					  else
					  {
						return true;
					  }
			}
			
			
			

			
function passwordStrength(password)
{
    document.getElementById("passwordStrength").style.display = "none";

        var desc = new Array();

        desc[0] = "Very Weak";

        desc[1] = "Weak";

        desc[2] = "Good";

        desc[3] = "Strong";

        desc[4] = "Strongest";


        //if password bigger than 7 give 1 point

        if (password.length > 0) 
        {   
            document.getElementById("passwordStrength").style.display = "block" ;
            document.getElementById("passwordStrength").style.color = "#ff0000" ;
            document.getElementById("passwordStrength").innerHTML = desc[0] ;
            
            
        }


        //if password has at least one number give 1 point

        if (password.match(/\d+/) && password.length > 5) 
        {
            document.getElementById("passwordStrength").style.display = "block" ;
            document.getElementById("passwordStrength").style.color = "#ff0000" ;
            document.getElementById("passwordStrength").innerHTML = desc[1] ;
        }



        //if password has at least one special caracther give 1 point

        if (password.match(/\d+/) && password.length > 7 && password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )
        {
            document.getElementById("passwordStrength").style.display = "block" ;
            document.getElementById("passwordStrength").style.color = "#8ed087" ;
            document.getElementById("passwordStrength").innerHTML = desc[2] ;
        }

        
        //if password has both lower and uppercase characters give 1 point      

        if (password.match(/\d+/) && password.length > 10 && password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) && ( password.match(/[A-Z]/) ) ) 
        {
            document.getElementById("passwordStrength").style.display = "block" ;
            document.getElementById("passwordStrength").style.color = "#84b756" ;
            document.getElementById("passwordStrength").innerHTML = desc[3] ;
        }


        //if password bigger than 12 give another 1 point

        if (password.match(/\d+/) &&  password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) && ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) && password.length > 12)
        {
            document.getElementById("passwordStrength").style.display = "block" ;
            document.getElementById("passwordStrength").style.color = "#43820b" ;
            document.getElementById("passwordStrength").innerHTML = desc[4] ;
        }

}

function pass_check()
{
    var fname=document.getElementById("firstName");
    var lname=document.getElementById("lastName"); 
    var auname=document.getElementById("username");
    var apassword=document.getElementById("password");
    var capassword=document.getElementById("capassword");
    var auname_flag=document.getElementById("auname_flag");
    
    if(fname.value=='')
    {
        document.getElementById("error").innerHTML='<font style="color:red"><b>First name cannot be blank.</b></font>';

        fname.focus();
        return false;
    }
    else
    {
        if(fname.value.length > 50)
    {

        document.getElementById('error').innerHTML="<b><font color=red>Max length for First name is 50 characters.</font></b>";
        fname.focus();
        return false;
    }
    }
  if(lname.value=='')
    {
        document.getElementById("error").innerHTML='<font style="color:red"><b>Last name cannot be blank.</b></font>';

        lname.focus();
        return false;
    }
  else
  {
    if(lname.value.length > 50)
    {
        document.getElementById('error').innerHTML="<b><font color=red>Max length for Last name is 50 characters.</font></b>";
        lname.focus();
        return false;
    }
  }
  
    if(auname.value.trim()=='')
    {
        document.getElementById("error").innerHTML='<font style="color:red"><b>Administrative username cannot be blank.</b></font>';

        auname.focus();
        return false;
    }
    else
    {
        if(auname_flag.value==1)
        {
            auname.focus();
            return false;
        }
        else
        {
            if(auname.value.length > 50)
            {
            document.getElementById('error').innerHTML="<b><font color=red>Max length for Administrative username is 50 characters.</font></b>";
            auname.focus();
            return false;
            }
        }
    }
    if(apassword.value.trim()=='')
    {
        document.getElementById("error").innerHTML='<font style="color:red"><b>Administrative password cannot be blank.</b></font>';

        auname.focus();
        return false;
    }
    
   if(apassword.value==capassword.value)
    {
        if(apassword.value.length < 7 || (apassword.value.length > 7 && !apassword.value.match((/\d+/))) || (apassword.value.length > 7 && !apassword.value.match((/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))
        {
            document.getElementById("error").innerHTML='<font style="color:red"><b>Password should be minimum 8 characters with atleast one number and one special character.</b></font>';

            return false;
        }
        
        return true;
    }
    else
    {
        document.getElementById("error").innerHTML='<font style="color:red"><b>Confirm password mismatch.</b></font>';

        capassword.focus();
        return false;
    }
    
   
    return true;
}
function check_username_install(username)
{
  if(username!='' && username.toLowerCase()!='os4ed')  
      ajax_call('UsernameCheckOthers.php?username='+username, check_username_install_callback, check_username_install_error);
  if(username.toLowerCase()=='os4ed')  
  {
    document.getElementById("auname_flag").value=2;
    document.getElementById('error').style.color = '#008800';
    document.getElementById('error').innerHTML = 'Username available';
  }
}
 function check_username_install_callback (data) {
     

    var obj = document.getElementById('error');
    if(data=='1')
    {
        obj.style.color = '#ff0000';
	obj.innerHTML = 'Username already taken';
        document.getElementById('auname_flag').value='1';
    }
        
    if(data=='0')
    {
        obj.style.color = '#008800';
        obj.innerHTML = 'Username available'; 
        document.getElementById('auname_flag').value='2';
    }
}
function check_username_install_error(err)
{
    alert ("Error: " + err);
}

function ajax_call (url, callback_function, error_function) {
	
        var xmlHttp = null;
	try {
		// for standard browsers
		xmlHttp = new XMLHttpRequest ();
	} catch (e) {
		// for internet explorer
		try {
			xmlHttp = new ActiveXObject ("Msxml2.XMLHTTP");
	    } catch (e) {
			xmlHttp = new ActiveXObject ("Microsoft.XMLHTTP");
	    }
	}
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4)
			try {
				if (xmlHttp.status == 200) {
					
					callback_function (xmlHttp.responseText);
				}
			} catch (e) {
				
				error_function (e.description);
			}
	 }
	
	 xmlHttp.open ("GET", url);
	 xmlHttp.send (null);
 }
			</script>        </td>
      </tr>
    </table>
  </form>
</div>
</div>
</body>
</html>
