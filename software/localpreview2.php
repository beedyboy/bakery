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
<a href="local.php?invoice=<?php echo $finalcode ?>"><button class="btn btn-default"><i class="icon-arrow-left"></i> Back to Sales</button></a>
</div>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<?php
$invoice=$_GET['invoice']; 

$result = System::loadTblCond('sales', 'invoice_number', $invoice);
 
for($i=0; $row = $result->fetch(); $i++){ 
$invoice=$row['invoice_number'];
$date=$row['date']; 
$tid =System::getName('htables', 'tid', $row['tid'], 2);	
$sid =System::getName('hseat', 'sid', $row['sid'], 2);	
$hid =System::getName('hall', 'id', $row['hall'], 1);	
$cashier=$row['cashier'];
 
$am=$row['amount']; 
}
?> 
  
<div class="content" id="content">
<div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">
	<div style="width: 100%; min-height:100px; height: auto; overflow: hidden;" >
	<div style="width: 536px; float: left; height: 100px;">
	<center><strong><?php echo strtoupper($GetSession->companyName); ?><strong>	</center> 
	 Address: <?php echo $GetSession->address; ?>	<br>	 
	Contact No : <?php echo $GetSession->companyPhoneNum; ?><br>
	Email : <?php echo $GetSession->companyEmail; ?> 
 
	</div>
	<div style="width: 336px; float: right; height: 128px;">
	
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">
		<tr>
			<td colspan="2"><div style="text-align: center; font-weight: bold;">
			
	 ORDER BILL 
			</div></td>
		</tr>
		<tr>
			<td>Receipt No.</td>
			<td><?php echo $invoice ?></td>
		</tr>
		<tr>
			<td>Date</td>
			<td><?php echo $date ?></td>
		</tr> 
	<tr>
			<td>Location</td>
			<td><?php echo $hid. " "."Table: ".$tid." "."Seat: ".$sid; ?></td>
		</tr> 
	</table>
	
	</div>
	 </div>
	 <!-- Receipt major -->
	<div style="width: 100%;">
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;	text-align:left;" width="100%">
		<thead>
			<tr>
				 <th> Menu Name </th>
				<th> Qty </th>
				<th> Price</th>
				<th> Dis</th>
				<th> Vat  </th>
				<th> Amount</th>
			</tr>
		</thead>
		<tbody>
			
				<?php
					$id=$_GET['invoice'];
					$result = System::loadTblCond('sales_order','invoice', $id); 
					for($i=0; $row = $result->fetch(); $i++){
				?>
				<tr class="record">
				<td><?php echo System::getColById('products', 'product_id', $row['product_id'], 1);  ?></td>
				 <td><?php echo $row['qty']; ?></td>
				<td>
				<?php
				$ppp=$row['price'];
				echo System::formatMoney($ppp, true);
				?>
				</td>
				<td>
				<?php
				$ddd=$row['discount'];
				echo System::formatMoney($ddd, true);
				?>
				</td>
				<td>Gh&cent;
				<?php echo System::formatMoney($row['vat'], true);
				?>
				</td>
				<td>
				<?php
				$dfdf=$row['amount'];
				echo System::formatMoney($dfdf, true);
				?>
				</td>
				</tr>
				<?php
					}
				?>
			
				<tr>
				<td></td>
				<td colspan="4" style=" text-align:right;"><strong style="font-size: 12px;">Total: &nbsp;</strong></td>
					<td colspan="2"><strong style="font-size: 12px;">
					<?php
					$sdsd=$_GET['invoice'];
					 
					$resultas = System::amountSumSalesOrder($sdsd); 
					for($i=0; $rowas = $resultas->fetch(); $i++){
					$fgfg=$rowas['sum(amount)'];
					echo System::formatMoney($fgfg, true);
					}
					?>
					</strong></td>
				</tr>
				 
				 
			
		</tbody>
	</table>
	
	</div>
	</div>
	</div>
	</div>
	
<div style="text-align: right; margin-top: 13px;">Cashier : <?php echo $cashier ?></div>
<div class="pull-right" style="margin-right:100px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
		</div>	
</div>
</div>


