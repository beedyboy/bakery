
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
		<div class="contentheader">
			<i class="icon-money"></i> Sales
			</div>
			<ul class="breadcrumb">
			<a href="index.php"><li>Dashboard</li></a> / 
			<li class="active">Sales</li>
			</ul>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>
													
<form id="Incoming" >
<input type="hidden" name="action" value="Incoming" />						
<input type="hidden" name="pt" value="<?php  echo System::removeComma('2,400'); ?>" />
<input type="hidden" id="invoice" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
<select name="product_id" style="width:650px; "class="chzn-select" required>
<option></option>
	<?php 
	$result =   System::loadAllProducts();
	
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['product_id'];?>"><?php echo $row['product_code']; ?> - <?php echo $row['product_name']; ?> - <?php echo $row['product_desc']; ?> | Expires at: <?php echo $row['expiry_date']; ?></option>
	<?php
				}
			?>
</select>
<input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
<input type="text" name="discount" value="0" autocomplete="off" style="width: 68px; height:30px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
 <input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
<Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i> Add</button>
</form>
<table class="table table-bordered" id="resultTable" data-responsive="table">
	<thead>
		<tr>
			<th> Product Code </th>
			<th> Product Name </th>
			<th> Description </th>
			<th> Price </th>
			<th> Qty </th>
			<th> Amount </th>
			<th> Profit </th>
			<th> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				$id=$_GET['invoice']; 
				$loadTblCond = System::loadTblCond('sales_order','invoice',$id);
				 //$fetch = $loadTblCond->fetch();
				 $rowCount= $loadTblCond->rowCount();
				for($i=1; $row= $loadTblCond->fetch();  $i++){
			?>
			<tr class="record">
			<td hidden><?php echo $row['product_id']; ?></td>
			<td><?php echo System::getColById('products', 'product_id', $row['product_id'], 1); ?></td>
			<td><?php echo System::getColById('products', 'product_id', $row['product_id'], 2); ?></td>
			<td><?php echo System::getColById('products', 'product_id', $row['product_id'], 3); ?></td>
			<td>
			<?php
			$ppp=$row['price'];
			echo System::formatMoney($ppp, true);
			?>
			</td>
			<td><?php echo $row['qty']; ?></td>
			<td>
			<?php
			$dfdf=$row['amount'];
			echo System::formatMoney($dfdf, true);
			?>
			</td>
			<td>
			<?php
			$profit=$row['profit'];
			echo System::formatMoney($profit, true);
			?>
			</td>
			<td width="90"><a href="deleteOrder.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&qty=<?php echo $row['qty'];?>&product_id=<?php echo $row['product_id'];?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancel </button></a></td>
			</tr>
			<?php
				}
			?>
			<tr>
			<th> </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<td> Total Amount: </td>
			<td> Total Profit: </td>
			<th>  </th>
		</tr>
			<tr>
				<th colspan="5"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">
				<?php
				 $sdsd=$_GET['invoice'];
				$resultas = System::amountSumSalesOrder($sdsd);
				 
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$total=$rowas['sum(amount)'];
				echo System::formatMoney($total, true);
				}
				?>
				</strong></td>
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">
			<?php 
				$resulta = System::profitSumSalesOrder($sdsd);
				 
				for($i=0; $qwe = $resulta->fetch(); $i++){
				$profSum=$qwe['sum(profit)'];
				echo System::formatMoney($profSum, true);
				}
				?>
		
				</td>
				<th></th>
			</tr>
		
	</tbody>
</table>
<br>
 
<a rel="facebox" class="pull-right" href="checkout.php?type=credit&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $total ?>&totalprof=<?php echo $profSum ?>&cashier=<?php echo $GetSession->name; ?>">
<button class="btn btn-success btn-large "><i class="icon icon-save icon-large"></i> Send Order</button></a>
<div class="clearfix"></div>
</div>

	</div>
</div>
</body>
<?php include('footer2.php'); ?>
</html>
