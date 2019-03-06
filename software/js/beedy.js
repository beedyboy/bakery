jQuery(document).ready( function($){ 

  
 $("#login-form").submit( function(e) { loginProcess(e);  });
 $("#saveSupplier").submit( function(e) { saveSupplier(e);  });
 $("#saveEditSupplier").submit( function(e) { saveEditSupplier(e);  });
 $("#saveProduct").submit( function(e) { saveProduct(e);  });
 $("#saveEditProduct").submit( function(e) { saveEditProduct(e);  });
 $("#saveCustomer").submit( function(e) { saveCustomer(e);  });
 $("#saveEditCustomer").submit( function(e) { saveEditCustomer(e);  });
 $("#Incoming").submit( function(e) { Incoming(e);  });
 $("#localSales").submit( function(e) { localSales(e);  });
 $("#saveSales").submit( function(e) { saveSales(e);  });
$("#sendClientSales").submit( function(e) { sendClientSales(e);  });
 $("#addToOrder").submit( function(e) { addToOrder(e);  });
 $("#saveKitchenOrder").submit( function(e) { saveKitchenOrder(e);  });
 $("#saveLedger").submit( function(e) { saveLedger(e);  });
 $("#saveUser").submit( function(e) { saveUser(e);  });
 $("#addKitchen").submit( function(e) { addKitchen(e);  });
 $("#saveTable").submit( function(e) { saveTable(e);  });
 $("#saveEditTbl").submit( function(e) { saveEditTbl(e);  });
 $("#saveEditSeat").submit( function(e) { saveEditSeat(e);  });
 $("#updateRestaurant").submit( function(e) { updateRestaurant(e);  });
 
 $("#saveNewSeat").submit( function(e) { saveSeat(e);  });
 $("#saveEditKit").submit( function(e) { saveEditKit(e);  });
 $("#saveEditUser").submit( function(e) { saveEditUser(e);  });
 $("#systemWindow").submit( function(e) { systemWindow(e);  });
 $("#activateKey").submit( function(e) { activateKey(e);  }); 
 $("#addSubCategory").submit( function(e) { addSubCategory(e);  }); 
 $("#saveEditSub").submit( function(e) { saveEditSub(e);  }); 
 $("#edit").change( function(e) { getHallRecord(e);  });  
 $("#seatTable").change( function(e) { getseatTable(e);  HallList(e);  }); 


 $("#saveFoodSubCat").submit( function(e) { saveFoodSubCat(e);  });
 $(".cancelSoldOrder").click( function(e) { cancelSoldOrder(e);   });
 


 // alert('hi');  
 //alert('hi'); 
 
  	 setTimeout(function(){  
	  refreshCart();}, 1000);
	
	 setInterval(function(){   
	  session_activity();
   }, 5000);
	
	setTimeout(function(){  
	  refreshKitchenCart();}, 1000);
	
	refreshSubCat();
	  refreshSupplier();
	  refreshProduct();
	  refreshUser();
	  refreshHall();
	  refreshTableMapping();
	 refreshSeatMapping();
 discount_fetcher();
	 



	 /**
	 *
	 *Update starts here
	 *
	 */
   
 function session_activity(){ 

$.ajax({
				url: "activity.php",
				type: "GET",
			 
				success: function(data){ 
	 if(data == 5)
	 {
	 	alert("Session logged out after 30 mins of inactivity");
	 	location.href='../index.php';
	 }
				} 
				
				}); 
	 
 }
 
  
	 /**
	  *@function destroyPopUp()
	  *@description destroys pop up content and closes it
	  *
	  */ 
	 var localOrder =  new Array();
	 var localQuantity = new Array();
 
	 function destroyPopUp(){
			$('.beedy-kaydee-popup-content').empty();  
				$('.beedy-kaydee-popup').hide();
	 }
 
  
  $(document).on('click','.activateDiscount', function(){
   
   var status = '';
   var action = "activateDiscount";
   
  var dField =  $("#showDiscount");
  if(dField.is(':checked')){
   status="YES";
  }
  else{
   status = "NO";
  }
   
  var dPerc = $("#dPerc").val();
  $.ajax({
   url:'actions.php',
   type:'GET',
   data:({dPerc:dPerc, status:status, action:action}),
    success:function(data)
			{
				 
   if(data == 1){
    alert("Discount has been set successfully");
    discount_fetcher();
				 
				}
    else{
    alert("Error setting discount!!!.. Please check your values and try again.");
    }
    
    
   }
   
   
   
  });
   
  });
  //show calculator
  
	 $(document).on('click','.showCalc', function(){
   
   	$.ajax({
			url:"calculator/index.html", 
			 success:function(data)
			{
				 
			$('.beedy-kaydee-popup-content').html(data);  
			 showMod();
				 
				}            
		});
  });
	 $(document).on('click', '.addMeal', function(){
 	var product_id = $(this).attr("id"); 
	var pname = $(this).attr("name");
		var action= "addMenuItem";
		var invoice = $("#invoice").val(); 
		$.ajax({
			url:"actions.php",
			type: "GET",
			data: ({product_id: product_id, invoice: invoice, action:action }), 
			 success:function(data)
			{

				if( data == 5){
					alert(" This menu is finished");
				}
				else{ 
			 refreshCart();
				 
				 }

				}            
		});
	});

	 function remove(array, element){
	 	return array.filter(e => e !== element);
	 }
	
	 //highlight local meal selected
	 $(document).on('click', '.addLocalMeal', function(){
			var pname = $(this).attr("name");
			var current = $(this).attr("id");

			//check whether it has been added before
			if($(this).hasClass("highlight")){ 
//then remove it from the array
			 var index  = localOrder.indexOf(current);
	 
			 	localOrder.splice(index, 1);


 $(this).removeClass(" highlight");
			  
			}
		 else{


			
			//otherwise show the form
		 $('.beedy-kaydee-popup-content').html('Add "'+ pname + '"<br /><input type="number" id="lamount" value="1" placeholder="amount"><button id="'+current+'" class="sendLocal btn btn-success btn-block btn-large pull-right"> Add</button>');
		 	showMod();
		
		$(this).addClass(" highlight"); 
		localOrder.push(current);
		 }

	 });
	
	
 $(document).on('click', '.sendHighlighted', function(){
	  
	 var action= "addLocalMenuItem";
		var invoice = $("#invoice").val();
		
		$.ajax({
			url: 'actions.php',
		type: "GET",
			data: ({localOrder: localOrder, localQuantity:localQuantity, invoice: invoice, action:action }), 
				 success:function(result) 	{
 $(".highlight").removeClass(" highlight");
  
  localOrder = [];
   localQuantity = [];
 refreshCart();
			} 
			
		}); 
	 
	 });
	 
	 //send local meal
	  
	 $('.beedy-kaydee-popup-content').on('click', '.sendLocal', function(){
 
 var lamount =$('.beedy-kaydee-popup-content').find("#lamount").val(); 
		localQuantity.push(lamount);
	 destroyPopUp();
	});
	
 
  
	 $('.beedy-kaydee-popup-content').on('click', '.sendLocals', function(){
 	var product_id = $(this).attr("id"); 
 var lamount =$('.beedy-kaydee-popup-content').find("#lamount").val(); 
		 
		var action= "addMenuItem";
		var invoice = $("#invoice").val();
		
		 
		$.ajax({
			url:"actions.php",
			type: "GET",
			data: ({product_id: product_id, invoice: invoice, lamount:lamount, action:action }), 
			 success:function()
			{
				destroyPopUp();
			 refreshCart();
				 
				}
		});
	});
	
 //discount_fetcher
 
 function discount_fetcher(){ 

$.ajax({
				url: "discount_fetcher.php",
				type: "GET",
			 
				success: function(html){
     
			 $(".discount_fetcher").html(html); 
		   
				} 
				
				}); 
	 
 }
 
  
	 
 function refreshCart(){
var invoice = $("#invoice").val();

$.ajax({
				url: "cartBody.php",
				type: "GET",
				data: ({invoice: invoice}), 
				success: function(html){
    $(".cartBody").html(html); 
		  refreshCartExtension(invoice);
				} 
				
				}); 
	 
 }
 
  
 function refreshCartExtension(invoice ){ 

$.ajax({
				url: "cart-extension.php",
				type: "GET",
				data: ({invoice: invoice}), 
				success: function(html){ 
			 $(".cart-extension").html(html); 
		 
				} 
				
				}); 
	 
 }
	 //get update
		 $(document).on('click', '.qty-minus', function(){
	
		var transaction_id = $(this).attr("id");
		var qty = $("#id"+ transaction_id).val();
		var action = "redAddQuantity";
		var sub   = "minus";
 
		$.ajax({
			url:"actions.php",
			type: "GET",
			data: ({transaction_id: transaction_id, qty: qty, action:action , sub:sub }), 
			 success:function()
			{    
			refreshCart();
				}
		});
	});
 
	
	//get update
		 $(document).on('click', '.qty-plus', function(){
	
		var transaction_id = $(this).attr("id");
		var qty = $("#id"+ transaction_id).val();
		var action = "redAddQuantity";
		var sub   = "plus";
 
		$.ajax({
			url:"actions.php",
			type: "GET",
			data: ({transaction_id: transaction_id, qty: qty, action:action , sub:sub }), 
			 success:function(data)
			{ 
					  
				if( data == 5){
					alert(" This menu is finished");
				}
				else{
			refreshCart();
		}
				}
		});
	});
	  
		
	 $(document).on('change', '.cart-qty', function(){
	
		var transaction_id = $(this).attr("tid");
		var qty = $(this).val();
		var action = "redAddQuantity";
		var sub   = "cart-qty";
 
		$.ajax({
			url:"actions.php",
			type: "GET",
			data: ({transaction_id: transaction_id, qty: qty, action:action , sub:sub }), 
			 success:function(data)
			{ 
					  
				if( data == 5){
					alert(" This menu is either finished or the quantity left is more than quantity provided");
				}
				else{
			refreshCart();
		}
				}
		});
	});

	 //get update
		 $(document).on('click', '.local-plus', function(){
	
		var plate = $(this).attr("id"); 
		var invoice = $(this).attr("invoice"); 
		var action = "localPlusMinus";
		var sub   = "plus";
 
		$.ajax({
			url:"actions.php",
			type: "GET",
			data: ({plate: plate, invoice: invoice, action:action, sub:sub  }), 
			 success:function(data)
			{  
				if( data == 5){
					alert(" This menu is finished");
				}
				else{
			refreshCart();
		}
				}
		});
	});
	  
//get update
		 $(document).on('click', '.local-minus', function(){
	
		var plate = $(this).attr("id"); 
		var invoice = $(this).attr("invoice"); 
		var action = "localPlusMinus";
		var sub   = "minus";
 
		$.ajax({
			url:"actions.php",
			type: "GET",
			data: ({plate: plate, invoice: invoice, action:action, sub:sub }), 
			 success:function(data)
			{ 
					  
				if( data == 5){
					alert(" This menu is finished");
				}
				else{
			refreshCart();
		}
				}
		});
	});
	 
  $(document).on('submit', '#viewSearchedInvoice', function(e){
  	e.preventDefault();
   var v = $("#country").val(); 
  $.ajax({
			url:"viewInvoiceValue.php",
			type: "GET",
			data: ({invoice: v}), 
			 success:function(data)
			{   
		 
       $('.beedy-kaydee-popup-content').html(data);
							showMod();
		 
			 
				}
		});
   
  });
  
  $(document).on('click', '.viewInvoiceValue', function(){
   var v = $(this).html(); 
  $.ajax({
			url:"viewInvoiceValue.php",
			type: "GET",
			data: ({invoice: v}), 
			 success:function(data)
			{   
		 
       $('.beedy-kaydee-popup-content').html(data);
							showMod();
		 
			 
				}
		});
   
	});
	 
	//view tax, nhil, levy
	$(document).on('click', '.viewTax', function(){
		var v = $(this).attr('id'); 
		// console.log(v);
	 $.ajax({
			 url:"viewtaxothers.php",
			 type: "GET",
			 data: ({transaction_id: v}), 
				success:function(data)
			 {   
			
				$('.beedy-kaydee-popup-content').html(data);
							 showMod();
			
				
				 }
		 });
		
	 });

   $(document).on('click', '.viewSoldInvoice', function(){
   var v = $(this).html(); 
  $.ajax({
			url:"viewSoldInvoice.php",
			type: "GET",
			data: ({invoice: v}), 
			 success:function(data)
			{   
		 
       $('.beedy-kaydee-popup-content').html(data);
							showMod();
		 
			 
				}
		});
   
  });
		
		
   
  
   $(document).on('click', '.viewOthSoldInvoice', function(){
   var v = $(this).html(); 
  $.ajax({
			url:"viewOthSoldInvoice.php",
			type: "GET",
			data: ({invoice: v}), 
			 success:function(data)
			{   
		 
       $('.beedy-kaydee-popup-content').html(data);
							showMod();
		 
			 
				}
		});
   
  });
		
		
  $(document).on('click', '.rpExportPDF', function(){
   var d1 = $(this).attr('d1');
   var d2 = $(this).attr('d2'); 
  $.ajax({
			url:"rpExportPDF.php",
			type: "GET",
			data: ({d1: d1, d2:d2}), 
			 success:function()
			{   
		 
       
			 
				}
		});
   
  });
	 $(document).on('change', '.sendDisc', function(){
	
		var transaction_id = $(this).attr("tid");
		var dis = $(this).val();
		var action = "sendDisc"; 
 
		$.ajax({
			url:"actions.php",
			type: "GET",
			data: ({transaction_id: transaction_id, discount: dis, action:action }), 
			 success:function()
			{    
			refreshCart();
				}
		});
	});
	 
	 $(document).on('change', '.sendLocalDisc', function(){
	
		var invoice = $(this).attr("invoice");
		var plate = $(this).attr("plate");
		var dis = $(this).val();
		var action = "sendLocalDisc"; 
 
		$.ajax({
			url:"actions.php",
			type: "GET",
			data: ({plate: plate, discount: dis, invoice:invoice, action:action }), 
			 success:function(data)
			{    
			refreshCart();
				}
		});
	});
	 
		 $(document).on('click', '.emptyCart', function(){
 	 var action = "emptyCart";
		var invoice = $("#invoice").val();
		$.ajax({
			url:"actions.php",
			type: "GET",
			data: ({invoice: invoice, action:action}), 
			 success:function()
			{    
							refreshCart();
			 
				}
		});
	});
	
 
	

	 $(document).on('click', '.refreshInvoive', function(){
 	var action =  "refreshInvoive";
		 
		$.ajax({
			url:"actions.php",
			type: "GET",
			data: ({action: action }), 
			 success:function(data)
			{ 

			 				$('input#invoice').val(data);
        					$('input#type').val("new"); 
        					refreshCart();
					 
				}
		});
	});
	 
	 		 $(document).on('click', '.checkout', function(){
 	var Ptype = $(this).attr("Ptype");
 	var hp = $(this).attr("hp");
	// var ord_type =		$('input#ord_type').val();
	var invoice = $("#invoice").val();
	var date = $("#date").val();
	var type = $("#type").val();  
	if(type == "edit"){
		saveEditSales();
		return;
	}
	
	// if(ord_type == "Take-Out"){
		var action = "saveTakeOutOrder"; 
		var cashier = $("#cashier").val();
	
		$.ajax({
			url:'actions.php',
			type: 'GET',
			data: ({invoice:invoice, cashier:cashier, date:date, action: action }), 
			success: function( result ){
		 
				 if(result == 1) { 
				 // location.href='sales.php?invoice=' + invoice;
				 $(".refreshInvoive").click();
			 refreshCart();
		 
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

		
	// }
	// 	else{
		
	// if(hp == "Yes"){
	// 		$.ajax({
	// 		url:"hcheckout.php",
	// 		type: "GET",
	// 		data: ({Ptype: Ptype, ord_type:ord_type, invoice: invoice }), 
	// 		 success:function(data)
	// 		{
	// 			$('.beedy-kaydee-popup-content').html(data);
	// 						showMod();
		 
	// 			}
	// 	});
	// }
	// else{
	// 		$.ajax({
	// 		url:"checkout.php",
	// 		type: "GET",
	// 		data: ({Ptype: Ptype, ord_type:ord_type, invoice: invoice, type:type }), 
	// 		 success:function(data)
	// 		{
	// 			$('.beedy-kaydee-popup-content').html(data);
	// 						showMod();
		 
	// 			}
	// 	});
	// }
	// 	}
		
	});
	
	
   //addtoOrder
		 $(document).on('click', '.addtoOrder', function(){ 
	 	var redirect = $(this).attr("redirect");
 	var invoice = $("#invoice").val();
		$.ajax({
			url:"addtoOrder.php",
			type: "GET",
			data: ({invoice: invoice, redirect: redirect }), 
			 success:function(data)
			{   
			//$('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
							 $('.beedy-kaydee-popup-content').html(data);
							showMod();
				// $('.beedy-kaydee-popup').show();
				}
		});
	});
	
	
function addToOrder(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize(); 
var invoice = $(_this).find('#finalcode').val();
var redirect = $(_this).find('#redirect').val();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){  
		 if(result == 1) { 
		 
		// location.href=''+redirect+'.php?invoice=' + invoice;
		 $(".refreshInvoive").click();
	 refreshCart();
	 destroyPopUp();
	 
	 } 
	else if(result == 10){
alert('Error: You must be logged in to perform this transaction.');
  location.href='signout.php'; 
		}
		else if(result == 20){
alert('Error: Wrong invoice number.'); 

$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Add To Order');
		} 
			else  {
alert('Error adding order!!! Please try again later.');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Add To Order');
			}
			 }
});
}

function saveSales(evt){
var _this = $(evt.target);
evt.preventDefault();
 
var formdata = $(_this).serialize(); 
$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){  
		 if(result == 1) { 
	
 	var action =  "refreshInvoive";
		 
		$.ajax({
			url:"actions.php",
			type: "GET",
			data: ({action: action }), 
			 success:function(data)
			{ 
			 				$('input#invoice').val(data);
        refreshCart();
					 
				}
		});
	 destroyPopUp();
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

$(document).on('click', '.rep_type', function(){
	var active  = $(this).val();
	
	if(active == "All"){
				reportingLog("All", null, null);
		

		 $("#groupView").removeClass(" display-1");
	
		$("#groupView").addClass(" display-0");
	}
	else if(active == "Today"){
					reportingLog("Today", null, null);
		 $("#groupView").removeClass(" display-1");
	
		$("#groupView").addClass(" display-0");
	}
	
	else if(active == "Calendar"){
				$("#groupView").removeClass(" display-0");
	
		$("#groupView").addClass(" display-1");
	}
	else{
		$("#groupView").removeClass(" display-1");
	
		$("#groupView").addClass(" display-0");
	}

	
});
	


//saveEditSales
function saveEditSales(){
var invoice = $("#invoice").val();
 var action = "saveEditSales"; 

	$.ajax({
	url:'actions.php',
	type: 'GET',
	data: ({invoice:invoice, action: action }), 
	success: function( result ){
      console.log(result); 
		 if(result == 1) { 
	
 	var actions =  "refreshInvoive";
		 
		$.ajax({
			url:"actions.php",
			type: "GET",
			data: ({action: actions }), 
			 success:function(data)
			{ 
	 $('input#invoice').val(data);
     
        					$('input#type').val("new");
        					   refreshCart();
					 
				}
		});
	 destroyPopUp();
	 } 
	else if(result == 10){
alert('Error: You must be logged in to perform this transaction.');
  location.href='signout.php'; 
		} 
			else  {
alert('Error checking out!!! Please try again later.'); 
			}
			 }
});
}



$(document).on('click', '.rep_type', function(){
	var active  = $(this).val();
	
	if(active == "All"){
				reportingLog("All", null, null);
		

		 $("#groupView").removeClass(" display-1");
	
		$("#groupView").addClass(" display-0");
	}
	else if(active == "Today"){
					reportingLog("Today", null, null);
		 $("#groupView").removeClass(" display-1");
	
		$("#groupView").addClass(" display-0");
	}
	
	else if(active == "Calendar"){
				$("#groupView").removeClass(" display-0");
	
		$("#groupView").addClass(" display-1");
	}
	else{
		$("#groupView").removeClass(" display-1");
	
		$("#groupView").addClass(" display-0");
	}

	
});
	

	//ryear
		$(document).on('change','#ryear', function(){ 

		var ryear = $(this).val();
		reportingLog("Yearly", ryear, "");
		
		$.ajax({
			url:'monthlist.php',
		type: 'GET',
	data: ({ryear: ryear}), 
			success: function(result){ 
				$("#MonthList").html(result);
				
			}
			
		});
		
	});
	
	
		//report month
		$(document).on('change','#rmonth', function(){ 

		var rmonth = $(this).val();
		var ryear = $("#ryear").val();
		reportingLog("Monthly", ryear, rmonth);
 
		
	});
	
//report Function
function reportingLog(rtype,param, param2){
		
		$.ajax({
			url:'getReportLog.php',
	type: 'GET',
		data: ({param: param,param2:param2,rtype:rtype}), 
	 
			success: function(result){ 
				$("#resultViewer").html(result);
				
			}
			
		});
	
}
	//getReportLog
//report Function
function staffReportingLog(srtype,param, param2, param3){
		
		$.ajax({
			url:'getStaffReportLog.php',
	type: 'GET',
		data: ({param: param, param2:param2, param3:param3,  srtype:srtype}), 
	 
			success: function(result){ 
				$("#resultViewer").html(result);
				
			}
			
		});
	
}
	//getReportLog
	 
	 
	 //report based on staff performance
	 
$(document).on('click', '.sr_rep_type', function(){
	var active  = $(this).val();
	var srname  = $("#srname").val();
 
	if(srname === ""){
		alert("Please select a staff to continue");
	}
	else{ 
	
	if(active == "All"){
				staffReportingLog("All", srname, null, null);
		

		 $("#srgroupView").removeClass(" display-1");
	
		$("#srgroupView").addClass(" display-0");
	}
	else if(active == "Today"){
					staffReportingLog("Today", srname, null, null);
		 $("#srgroupView").removeClass(" display-1");
	
		$("#srgroupView").addClass(" display-0");
	}
	
	else if(active == "Calendar"){
				$("#srgroupView").removeClass(" display-0");
	
		$("#srgroupView").addClass(" display-1");
		 getsrYearList(srname);
	}
	else{
		$("#srgroupView").removeClass(" display-1");
	
		$("#srgroupView").addClass(" display-0");
	}
	}
	
});
	
	
	function getsrYearList(srname){
	
		$.ajax({
				url:'getsrYearList.php',
			type: 'GET',
		data: ({srname: srname}),  
			success: function(result){
		 
				$("#srYearList").html(result);
				
			}
			
		});
		
	}
	
	$(document).on('change', '#srname', function(){
		
		$('input[name="sr_rep_type"]').attr('checked',false);
		$("#resultViewer").html("Search sales report using the field on the left screen");
	});
	//get month list for staff
	
$(document).on('change', '#sryear', function(){
 
	var sryear  = $(this).val();
	var srname  = $("#srname").val();	 
		
		staffReportingLog("Yearly",srname, sryear, null);
		
	if(srname === "" ){
		alert("Please select a staff to continue");
	}
	else{
			$.ajax({
				url:'getsrMonthList.php',
	type: 'GET',
		data: ({srname: srname, sryear:sryear}), 
	 
			success: function(result){ 
				$("#srMonthList").html(result);
				
			}
			
		});
	}
	
	});
	

$(document).on('change', '#srmonth', function(){
 
	var sryear  = $("#sryear").val();
	var srname  = $("#srname").val();
	var srmonth  = $(this).val();
	
	if(srname === null){
		alert("Please select a staff to continue");
	}
	else{
			 		staffReportingLog("Monthly",srname, sryear, srmonth);
	}
	
	});
	
	/**
	 *
	 *Editd code ends up
	 *
	 */
	 
  	function refreshHall(){
		$.ajax({
				url: "kitchenBody.php",
				type: "GET",				 
				success: function(html){  
 
			 $(".kitchenBody").html(html); 
		 
				} 
				
				}); 
	}
	//tmapBody
 function refreshTableMapping(){
//var invoice = "r" ;

$.ajax({
				url: "tableManagement.php",
				type: "GET",  
				success: function(html){  
			 $(".tmapBody").html(html); 
		 
				} 
				
				}); 
	 
 }
  
  function refreshSeatMapping(){ 	 
		$.ajax({
				url: "seatManagement.php",
				type: "GET",				 
				success: function(html){  
 
			 $(".seatBody").html(html); 
		 
				} 
				
				}); 
  }
 
 //refreshKitchenCart
 function refreshKitchenCart(){
var invoice = $("#invoice").val();

$.ajax({
				url: "kitchencartBody.php",
				type: "GET",
				data: ({invoice: invoice}), 
				success: function(html){ 
			 $(".kitchencartBody").html(html); 
		 
				} 
				
				}); 
	 
 }
  //supplierBody
	 
 function refreshSupplier(){ 
var red = "red";
$.ajax({
				url: "supplierBody.php",
				type: "GET",
				data: ({red: red}), 
				success: function(html){   
			 $(".supplierBody").html(html); 
		 
				} 
				
				}); 
	 
 }

 
  function refreshSubCat(){ 
var red = "red";
$.ajax({
				url: "subCategoryBody.php",
				type: "GET",
				data: ({red: red}), 
				success: function(html){  
			 $(".subCategoryBody").html(html); 
		 
				} 
				
				}); 
	 
 }
  

 function refreshProduct(){ 
var red = "red";
$.ajax({
				url: "productBody.php",
				type: "GET",
				data: ({red: red}), 
				success: function(html){   
			 $(".productBody").html(html); 
		 
				} 
				
				}); 
	 
 }
  
  function refreshUser(){ 
var red = "red";
$.ajax({
				url: "userBody.php",
				type: "GET",
				data: ({red: red}), 
				success: function(html){   
			 $(".userBody").html(html); 
		 
				} 
				
				}); 
	 
 }
  
function sendClientSales(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize(); 

$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){  
 	
		 if(result == 1) { 
		  
		 $("#msg").html("Order Added Successfully");
       $('.beedy-kaydee-popup-content').empty();  
				$('.beedy-kaydee-popup').hide();
		 refreshCart();
	 }
		else if(result == 2){
		alert('Error: Out of stock!!!.'); 
		}
	else if(result == 10){
alert('Error: You must be logged in to perform this transaction.');
  location.href='signout.php'; 
		}
else  {
alert('Error adding product!!! Please try again later.');
 }
			 }
});
}
 
 
	
	//cancelCartMeal
		 $(document).on('click', '.cancelCartMeal', function(){
	 
		var id = $(this).attr("id");
		var action = "cancelCartMeal";
		 
		$.ajax({
			url:"actions.php",
			type: "GET",
			data: ({id: id, action: action }), 
			 success:function(data)
			{  
			 
			if(data == 1){
				 refreshCart();
			}
			else{
				
				alert(" Error cancelling this order");
			}
				 
			 
				}
		});
	});

  

	//cancelCartGrpMeal
		 $(document).on('click', '.cancelCartGrpMeal', function(){
	 
		var plate = $(this).attr("id");
		var invoice = $(this).attr("invoice");
		var action = "cancelCartGrpMeal";
		 
		$.ajax({
			url:"actions.php",
			type: "GET",
			data: ({plate: plate, invoice:invoice, action: action }), 
			 success:function(data)
			{  
			 
			if(data == 1){
				 refreshCart();
			}
			else{
				
				alert(" Error cancelling this order");
			}
				 
			 
				}
		});
	});

    /**
       *@default
       *@description Load default fields
       */
       fetch_printer_data();
       fetch_receivable_data();
       receivableTotal();
 
     /**
       *@function fetch_printer_data
       *@description initialized the classGrpTable and feed with data
       *
       */
       function fetch_printer_data(){  
       var dataTable = $('#printerTable').DataTable({
       "processing" : true,
       "serverSide" : true,
       "order" : [],
       "ajax" : {
       url: "ToBePrinted.php",
       type: "POST"
       } 
       });
       
       }
	   
       function fetch_receivable_data(){  
       var dataTable = $('#receivableTable').DataTable({
       "processing" : true,
       "serverSide" : true,
       "order" : [],
       "ajax" : {
       url: "receivableTable.php",
       type: "POST"
       } 
       });
       
       }
	   
	
       function receivableTotal()
       {  
	  
       	$.ajax({
				url: "receivableTotal.php", 
				success: function(html){  
			 $("#receivableTotal").html(html); 
		 
				} 
				
				}); 
       }
	   
	   setInterval(function(){ 
	   $("#printerTable").DataTable().destroy();
	   fetch_printer_data();}, 30000);
      
	  setInterval(function(){ 
	   $("#receivableTable").DataTable().destroy();
	   fetch_receivable_data();
	   receivableTotal();}, 30000);

  
	     
 
		$('#productlists').on( "change", ".dmenu", function() {  
		var product_id =  $(this).val();
	var act = "dmenu"+product_id;
var invoice = $('#invoice').val();
	var date = $('#date').val();
	var main = $('#main').val();
	var action  = "AcceptOrder";
	var qty = $('#'+act+"qty").val();
	 
		 
	if( $(this).is(":checked") )
	{
		 
		$.ajax({
			url:"actions.php",
			type: "GET",
			data: ({product_id: product_id, qty: qty, main: main, invoice: invoice, date: date, action: action }), 
			 success:function(html)
			{
			 
			$('#'+act).attr("checked", false);
							refreshCart();
			 
				}
		});

	}
	else {
		alert(" cancel");
	}
	
 });
	
	
		 
	//print order
	$( document ).on( "click", ".printBtn", function() { 
				var id = $(this).attr("id"); 
			printOrder(id);
		} );  
		
			function printOrder(pid){
			
			var id = pid;
			var action = "printOrder";
			$.ajax({
				url: "actions.php",
				type: "POST",
				data: ({id: id, action: action}), 
				success: function(html){  
		 if(html == 1){
			 
			 $("#printerTable").DataTable().destroy();
					  fetch_printer_data();
				 var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
	 window.open("print.php?id="+id,"",disp_setting);
return false;  
					  
					    
					 
		 }
		 else if(html == 10){
			 alert("Please log in to perform this transaction");
			 location.href='../../pos/';
		 }
		 else{
			 alert("Error: Please try again later");
		 }
		  		
				} 
				
				});
		}
	
		
	//billPrint
	$( document ).on( "click", ".billPrint", function() { 
		var id = $(this).attr("id");  
		console.log(id);
		var invoice = $(this).attr("name"); 
	  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
	 window.open("billPrint.php?id="+id+ "&invoice="+invoice,"",disp_setting);
return false;	 
   
				 
				 
				
		} );  
		
				
	//billPrint
	$( document ).on( "click", ".printDeptRpt", function() { 
				var d1 = $(this).attr("d1"); 
				var d2 = $(this).attr("d2"); 
				var checker = $(this).attr("checker"); 
	  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
	 window.open("printDeptRpt.php?d1="+d1+"&d2="+d2+"&checker="+checker,"",disp_setting);
return false;	 
     
				
		} );  
		
		
		
  function cancelSoldOrder(evt) 
  { 
		
	var _this = $(evt.target);
	evt.preventDefault();	
	 var id = $(_this).attr("id");  
				var pid = $(_this).attr("pid");
				var action = "cancelSoldOrder"; 
				 if(jQuery.inArray(pid, ['Admin','Manager']) == -1)
				{ 
					
					alert("You do not have admin priviledges to perform this transaction");
						return false;
				}
				else
				{
					 if(confirm("Confirm this order to be deleted"))
					 {
						 
						$.ajax({
						url: "actions.php",
						type: "POST",
						data: ({invoice: id, action: action}), 
						success: function(html)
						{  

							 if(html == 1)
							 {
									 destroyPopUp();

									fetch_receivable_data();
      								 receivableTotal();
									  										 
							 }
							 else if(html == 10)
							 {
								alert('Error: You must be logged in to perform this transaction.');
		  						location.href='signout.php'; 
							 }
							 else
							 {
								 alert("Error: Please try again later");
							 }
				  		
						} 
						
						});
				   } 
					else
					{
						return false;
					}
				}
 } 

	 
		
	$( document ).on( "click", ".cancelOrder", function() { 
				var id = $(this).attr("id");  
				var pid = $(this).attr("tid");
				var tid = $(this).attr("pid");
				 
				 if(jQuery.inArray(pid, ['Admin','Manager']) == -1)
				 {
				 	alert("You do not have admin priviledges to perform this transaction");
						return false;
				 }
			 
				else
				{
					 if(confirm("Confirm this order to be deleted"))
					 {
					 	cancelOrder(id, tid);
				  	   
					} 
					else 
					{
						return false;
					}
				}
					
		} );  
		
		
		function cancelOrder(pid, tid){
			
			var id = pid;
			var action = "cancelOrder";
			$.ajax({
				url: "actions.php",
				type: "POST",
				data: ({id: id, tid: tid,action: action}), 
				success: function(html){  
		 if(html == 1){ 
			 $("#printerTable").DataTable().destroy();
					  fetch_printer_data();
					  
					   var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
	 window.open("print.php?id="+id,"",disp_setting);
return false;	 
					 
		 }
		 else if(html == 10){
			 alert("Please log in to perform this transaction");
			 location.href='../../pos/';
		 }
		 else{
			 alert("Error: Please try again later");
		 }
		  		
				} 
				
				});
		}
		
		
$( document ).on( "click", ".payButton", function() { 
var del_id = $(this).attr("id"); 
var firstName = $(this).attr("name"); 
var action = "payButton";  

if(confirm("Confirm "+ firstName +" has paid!")){

$.ajax({
url: "actions.php",
type: "POST",
data: ({transaction_id: del_id,action: action}), 
success: function(html){  

alert(html);
$("#receivableTable").DataTable().destroy();
fetch_receivable_data(); 
receivableTotal(); 

} 

});

}
else
{
return false;
}


} );  
	 
		
	  //clearBalances
 	 $(document).on('click', '.clearBalances', function(){ 
		$.ajax({
			url:"clearBalances.php", 	 
			 success:function(data)
			{   
			  $('.beedy-kaydee-popup-content').html(data);
			 		showMod();
			 
			 }
		 });
	});

$( document ).on( "submit", ".payAllBalances", function(evt) {  
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>'); 
$.ajax({
url: "actions.php",
type: "POST",
data: formdata, 
success: function(result){  
	if(result == 1)
	{ 
		$("#receivableTable").DataTable().destroy();
		fetch_receivable_data(); 
		receivableTotal(); 
		destroyPopUp();
	}
  else if(result == 10)
  {
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: You must be logged in to perform this transaction.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
 } 
else  
{
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: Transaction could not be completed!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Transaction');
 }

} 

});
 


} ); 

 
function getseatTable(evt){
var _this = $(evt.target);
evt.preventDefault();
var classType = $(_this).serialize();
$("#tableList").empty();
$("#tableList").html('<p>connecting to the server......</p>');
$.ajax({
	url:'getTableList.php',
	type: 'POST',
	data: classType,
	success: function( result ){
	$("#tableList").empty();
	$("#tableList").append(result);
			}
});
}
  
function HallList(evt){
var _this = $(evt.target);
evt.preventDefault();
var classType = $(_this).serialize();
$("#HallList").empty();
$("#HallList").html('<p>connecting to the server......</p>');
$.ajax({
	url:'HallList.php',
	type: 'POST',
	data: classType,
	success: function( result ){
	$("#HallList").empty();
	$("#HallList").append(result);
			}
});
}
  
function getHallRecord(evt){
var _this = $(evt.target);
evt.preventDefault();
var classType = $(_this).serialize();
$("#hallTypeRes").empty();
$("#hallTypeRes").html('<p>connecting to the server......</p>');
$.ajax({
	url:'getHallCat.php',
	type: 'POST',
	data: classType,
	success: function( result ){
	$("#hallTypeRes").empty();
	$("#hallTypeRes").append(result);
			}
});
}
    
function loginProcess(evt){ 
var _this = $(evt.target);
evt.preventDefault(); 
var username = $(_this).find('#username').val();
var password = $(_this).find('#password').val();
var formdata = $(_this).serialize();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('Loading..');
if( username === "" || password === "" ){
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
	 location.href='software/';
			
	 
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
   
  //addUser
 $(document).on('click', '.addUser', function(){
         
	  var redirect = "red"; 
		$.ajax({
			url:"addUser.php",
			type: "GET",
			data: ({redirect: redirect }), 	 
			 success:function(data)
			{   
		 //$('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
							 $('.beedy-kaydee-popup-content').html(data);
							showMod();
				// $('.beedy-kaydee-popup').show();
				}
		});
	});
 
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
		//location.href='user.php';
		$('.beedy-kaydee-popup-content').empty();  
				$('.beedy-kaydee-popup').hide();
		refreshUser();
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
//editUser 
		
	
$(document).on('click', '.editUser', function(){
         	var id = $(this).attr("id"); 
		$.ajax({
			url:"editUser.php",
			type: "GET",
			data: ({id: id }), 	 
			 success:function(data)
			{   
		  //$('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
							 $('.beedy-kaydee-popup-content').html(data);
							showMod();
				// $('.beedy-kaydee-popup').show();
				}
		});
	});

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
		//location.href='user.php';
		$('.beedy-kaydee-popup-content').empty();  
				$('.beedy-kaydee-popup').hide();
		refreshUser();
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
	//addMapTable
	
 $(document).on('click', '.addMapTable', function(){
         
	  //var redirect = "red"; 
		$.ajax({
			url:"addTable.php",
			type: "GET",
			//data: ({redirect: redirect }), 	 
			 success:function(data)
			{   
		//$('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
							 $('.beedy-kaydee-popup-content').html(data);
							showMod();
				// $('.beedy-kaydee-popup').show();
				}
		});
	});
 
$(document).on('click', '.editMapTable', function(){
         	var id = $(this).attr("id"); 
		$.ajax({
			url:"editTable.php",
			type: "GET",
			data: ({id: id }), 	 
			 success:function(data)
			{   
		   //$('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
							 $('.beedy-kaydee-popup-content').html(data);
							showMod();
				// $('.beedy-kaydee-popup').show();
				}
		});
	});

$(document).on('click', '.editSeatMap', function(){
         	var id = $(this).attr("id"); 
		$.ajax({
			url:"editSeat.php",
			type: "GET",
			data: ({id: id }), 	 
			 success:function(data)
			{   
		   //$('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
							 $('.beedy-kaydee-popup-content').html(data);
							showMod();
				// $('.beedy-kaydee-popup').show();
				}
		});
	});

function saveTable(evt){
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
		alert("New table has been added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		//location.href='kitchen.php?Page='+ 'Table Management';
		$('.beedy-kaydee-popup-content').empty();  
				$('.beedy-kaydee-popup').hide();
		refreshTableMapping();
	 }
		else if(result == 2){
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: This table already exist.</p>');
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
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new kitchen!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
			}
			 }
});
}


	
 $(document).on('click', '.addSeat', function(){ 
		$.ajax({
			url:"addSeat.php",
			type: "GET",
		 	 
			 success:function(data)
			{   
		 //$('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
							 $('.beedy-kaydee-popup-content').html(data);
							showMod();
				// $('.beedy-kaydee-popup').show();
				}
		});
	});
 
function saveSeat(evt){
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
		alert("New seat has been added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		//location.href='kitchen.php?Page='+ 'Seat Management'; 
		$('.beedy-kaydee-popup-content').empty();  
				$('.beedy-kaydee-popup').hide();
		refreshSeatMapping();
		
		}
		else if(result == 2){
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: This seat number already exist.</p>');
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
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new kitchen!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
			}
			 }
});
}

	
 $(document).on('click', '.addNewKitchen', function(){ 
		$.ajax({
			url:"addKitchen.php",
			type: "GET",
		 	 
			 success:function(data)
			{   
		  $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
				//$('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
							 $('.beedy-kaydee-popup-content').html(data);
							showMod();
				// $('.beedy-kaydee-popup').show();
				}
		});
	});
 
