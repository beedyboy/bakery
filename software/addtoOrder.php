<?php
include_once('classes/functions.php'); 
?>  
 
 <?php
 $select = '';
	$output = array();
	$d = "PENDING";
	$cash = $GetSession->name;
	
	$conn = System::getInstance();
	
 $select = " SELECT * FROM sales WHERE status LIKE '%".$d."%' AND cashier LIKE '%".$cash."%'   ";
 $rs  = $conn->db->prepare($select); 
		$rs->execute(); 
		 
	 $finalcode='RS-'.System::createRandomPassword();
		?>
		 
 
<form id="addToOrder">
<div id="ac">

<input type="hidden" name="action" value="addToOrder" />

<center><h4><i class="icon icon-money icon-large"></i> Order Information</h4></center><hr>

<input type="hidden" id="invoice" name="invoice" value="<?php echo $_GET['invoice']; ?>" />

<input type="hidden" id="redirect"  name="redirect" value="<?php echo $_GET['redirect']; ?>" />
<input type="hidden" id="finalcode"  name="finalcode" value="<?php echo $finalcode; ?>" />

<span><label for="seat">Processing Ticket Number</label></span>  

<select name="Tnum" required>
		<?php
	foreach($rs as $row)
	{ 
		
		$hall_id = System::getName('hall', 'id', $row['hall'], 1);
	if($hall_id == false):
	$hall = "-";
	else:
	$hall = $hall_id;
	endif;
	
	 
	
	$table_id = System::getName('htables', 'tid', $row['tid'], 2);	
	if($table_id == false):
	$htables = "-";
	else:
	$htables = $table_id;
	endif;
	
	
 
	
	$seat_id = System::getName('hseat', 'sid', $row['sid'], 2);	
	if($seat_id == false):
	$hseat = "-";
	else:
	$hseat = $seat_id;
	endif;
	echo "<option value='".$row['invoice_number']."'>".$row['invoice_number']." -".$hall." ".$htables." seat ".$hseat. "</option>";
	 
	
	}
 
	
 ?>
<select />
<!--<input type="text" name="Tnum" /> --> 
<hr>
   
 
<br/> 
  
<div id="update-bottom" class="alert hide" style="margin:20px 0 0;"></div>
 
<button class="btn btn-success btn-block btn-large pull-right" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
 
</div>
</form>

<script src="js/beedy.js" type="text/javascript"></script>  