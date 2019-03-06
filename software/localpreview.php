<?php include('header.php');?>
<body>
<?php include('navfixed.php');?>
	<?php
$position=$GetSession->position;
if($position=='cashier') {
$hide = 'hide';
 
} 
$active = "Sales";
?>
	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
		 
      <?php include_once("side_bar.php"); ?>    </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
		 
<div style="margin-top: -19px; margin-bottom: 21px;">
<a href="sales.php?invoice=<?php echo $finalcode ?>"><button class="btn btn-default"><i class="icon-arrow-left"></i> Back to Sales</button></a>
</div>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,widtd=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="widtd: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<?php
$invoice=$_GET['id']; 
$query =  "SELECT * FROM sales_order WHERE  invoice = '".$invoice."' AND status = 1";  
	
	 
	$conn = System::getInstance();
	
	$statement = $conn->db->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();  
  
?> 
  
<div class="content" id="content">
<div style="margin: 0 auto; padding: 20px; widtd: 900px; font-weight: normal;">
	<div style="widtd: 100%; min-height:100px; height: auto; overflow: hidden;" >
	
	<div style="widtd: 500px; float: left; height: 73px;">
	<span style="widtd: 500px; height: 30px;"><center><strong><?php echo strtoupper($GetSession->companyName); ?><strong>	</center> </span>
 
 <span style="left: 30px;"><center><?php echo $GetSession->address; ?>	</center> 
	</span>
 	 
	 <span style="left: 40px;"><center> Tel: <?php echo $GetSession->companyPhoneNum; ?></center> </span>
 
	
	<?php //echo Email : $GetSession->companyEmail; ?> 
 
 </div>
 <!-- order info -->
  <div style="widtd: 500px; float: left; height: 120px;">
	
	<table border="0" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;widtd : 100%;">
		<tr>
			<td colspan="2" >
		 <span style="left: 30%"> <center><strong><u>	ORDER BILL </u> <strong>	</center></span> 
			 </td>
		</tr>
		<tr>
			<td>Receipt No.</td>
			<td><?php echo $invoice ?></td>
		</tr>
		
	 
		<tr>
			<td>Served By</td>
			<td> <?php echo System::getColById('sales', 'invoice_number', $invoice, 2); ?></td>
		</tr>
		
		<tr>
			<td>Date</td>
			<td><?php echo System::getColById('sales', 'invoice_number', $invoice, 3); ?></td>
		</tr>  
	</table>
	</div>	
 <br/>
	
	</div>
	
	 
	 
	 <!-- Receipt major -->
	<div style="widtd: 100%;">
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 10px;	text-align:left;" widtd="50%">
		<tdead>
			<tr>
			<td> Menu Name </td>  
				<td> Qty </td>
				<td> Price </td>
				<td> Dis</td>
				<td> Vat  </td>
				<td> Rate</td>
			</tr>
		</tdead>
		<tbody>
			
				<?php
					foreach($result as $row)
					{ 
	  
				?>
				<tr class="record">
				<td>
<?php echo System::getColById('products', 'product_id',  $row['product_id'],  1); //name
//main is 5  ?></td>
<td  class="tableitem"><p class="itemtext"><?php echo $row['qty']; //qty ?> </p></td>

<td class="tableitem"><p class="itemtext">
<?php

echo System::formatMoney( $row['price'], true); //amt
?>
</p>
</td>

<td class="tableitem"><p class="itemtext">
<?php

echo System::formatMoney( $row['discount'], true); //discount
?>
</p>
</td>

<td class="tableitem">
<p class="itemtext">Gh&cent;
<?php

echo System::formatMoney( $row['vat'], true); //vat
?>
</p>
</td>

<td class="tableitem">
<p class="itemtext">
<?php

echo System::formatMoney(  $row['amount'], true); //amt
?>
</p>
</td>	</tr>

							 <?php		
									}

							 ?>
	<tr class="tabletitle">
								<td></td>
								<td colspan="4"  style=" text-align:right;" class="Rate"> Total: 
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2></td>
								<td  colspan="2" class="payment"><?php
					$sdsd=$_GET['id'];
					 
					$resultas = System::amountSumSalesOrder($sdsd); 
					for($i=0; $rowas = $resultas->fetch(); $i++){
					$fgfg=$rowas['sum(amount)'];
					echo System::formatMoney($fgfg, true);
					}
					?></h2></td>
							</tr>
							 

						 
			
		</tbody>
	</table>
	<br />
	<p class="legal">
						 
						<strong>Thank you for your business!</strong>  <hr /> 
						<span  style="font-size: 10px;"> Powered by Benma Innovations <br />
						0302324328  |	0209430625  </span>
						 
						</p>
	</div>
	
	
	</div>
	</div>
	</div>
	
 

<div class="pull-right" style="margin-right:100px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
		</div>	
		
</div>
</div>


