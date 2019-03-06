				// JavaScript Document
				
								// JavaScript Document
								jQuery(document).ready( function($){
								 
								
			 // $( document ).on( "blur", "#spassword", function( e ) { passwordMatch(e); } );
								 

							  
						
						
								
										  
						
							$( document ).on( "blur", "#email", function( evt ) {  
							
						 var _this = $(evt.target);
								evt.preventDefault();
								var email = $(_this).serialize();
								
								//var username = $(this).val(); 
								var uri = $("#learnRegForm").find('#url').val(); 
								
								var url = uri + 'registerlogin/emailExists/';
								 
								$.ajax({
										url: url,
										type: 'POST',
										data: email,  
										success: function( result ){ 
											if(result == 1){
												
								$("#email_flag").val(1);
					$("#echeck").css('color', '#ff0000');
					$("#echeck").html('Email already taken');
											}
											else {
											$("#email_flag").val(2);
							   $("#echeck").css('color', '#008800');
					$("#echeck").html('Email is available');
											}
							 
									// $("#stateGroup").append(stateList);
									 
									// console.log(result);  
									 
												}
									});
							
							});
							
							
						 	$( document ).on( "blur", "#username", function( evt ) {  
							
						 var _this = $(evt.target);
								evt.preventDefault();
								var username = $(_this).serialize();
								
								//var username = $(this).val(); 
								var uri = $("#learnRegForm").find('#url').val(); 
								
								var url = uri + 'registerlogin/usernameExists/';
								 
								$.ajax({
										url: url,
										type: 'POST',
										data: username, 
									//  cache: false,
									// dataType: "json", 
										success: function( result ){  
											if(result == 1){
												
								$("#username_flag").val(1);
					$("#ucheck").css('color', '#ff0000');
					$("#ucheck").html('User already taken');
											}
											else {
							$("#username_flag").val(2);
							   $("#ucheck").css('color', '#008800');
					$("#ucheck").html('User available');
											}
							  
									 
												}
									});
							
							});
							
							
								
																 
							$( document ).on( "keyup", "#passwordId", function( e ) {  
				 var password = $(this).val(); 
						var notAllowed = ['philonoist','philonist','password'];
								
				 $("#passwordStrength").css('display', "none");
						var pwd ="Password Strength: ";
						var desc = new Array();
				
						desc[0] = "Very Weak";
				
						desc[1] = "Weak";
				
						desc[2] = "Good";
				
						desc[3] = "Strong";
				
						desc[4] = "Strongest"; 
						var ps = password.toLowerCase();
						if ($.inArray(ps, notAllowed) !== -1) 
						{   
						  $("#passwordStrength").css('display', "block"); 
						   $("#passwordStrength").css("color", "#ff0000"); 
							$("#passwordStrength").html("Sorry <i class='text-success'>" + password + "</i> is not allowed as a password on this platform"); 
						}
				
				else{
						if (password.length > 0) 
						{   
						  $("#passwordStrength").css('display', "block"); 
						   $("#passwordStrength").css("color", "#ff0000"); 
							$("#passwordStrength").html( pwd + desc[0]); 
						}
				
				
						//if password has at least one number give 1 point
				
						if (password.match(/\d+/) && password.length > 7) 
						{
						   $("#passwordStrength").css('display', "block"); 
						   $("#passwordStrength").css("color", "#ff0000"); 
							$("#passwordStrength").html( pwd + desc[1]); 
						}
				  //if password has at least one special caracther give 1 point
				
						if (password.match(/\d+/) && password.length > 7 && password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )
						{
							 $("#passwordStrength").css('display', "block"); 
						   $("#passwordStrength").css("color", "#8ed087"); 
							$("#passwordStrength").html( pwd + desc[2]); 
							 
						}
				
						
						//if password has both lower and uppercase characters give 1 point      
				
						if (password.match(/\d+/) && password.length > 10 && password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) && ( password.match(/[A-Z]/) ) ) 
						{
							 $("#passwordStrength").css('display', "block"); 
						   $("#passwordStrength").css("color", "#84b756"); 
							$("#passwordStrength").html( pwd + desc[3]); 
							 
						}
				
				
						//if password bigger than 12 give another 1 point
				
						if (password.match(/\d+/) &&  password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) && ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) && password.length > 12)
						{
							 $("#passwordStrength").css('display', "block"); 
						   $("#passwordStrength").css("color", "#43820b"); 
							$("#passwordStrength").html( pwd + desc[4]);  
						}
						
							}
							
							});
							  
							  
					//	$( document ).on( "blur", "#spassword", function( evt ) {  
					function checkRegForm ()
					{
								
				// var _this = $(evt.target);
				//evt.preventDefault();  
				  	var username_flag = $("#learnRegForm").find('#username_flag').val();
					
				var email_flag = $("#learnRegForm").find('#email_flag').val();
				
				if(username_flag !=2){
					 $("#username").focus();
					$("#ucheck").css('color', '#ff0000');
					$("#ucheck").html('This username is not available. Please try another one.');
					
					return false;
					}
					
					if(email_flag !=2){
						
					 $("#email").focus();
					$("#echeck").css('color', '#ff0000');
					$("#echeck").html('Email already taken');
					return false;
					}
					
				
				var fpassword = $("#learnRegForm").find('#passwordId').val();
					var spassword = $("#learnRegForm").find('#spassword').val();
					 
			 	
							if(fpassword.trim() == "")
					{
						$("#passwordStrength").html('<b class="text-danger"> User\'s password cannot be blank.</b> ');
						$('#passwordId').focus();
										 
						return false;
					}
					
							 if(fpassword==spassword )
    {
        if(fpassword.length < 8 || (fpassword.length > 7 && !fpassword.match((/\d+/))) || (fpassword.length > 7 && !fpassword.match((/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))
        {
           	$("#passwordStrength").html('<b class="text-danger">Password should be minimum 8 characters with atleast one number and one special character.</b> ');

            return false;
        }
        
        return true;
    }
    else
    {
       	$("#cpass").html('<b class="text-danger">Confirm password mismatch</b> ');
 

       $('#spassword').focus();
        return false;
    }
    
   
    return true;
	
					 	
						}
						//});	
								
								
							
$("#learnRegForm").on('submit',(function(e) {
e.preventDefault();

var  cc = checkRegForm();

if(cc){

 var url = $(this).attr('action'); 
$.ajax({
url: url, // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,     // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false ,
success: function(result)   // A function to be called if request succeeds
{  
  
 if(result == 1){
		alert("Registration successful. Please login now ");
		$("form").find(':input').attr('disabled',false);
		$("form").find(':button').attr('disabled',false);
		$("form").find(':button').html('<i class="icon-save icon-large"></i>&nbsp; Register');
	// refreshAll();
	  $("form").trigger("reset");
//$('#previewing').attr('src','images/nophoto.jpg');
	 $("#reg-bottom").removeClass('swal-danger').addClass('hide').html('<p><i class="fa fa-exclamation-triangle"></i></p>');
} 
else  {
$("#reg-bottom").removeClass('hide').addClass('swal-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Registration error!!! Please try again later.</p>');
$("form").find(':input').attr('disabled',false);
$("form").find(':button').attr('disabled',false);
$("form").find(':button').html('<i class="icon-save icon-large"></i>&nbsp;Register');
			}

}
});

}

}));

			
								// alert('hello');
								});	
								
								
								
								
								
								
								
						
								
								
								
								
								
								
								
								 