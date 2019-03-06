/*
* Author : Akinniyi Bolade
* Email : boladebode@gmail.com
* Website : http://www.cedarcliffng.net
* Subject : Using Ajax with PHP/MySQL
*/
function already(){
 swal({
   title: "Auto close alert!",
   text: "You are on exam settings. Use refresh button by the left screen if you still want to work here.",
   timer: 8000,
   showConfirmButton: false
 });
}
 
//addClass
function addSeat()
{
 
var url = 'addSeat.php';
var method = 'POST';
var params = '';
var container_id = 'toggleSeat';
var loading_text = '<img src="../images/ajax-loader.gif">';
// call ajax function
ajax (url, method, params, container_id, loading_text);
}
 
// newHallList
function newHallList(change) {
	//alert(change);
var url = 'getHallList.php';
var method = 'POST';
var params = 'hallType='+change;
var container_id = 'newHallList' ;
var loading_text = '<img src="images/ajax-loader.gif">';
// call ajax function
ajax (url, method, params, container_id, loading_text);
}
    

// newHallList
function newSubCatList(change) {
	//alert(change);
var url = 'getSubCatList.php';
var method = 'POST';
var params = 'main='+change;
var container_id = 'newSubCatList' ;
var loading_text = '<img src="images/ajax-loader.gif">';
// call ajax function
ajax (url, method, params, container_id, loading_text);
}
    
// getSubList
function getSubList(change) {
	//alert(change);
var url = 'getSubList.php';
var method = 'POST';
var params = 'main='+change;
var container_id = 'getSubList' ;
var loading_text = '<img src="images/ajax-loader.gif">';
// call ajax function
ajax (url, method, params, container_id, loading_text);
}
    
	
function getSubListS(change) {
	//alert(change);
var url = 'getSubListS.php';
var method = 'POST';
var params = 'main='+change;
var container_id = 'getSubList';
var loading_text = '<img src="images/ajax-loader.gif">';
// call ajax function
ajax (url, method, params, container_id, loading_text);
}
  	
function getMyFood(change) {  
invoice = document.getElementById('invoice').value;
setTimeout( function() { $("#productlists").load("productlist.php?main="+ change+ '&invoice='+invoice); },100); 
  
}
  	
function getMyCatFood(change) {  
invoice = document.getElementById('invoice').value;
setTimeout( function() { $("#smartCatProducts").load("smartCatProdList.php?main="+ change+ '&invoice='+invoice); },100); 
  
}
  
	//getContinentalFood
		
function getContinentalFood(change) {  
invoice = document.getElementById('invoice').value;
setTimeout( function() { $("#smartCatProducts").load("getContinentalFood.php?main="+ change+ '&invoice='+invoice); },100); 
  
}

function suggestReceipt2(inputString){ 
		if(inputString.length === 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post("invoiceuggestion.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#country').removeClass('load');
				}
			});
		}
	}

	function fill2(thisValue) {
		$('#country').val(thisValue);
		setTimeout(function(){ $('#suggestions').fadeOut();}, 600);
	}

	// ajax : basic function for using ajax easily
function ajax (url, method, params, container_id, loading_text) {
try { // For: chrome, firefox, safari, opera, yandex, ...
xhr = new XMLHttpRequest();
} catch(e) {
try{ // for: IE6+
	xhr = new ActiveXObject("Microsoft.XMLHTTP");
} catch(e1) { // if not supported or disabled
	alert("Not supported!");
}
}
xhr.onreadystatechange = function() {
					   if(xhr.readyState == 4) { // when result is ready
						   document.getElementById(container_id).innerHTML = xhr.responseText;
					   } else { // waiting for result
						   document.getElementById(container_id).innerHTML = loading_text;
					   }
					}
xhr.open(method, url, true);
xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
xhr.send(params);
}
