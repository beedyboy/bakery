
<?php include('header.php');?>

<body>
<?php include('navfixed.php');?>
	<?php
$position=$GetSession->position;
if($position=='cashier') {
$hide = 'hide';
 
} 
$active = "SalesReport";
?>
	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
		 
      <?php include_once("side_bar.php"); ?>    </div><!--/.well -->
        </div><!--/span-->
		
	<div class="span10">
	<div class="contentheader">
			<i class="icon-list"></i> Customer Ledger
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Customer Ledger</li>
			</ul>
 <div id="maintable">
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>

<?php 
$invoice_number=$_GET['invoice_number'];
$resulta = System::loadTblCond('sales','invoice_number', $invoice_number); 
for($i=0; $rowa = $resulta->fetch(); $i++){
$name=$rowa['name'];
$amount=$rowa['amount'];
$lastPay = $rowa['balance'];
//$lastPay = $amount - $rrbalance;
}
 
 
$resultas = System::loadTblCond('customer','customer_name', $name); 
for($i=0; $rowas = $resultas->fetch(); $i++){
echo 'Name : '.$rowas['customer_name'].'<br>';
echo 'Address : '.$rowas['address'].'<br>';
echo 'Contact : '.$rowas['contact'].'<br>';
}
?>
<table id="resultTable" data-responsive="table">
	<thead>
		<tr>
			<th> Transaction ID </th>
			<th> Date </th>
			<th> Invoice Number </th>
			<th> Payment </th>
			<th> Total Amount Due </th>
			<th> Balance </th>
		</tr>
	</thead>
	<tbody>
			<tr class="record">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><strong><?php echo $amount; ?></strong></td>
			<td>&nbsp;</td>
			</tr>
			<?php
				$invoice_number=$_GET['invoice_number'];
				$result = System::reportTbl('collection','name',$invoice_number, 'transaction_id','ASC') ; 
				
				while($row = $result->fetch(PDO::FETCH_ASSOC)){
				//for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td>TR-000<?php echo $row['transaction_id']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['invoice']; ?></td>
			<td><?php echo $row['amount']; ?></td>
			<td>&nbsp;</td>
			<td><?php echo $row['balance']; ?></td>
			</tr>
			<?php
				//}
				}
			?>
		
	</tbody>
</table>
<a rel="facebox" id="addd" href="addledger.php?invoice=<?php echo $_GET['invoice_number']; ?>&amount=<?php echo $amount; ?>&balance=<?php echo $lastPay; ?>" style="margin-top: 10px;">
<button class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Add Payment</button></a><br><br>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</body>
<?php include('footer.php');?>

</html>