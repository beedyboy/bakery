jQuery(document).ready( function($){ 
 $("#login-form").submit( function(e) { loginProcess(e);  });
 $("#saveSupplier").submit( function(e) { saveSupplier(e);  });
 $("#saveEditSupplier").submit( function(e) { saveEditSupplier(e);  });
 $("#saveProduct").submit( function(e) { saveProduct(e);  });
 $("#saveEditProduct").submit( function(e) { saveEditProduct(e);  });
 $("#saveCustomer").submit( function(e) { saveCustomer(e);  });
 $("#saveEditCustomer").submit( function(e) { saveEditCustomer(e);  });
 $("#Incoming").submit( function(e) { Incoming(e);  });
 $("#saveSales").submit( function(e) { saveSales(e);  });
 $("#saveLedger").submit( function(e) { saveLedger(e);  });
 $("#saveUser").submit( function(e) { saveUser(e);  });
 $("#saveEditUser").submit( function(e) { saveEditUser(e);  });
 $("#systemWindow").submit( function(e) { systemWindow(e);  });
  

function loginProcess(evt){ 
var _this = $(evt.target);
evt.preventDefault(); 
var username = $(_this).find('#username').val();
var password = $(_this).find('#password').val();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('Loading..');
if( username == "" || password == "" ){
$("#login-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i> Check your login credentials! Something is empty!</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('Login');
}
else {
$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		// alert(result);
		if(result == 1) {
			$("#login-bottom").removeClass('hide').addClass('alert-success').html('<p>Logging in......</p>');
				location.href='software/index.php';
			 } 
			else{
			$("#login-bottom").removeClass('hide').addClass('alert-danger').html('<p>No user is registered using this credentials.</p>');
			$(_this).find(':input').attr('disabled',false);
			$(_this).find(':button').attr('disabled',false);
			$(_this).find(':button').html('<i class="icon-signin icon-large"></i>Login');
		}
	}
});
}
return this;
}

function changepass(evt){
	//alert('hey');
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();

var password = $(_this).find('#password').val();
var cpassword = $(_this).find('#cpassword').val();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
if(cpassword != password)
{
	alert("Change Password Failed!!! Password Doesn't Match");
	$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('Change Password');
}
else{
$.ajax({
	url:'../actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
		 if(result == 1) {
		alert("Password changed successfully!!!! Please login with your new password");

		  location.href='../log/logout.php';

		}
		else  {
			//alert("Error updating School Data!!! Please try again later.");
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating School Data!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('Change Password');
}
			}
});
}
}

function saveUser(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){ 
		 if(result == 1) {
		alert("New user has been added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		location.href='user.php'; 
	 }
		else if(result == 2){
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: This user already exist.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		}
	else if(result == 10){
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: You must be logged in to perform this transaction.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		}
else  {
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new user!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
			}
			 }
});
}

function saveEditUser(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){ 
		 if(result == 1) {
		alert("User\'s record updated successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false); 
		location.href='user.php'; 
	 } 
	else if(result == 10){
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: You must be logged in to perform this transaction.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
		}
else  {
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating user\'s record!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
			}
			}
});
}

  
function saveSupplier(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
 //alert(result);
		 if(result == 1) {
		alert("New supplier has been added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		location.href='supplier.php'; 
	 }
		else if(result == 2){
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: This supplier already exist.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		}
	else if(result == 10){
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: You must be logged in to perform this transaction.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		}
else  {
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new supplier!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
			}
			}
});
}

function saveEditSupplier(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){ 
		 if(result == 1) {
		alert("Supplier\'s details has been edited successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false); 
		location.href='supplier.php'; 
	 } 
	else if(result == 10){
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: You must be logged in to perform this transaction.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
		}
else  {
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating supplier\'s detail!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
			}
			}
});
} 

function saveProduct(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
 //alert(result);
		 if(result == 1) {
		alert("New product has been added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		location.href='products.php'; 
	 }
		else if(result == 2){
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: This product already exist.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		}
	else if(result == 10){
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: You must be logged in to perform this transaction.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		}
else  {
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new product!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
			}
			 }
});
}

 
function saveEditProduct(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
 //alert(result);
		 if(result == 1) {
		alert("Product has been edited successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false); 
		location.href='products.php'; 
	 } 
	else if(result == 10){
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: You must be logged in to perform this transaction.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
		}
else  {
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating product\'s detail!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
			}
			}
});
}

function saveCustomer(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){
 //alert(result);
		 if(result == 1) {
		alert("Customer added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		location.href='customer.php'; 
	 }
		else if(result == 2){
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: This customer already exist.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		}
	else if(result == 10){
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: You must be logged in to perform this transaction.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		}
else  {
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new customer!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
			}
			 }
});
}

function saveEditCustomer(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){ 
		 if(result == 1) {
		alert("Customer\'s record updated successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false); 
		location.href='customer.php'; 
	 } 
	else if(result == 10){
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: You must be logged in to perform this transaction.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
		}
else  {
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating customer\'s record!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
			}
			}
});
}

function Incoming(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
var invoice = $(_this).find('#invoice').val();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){  
		 if(result == 1) { 
		location.href='sales.php?invoice=' + invoice;
	 }
		else if(result == 2){
		alert('Error: Out of stock!!!.');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-circle-arrow-left icon-large"></i> Add');
		}
	else if(result == 10){
alert('Error: You must be logged in to perform this transaction.');
  location.href='signout.php'; 
		}
else  {
alert('Error adding product!!! Please try again later.');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-circle-arrow-left icon-large"></i> Add');
			}
			 }
});
}

function saveSales(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
var invoice = $(_this).find('#invoice').val();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){  
		 if(result == 1) { 
		location.href='preview.php?invoice=' + invoice;
	 } 
	else if(result == 10){
alert('Error: You must be logged in to perform this transaction.');
  location.href='signout.php'; 
		}
else if(result == 2)  {
alert('Error!!! Amount tendered can/t be less than product fee');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
			}
			else  {
alert('Error checking out!!! Please try again later.');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
			}
			 }
});
}
 

function saveLedger(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
var invoice = $(_this).find('#oldInvoice').val();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){  
		if(result == 1) { 
		 location.href='customer_ledger.php?invoice_number=' + invoice;
	 } 
	else if(result == 10){
alert('Error: You must be logged in to perform this transaction.');
  location.href='signout.php'; 
		}
else if(result == 2)  {
alert('Error!!! Amount tendered greater than outstanding fee');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
			}
			else  {
alert('Error checking out!!! Please try again later.');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
			}
			 }
});
}
 
function systemWindow(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize(); 
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){  
		alert('hi');
		if(result == 1) { 
		swal('Serial Key generated successfully');
		 location.href='activation.php';
	 } 
	else if(result == 10){
alert('Error: You must be logged in to perform this transaction.');
  location.href='signout.php'; 
		} 
			else  {
alert('Error generating key!!! Please try again later.');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Generate Key');
			}
			 }
});
}
 
 function refreshAll(){
 
//var viewCourses = setTimeout( function() { $("#viewCourses").load("viewCourses.php"); },100); 
  var viewCourses = setTimeout( function() { $("#viewCourses").load("view/viewCourses.php"); },100); 
  }
refreshAll();
 

 });
