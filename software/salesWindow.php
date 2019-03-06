 <?php
 
include_once('classes/functions.php'); 
$m = $_GET['main']; 
?>  
	<form id="localSales" ><center><h4><i class="icon-plus-sign icon-large"></i> Add <?php echo $_GET['name']; ?></h4></center>
<hr />
<div id="ac"> 
<input type="hidden" name="action" value="Incoming" />						
<input type="hidden" name="pt" value="<?php  echo System::removeComma('2,400'); ?>" />
<input type="hidden" id="invoice" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
<input type="hidden" name="product_id" value="<?php echo $_GET['product_id']; ?>" />
<input type="hidden" name="main" value="<?php echo $_GET['main']; ?>" />
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


<div style="float:right; margin-right:10px;"> 
<button class="btn btn-info btn-block btn-large" style="width:157px;"><i class="icon icon-plus-sign icon-large"></i> Add</button>
</div>
<br /> 
</div>

</form>
 <script src="lib/jquery.js" type="text/javascript"></script>
 
	  <script src="vendors/jquery-1.7.2.min.js"></script>
<script src="js/beedy.js" type="text/javascript"></script> 