$(document).on('click', '.editHallKitchen', function(){
         	var id = $(this).attr("id"); 
		$.ajax({
			url:"editKitchen.php",
			type: "GET",
			data: ({id: id }), 	 
			 success:function(data)
			{   
		   //$('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
							 $('.beedy-kaydee-popup-content').html(data);
							showMod();
				// $('.beedy-kaydee-popup').show();
				}
		});
	});

function addKitchen(evt){
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
		alert("New zone has been added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
	//	location.href='kitchen.php'; 
	$('.beedy-kaydee-popup-content').empty();  
				$('.beedy-kaydee-popup').hide();
		refreshHall();
	 }
		else if(result == 2){
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: This zone already exist.</p>');
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
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new zone!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
			}
			 }
});
}

function addSubCategory(evt){
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
		alert("Sub Category has been added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		location.href='category.php'; 
	 }
		else if(result == 2){
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: This sub category already exist.</p>');
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
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error adding new sub category!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
			}
			 }
});
}	
$(document).on('click', '.editSubCategory', function(){
         	var id = $(this).attr("id"); 
		$.ajax({
			url:"editSubCategory.php",
			type: "GET",
			data: ({id: id }), 	 
			 success:function(data)
			{   
		  //$('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
							 $('.beedy-kaydee-popup-content').html(data);
							showMod();
				// $('.beedy-kaydee-popup').show();
				}
		});
	})

