<?php
	include_once('classes/functions.php');
	
	?>
 <script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("invoice-POS").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
 
 
<style type="text/css">
body{
	//background:  #800000;
}

#invoice-POS {
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding: 2mm;
  margin: 0 auto;
  width: 80mm;
  background: #FFF;
}
#invoice-POS ::selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS ::moz-selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS h1 {
  font-size: 1.5em;
  color: #222;
}
#invoice-POS h2 {
  font-size: .9em;
}
#invoice-POS #contact {
  font-size: .9em;
}
#invoice-POS h3 {
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
#invoice-POS p {
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}
#invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
  /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}
#invoice-POS #top {
  min-height: 50px;
}
#invoice-POS #mid {
  min-height: 80px;
}
#invoice-POS #bot {
  min-height: 50px;
}
#invoice-POS #top .logo {
  height: 60px;
  width: 60px;
  background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
  background-size: 60px 60px;
}

#invoice-POS #top .info { 
   display: block;
  margin-left: 0;
}
#invoice-POS .clientlogo {
  float: left;
  height: 60px;
  width: 60px;
  background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
  background-size: 60px 60px;
  border-radius: 50px;
}
#invoice-POS .info {
  display: block;
  margin-left: 0;
}
#invoice-POS .title {
  float: right;
}
#invoice-POS .title p {
  text-align: right;
}
#invoice-POS table {
  width: 100%;
  border-collapse: collapse;
}
#invoice-POS .tabletitle {
  font-size: .5em;
  background: #EEE;
}
#invoice-POS .service {
  border-bottom: 1px solid #EEE;
}
#invoice-POS .item {
  width: 20%;
}
#invoice-POS .itemtext {
  font-size: .5em;
}
#invoice-POS #legalcopy {
  margin-top: 5mm;
  
}

 
 </style>
	
	<?php
	//table columns
 $printid = $_GET['id']; 
 $trans_id = System::getColById('printer', 'printId', $printid, 1);
 $invoice = System::getColById('sales_order', 'transaction_id', $trans_id, 1);
 
 
	$query =  "SELECT * FROM printer WHERE  printId = $printid ";  
	
	$conn = System::getInstance();
	
	$statement = $conn->db->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();  
	
?>

 
	
	
	
	
	<div id="invoice-POS">
    
    <center id="top">
 <!-- <div class="logo"></div>-->
      <div class="info"> 
      <h2><?php echo strtoupper($GetSession->companyName); ?> </h2>
			
			<center id="contact">  <?php echo $GetSession->address; ?></br>
            <?php echo $GetSession->companyPhoneNum; ?></br>
			
			</center>
	  </div>
	  <!--End Info-->
    </center>
	<!--End InvoiceTop-->
    
    <div id="mid">
      <div class="info">
        <h2><?php echo System::getColById('printer', 'printId', $printid, 2); ?></h2>
        <p> 
            Invoice Number : <?php echo $invoice; ?></br>
            Location   : <?php echo  System::getName('hall', 'id', System::getColById('sales', 'invoice_number', $invoice, 10), 1). " "."Table: ".System::getColById('htables', 'tid', System::getColById('sales', 'invoice_number', $invoice, 8),2)
			." "."Seat: ".System::getName('hseat', 'sid', System::getColById('sales', 'invoice_number', $invoice, 9), 2);  ?>
			</br>
			Cashier: <?php echo System::getColById('sales', 'invoice_number', $invoice, 2); ?>
        </br>
			Date: <?php echo System::getColById('sales', 'invoice_number', $invoice, 3); ?>
        </p>
      </div>
    </div>
	<!--End Invoice Mid-->
    
	
		 
	
    <div id="bot">

					<div id="table">
						<table>
							<tr class="tabletitle">
								<td class="item"><h2>Item</h2></td>
								<td class="Hours"><h2>Qty</h2></td>
								<td class="item"><h2>Price</h2></td>
								<td class="item"><h2>Dis</h2></td>
								<td class="item"><h2>Vat</h2></td>
								<td class="Rate"><h2>Rate</h2></td>
							</tr>

							<?php
					foreach($result as $row)
					{ 
	 
	  
							$invoice = System::getColById('sales_order', 'transaction_id', $row['trans_id'], 1);
				?>
							<tr class="service">
								 
							

<td class="tableitem"><?php echo System::getColById('products', 'product_id', System::getColById('sales_order', 'transaction_id', $row['trans_id'], 4), 1); //name
//main is 5  ?></td>
<td  class="tableitem"><p class="itemtext"><?php echo System::getColById('sales_order', 'transaction_id', $row['trans_id'], 2); //qty ?> </p></td>

<td class="tableitem"><p class="itemtext">
<?php

echo System::formatMoney( System::getColById('sales_order', 'transaction_id', $row['trans_id'], 3), true); //amt
?>
</p>
</td>

<td class="tableitem"><p class="itemtext">
<?php

echo System::formatMoney( System::getColById('sales_order', 'transaction_id', $row['trans_id'], 7), true); //discount
?>
</p>
</td>

<td class="tableitem">
<p class="itemtext">Gh&cent;
<?php

echo System::formatMoney( System::getColById('sales_order', 'transaction_id', $row['trans_id'], 6), true); //amt
?>
</p>
</td>

<td class="tableitem">
<p class="itemtext">
<?php

echo System::formatMoney( System::getColById('sales_order', 'transaction_id', $row['trans_id'], 3), true); //amt
?>
</p>
</td>

				</tr>

							 <?php		
									}

							 ?>

						<!--	<tr class="tabletitle">
								<td></td>
								<td class="Rate"><h2>tax</h2></td>
								<td class="payment"><h2>$419.25</h2></td>
							</tr>

							<tr class="tabletitle">
								<td></td>
								<td class="Rate"><h2>Total</h2></td>
								<td class="payment"><h2>$3,644.25</h2></td>
							</tr>
							-->

						</table>
					</div><!--End Table-->

					<div id="legalcopy">
						<p class="legal">
						<center>
						<strong>Thank you for your business!</strong>  <hr /> 
						<span  style="font-size: 10px;"> Powered by Benma Innovations <br />
						0302324328  |	0209430625   </span>
						</center>
						</p>
					</div>
				</div><!--End InvoiceBot-->
  </div><!--End Invoice-->


  <div class="pull-right" style="margin-right:100px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
		</div>	