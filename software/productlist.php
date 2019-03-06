<?php
include('header.php');
 $main =$m = $_GET['main']; 
?>

													
<form id="Incoming" >
<input type="hidden" name="action" value="Incoming" />						
<input type="hidden" name="pt" value="<?php  echo System::removeComma('2,400'); ?>" />
<input type="hidden" id="invoice" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
<input type="hidden" name="main" value="<?php echo $_GET['main']; ?>" />
<select name="product_id" style="width:500px; "class="chzn-select" required>
<option></option>
	<?php 
	$result =   System::loadAllProductsWhere($main);
	
		for($i=0; $row = $result->fetch(); $i++){
			
			$existCheck =System::getColById('products', 'product_id', $row['product_id'], 3);
			
	?>
		<option value="<?php echo $row['product_id'];?>" class="<?php if($existCheck ==0): echo "selectRed"; else: echo "selectGreen"; endif; ?>"><?php echo $row['product_name']; ?> - <?php echo $row['price']; ?>
 </option>
	<?php
				}
			?>
</select> 
<?php 
if($m !="S"):

if($m =="C" || $m=="F"|| $m=="D"):
?> 
<span>Quantity: </span><input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" required>
<?php
elseif($m =="L" || $m =="SM"):
?>
<span>Amount: </span><input type="text" name="amount"  placeholder="Amount" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" required>

<?php endif; ?>
<span>Discount: </span>
<input type="text" name="discount" value="0" autocomplete="off" style="width: 68px; height:30px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
<?php endif; ?>
 <input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />

<input type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" value="Add" />  
</form>

			  
<?php include('footer2.php'); ?>