function saveEditSub(evt){
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
		alert("Record updated successfully");
		$(_this).find(':input').attr('disabled',false);
	 
	refreshSubCat();
	destroyPopUp();
	 } 
	else if(result == 10){
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: You must be logged in to perform this transaction.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
		}
else  {
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating record!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
			}
			}
});
}

function saveEditKit(evt){
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
		alert("Zone\'s record updated successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false); 
		//	location.href='kitchen.php'; 
	$('.beedy-kaydee-popup-content').empty();  
				$('.beedy-kaydee-popup').hide();
		refreshHall();
	 } 
	else if(result == 10){
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: You must be logged in to perform this transaction.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
		}
else  {
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating zone\'s record!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
			}
			}
});
}


function saveEditTbl(evt){
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
		alert("Table\'s record updated successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false); 
	//location.href='kitchen.php?Page='+ 'Table Management';
		$('.beedy-kaydee-popup-content').empty();  
				$('.beedy-kaydee-popup').hide();
		refreshTableMapping();
	 } 
	else if(result == 10){
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: You must be logged in to perform this transaction.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
		}
else  {
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating table\'s record!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
			}
			}
});
}

function saveEditSeat(evt){
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
		alert("Data updated successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false); 
	//location.href='kitchen.php?Page='+ 'Table Management';
		$('.beedy-kaydee-popup-content').empty();  
				$('.beedy-kaydee-popup').hide();
		refreshSeatMapping();
	 } 
	else if(result == 10){
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: You must be logged in to perform this transaction.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
		}
else  {
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating seat\'s record!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
			}
			}
});
}

