<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);
 
include_once('classes/functions.php'); 
 $type=$_GET['Ptype'];
 
  $sdsd=$_GET['invoice'];
				$resultas = System::amountSumSalesOrder($sdsd);
				 
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$total=$rowas['sum(amount)'];
			 
				}
				
 $resulta = System::discountSumSalesOrder($_GET['invoice']);
				 
				for($i=0; $qwe = $resulta->fetch(); $i++){
				$profSum=$qwe['sum(discount)'];
			 
				}
			
$finalcode= System::createRandomPassword();
			
?> 
 
<form id="saveSales">
<div id="ac">

<input type="hidden" name="action" value="saveSales" />

<center><h4><i class="icon icon-money icon-large"></i> Order Information</h4></center><hr>
 
<input type="hidden" id="invoice" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
 
<input type="hidden" name="amount" value="<?php echo $total; ?>" />
<input type="hidden" name="ptype" value="<?php echo $_GET['Ptype']; ?>" />
<input type="hidden" name="ord_type" value="<?php echo $_GET['ord_type']; ?>" />
<input type="hidden" name="cashier" value="<?php echo $GetSession->name; ?>" />
<input type="hidden" name="profit" value="<?php echo $profSum; ?>" />
<input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>" />
<input type="hidden" id="finalcode"  name="finalcode" value="<?php echo $finalcode; ?>" />
 

  
<div id="update-bottom" class="alert hide" style="margin:20px 0 0;"></div>
 
<button class="btn btn-success btn-block btn-large pull-right" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
 
</div>
</form>
<?php //include('footer3.php');?>
 
<script src="js/beedy.js" type="text/javascript"></script>  
