		
<!-- the modal, wrapped  in an overlay -->
 <div class="beedy-kaydee-popup">
 <div class="beedy-kaydee-popup-content">
		  
		</div> 
		<span class="beedy-kaydee-popup-btn-close">Close</span>
		
		</div>
	
 
	
		
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
   
<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>  

<!-- data tables library -->
	<script src="public/js/jquery.dataTables.min.js"></script>
		<script src="public/js/dataTables.bootstrap4.min.js"></script>	
		<script src="public/js/jquery-ui.js"></script>	 
		<script src="public/js/popper.min.js"></script>	 
		<script src="public/js/holder.min.js"></script>	 
		<script src="public/js/bootstrap.min.js"></script> 

   
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->	
		<script src="public/js/ie10-viewport-bug-workaround.js"></script>	
    
    
    <script type="text/javascript" src="public/js/validator.js"></script>

 
 
        <script src="vendors/bootstrap-datepicker.js"></script>
  

<script type="text/javascript" src="tcal.js"></script>
	
 
   <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->  
<script src="dist/beedy_kaydee.js" type="text/javascript"></script>  
<script src="js/beedy.js" type="text/javascript"></script>  
<script src="js/bd.js" type="text/javascript"></script>  
<script src="js/beedyScript.js" type="text/javascript"></script> 
	 <script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<script>
	
	function openTabPane(evt, name){
		
		//declare all variable
		
		var i, tabcontent, tablinks;
		
		
		//get all elements with class tabcontent and hide the,
		
		
		tabcontent = document.getElementsByClassName("tabcontent");
		
		for (i = 0; i < tabcontent.length; i++){
			tabcontent[i].style.display = "none";
		}
		
		
		//get all elements with class tablinks and remove the class active
		
		
		
		tablinks = document.getElementsByClassName("beedytablinks");
		
		for(i=0; i < tablinks.length; i++){
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		
		//show the current tab and add an active class to the button that openee it
		
		document.getElementById(name).style.display = "block";
		
		evt.currentTarget.className += " active";
	}
	
	document.getElementById("kitMan").click();
	
function suggest(inputString){
		if(inputString.length === 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post("autosuggestname.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#country').removeClass('load');
				}
			});
		}
	}

	
function suggestReceipt(inputString){
		if(inputString.length === 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post("autosuggest.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#country').removeClass('load');
				}
			});
		}
	}

	function fill(thisValue) {
		$('#country').val(thisValue);
		setTimeout(function(){ $('#suggestions').fadeOut();}, 600);
	}
	 
</script>

<script>
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}

function sum() { 
var vatChecked = false;
var vatValue = 0.175;
var vat=0;
if(document.getElementById('applyVat_0').checked)
{
vatChecked = false;
}
 else if(document.getElementById('applyVat_1').checked)     
{
vatChecked = true;
}
else {
  alert ("You must select a button");
  return false;
}
 var txtFirstNumberValue = document.getElementById('txt1').value;
            //var txtSecondNumberValue = document.getElementById('txt2').value;
            //var result = parseFloat(txtFirstNumberValue) - parseFloat(txtSecondNumberValue);
            var result = parseFloat(txtFirstNumberValue);
            if (!isNaN(result)) {
              //  document.getElementById('txt3').value = result;
				if(vatChecked===true)
			{
			vat = txtFirstNumberValue * vatValue;
			 document.getElementById('vat').value = vat;
			}
			else{
			 document.getElementById('vat').value = 0;
			}
            }
			 
			   txtFirstNumberValue = document.getElementById('txt11').value;
              result = parseFloat(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt22').value = result;				
            }
			
			   txtFirstNumberValue = document.getElementById('txt11').value;
              txtSecondNumberValue = document.getElementById('txt33').value;
              result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt55').value = result;
				
            }
			
			   txtFirstNumberValue = document.getElementById('txt4').value;
			   result = parseFloat(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt5').value = result;
				}
			
        }

function demo(){
		if(document.getElementById('trial').checked)
{
//alert('checked');
document.getElementById('dWeeks').style.display = "block";
}
else{
document.getElementById('dWeeks').style.display = "none";
}

}

function printJobs(){  
$.ajax({
	url:'printJob.php',
	type: 'POST', 
	success: function( result ){  
	alert(result);
		
		if(result == 1) { 
		alert('License activated successfully');
		 
	 } 
		 
				else  {
alert('Error !!! Please try again later.'); 
			}
			 }
});
}
  
 
 //setTimeout( function() { printJobs(); },100); 
  
  </script>

	
 


	<script>
		
	 $(".nav-item").mouseover(function(){
		if($(this).hasClass('actives')){
			
			return;
		}
		else {
			
		$(this).addClass('actives');
		
		}
		
	 }).mouseout(function(){
		$(this).removeClass('actives');
		
	 });
	 
	$(function() {
		
		$('[data-toggle="tooltip"]').tooltip();
		
	});
	
	</script>


<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
<script>
	
	
	function toggleFullScreen(elem) {
    // ## The below if statement seems to work better
	//## if ((document.fullScreenElement && document.fullScreenElement !== null) ||
	//(document.msfullscreenElement && document.msfullscreenElement !== null) ||
	//(!document.mozFullScreen && !document.webkitIsFullScreen)) {
	
 
    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (elem.requestFullScreen) {
            elem.requestFullScreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullScreen) {
            elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }
}
	 
 </script>