function updateRestaurant(evt){
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
		alert("Profile updated successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false); 
	 
	 } 
	else if(result == 10){
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: You must be logged in to perform this transaction.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
		}
else  {
$("#update-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error updating profile!!! Please try again later.</p>');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save Changes');
			}
			}
});
}

//addSupplier
 $(document).on('click', '.addNewSupplier', function(){
         
	  var redirect = "red"; 
		$.ajax({
			url:"addNewSupplier.php",
			type: "GET",
			data: ({redirect: redirect }), 	 
			 success:function(data)
			{   
		 //$('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
							 $('.beedy-kaydee-popup-content').html(data);
							showMod();
				// $('.beedy-kaydee-popup').show();
				}
		});
	});
	
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
		 if(result == 1) {
		alert("New supplier has been added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		//location.href='supplier.php';
			$('.beedy-kaydee-popup-content').empty();  
				$('.beedy-kaydee-popup').hide();
		refreshSupplier();
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

//editsupplier
$(document).on('click', '.editsupplier', function(){
         	var id = $(this).attr("id"); 
		$.ajax({
			url:"editsupplier.php",
			type: "GET",
			data: ({id: id }), 	 
			 success:function(data)
			{   
		  //$('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
							 $('.beedy-kaydee-popup-content').html(data);
							showMod();
				// $('.beedy-kaydee-popup').show();
				}
		});
	});
		
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
		//location.href='supplier.php'; 
	 $('.beedy-kaydee-popup-content').empty();  
				$('.beedy-kaydee-popup').hide();
		refreshSupplier();
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



 $(document).on('click', '.addSubCategory', function(){
         
	  var redirect = "red"; 
		$.ajax({
			url:"addSubCategory.php",
			type: "GET",
			data: ({redirect: redirect }), 	 
			 success:function(data)
			{   
		  //$('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
							 $('.beedy-kaydee-popup-content').html(data);
							showMod();
				// $('.beedy-kaydee-popup').show();
				}
		});
	});

		
function saveFoodSubCat(evt){
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
		alert("Sub-Category added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		//location.href='products.php';
		$('.beedy-kaydee-popup-content').empty();  
				$('.beedy-kaydee-popup').hide();
		refreshSubCat();
	 }
		else if(result == 2){
$("#add-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i>Error: Sub-Category already exist under this main category.</p>');
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
 
    //addproduct
		 $(document).on('click', '.addproduct', function(){
         
	  var redirect = "red"; 
		$.ajax({
			url:"addproduct.php",
			type: "GET",
			data: ({redirect: redirect }), 	 
			 success:function(data)
			{   
		  //$('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
							 $('.beedy-kaydee-popup-content').html(data);
							showMod();
				// $('.beedy-kaydee-popup').show();
				}
		});
	});
	
//editproduct
$(document).on('click', '.editproduct', function(){
         	var id = $(this).attr("id"); 
		$.ajax({
			url:"editproduct.php",
			type: "GET",
			data: ({id: id }), 	 
			 success:function(data)
			{   
		   //$('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
							 $('.beedy-kaydee-popup-content').html(data);
							showMod();
				// $('.beedy-kaydee-popup').show();
				}
		});
	});
		
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
		 
		 if(result == 1) {
		alert("New product has been added successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false);
		$(_this).find(':button').html('<i class="icon icon-save icon-large"></i> Save');
		//location.href='products.php';
		$('.beedy-kaydee-popup-content').empty();  
				$('.beedy-kaydee-popup').hide();
		refreshProduct();
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
		 if(result == 1) {
		alert("Product has been edited successfully");
		$(_this).find(':input').attr('disabled',false);
		$(_this).find(':button').attr('disabled',false); 
		//location.href='products.php';
		$('.beedy-kaydee-popup-content').empty();  
				$('.beedy-kaydee-popup').hide();
		refreshProduct();
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

function localSales(evt){
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
		location.href='local.php?invoice=' + invoice;
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

function saveKitchenOrder(evt){
var _this = $(evt.target);
evt.preventDefault();
var formdata = $(_this).serialize();
var id = $(_this).find('#invoice').val();
 
var invoice = $(_this).find('#finalcode').val();
$(_this).find(':input').attr('disabled',true);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('<p>connecting to the server......</p>');
$.ajax({
	url:'actions.php',
	type: 'POST',
	data: formdata,
	success: function( result ){  
		 if(result == 1) { 
		 
	location.href='local.php?invoice=' + invoice;
		
		 var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
	 window.open("localpreview.php?id="+id,"",disp_setting);
return false;	

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

$(document).on('submit', '#deptreport', function(e){ 
e.preventDefault();


var _this = $(e.target);

var d1 = $("#d1").val(); 
var d2 = $("#d2").val(); 
var formdata = $(_this).serialize(); 

$.ajax({
	url:'departmentReportLog.php',
	type: 'GET',
 data: ({d1: d1, d2: d2 }), 
	success: function( result ){  
	  
$("#dptResultTable").html(result);
}

});
 
});
 
 $(document).on('click', '.dpt_rep_type', function(){ 
 
var d1 = $("#d1").val(); 
var d2 = $("#d2").val(); 

var checker = $(this).val(); 

$.ajax({
	url:'departmentReportLog.php',
	type: 'GET',
data: ({d1: d1, d2: d2, checker:checker }), 
	success: function( result ){   
$("#dptResultTable").html(result);
}

});
 
});
 

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
		if(result == 1) { 
		alert('Serial Key generated successfully');
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
 
function activateKey(evt){
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
		alert('License activated successfully');
		 location.href='index.php';
	 } 
else if(result == 2) {
alert('SmartShopper License Error !!! Key do not match. Please enter your license number again.');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('Activate');
			}	
			else if(result == 10){
alert('Error: You must be logged in to perform this transaction.');
  location.href='signout.php'; 
		} 
				else  {
alert('Error !!! Please try again later.');
$(_this).find(':input').attr('disabled',false);
$(_this).find(':button').attr('disabled',false);
$(_this).find(':button').html('Activate');
			}
			 }
});
}
 

 
  

 });
