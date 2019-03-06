<?php include_once('new_header.php'); ?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="saveLedger">

<input type="hidden" name="action" value="saveLedger" />

<input type="hidden" id="oldInvoice"  name="invoice_number" value="<?php echo $_GET['invoice']; ?>" />
<input type="hidden" name="invoice" value="<?php echo $finalcode; ?>" />
<input type="hidden" name="amount" value="<?php echo $_GET['amount']; ?>" />
<input type="hidden" name="balance" value="<?php echo $_GET['balance']; ?>" />
<div id="ac">
<span>Amount : </span><input type="text" name="paying" /><br>
<span>Remarks : </span><input type="text" name="remarks" /><br>
<span>&nbsp;</span><input id="btn" type="submit" value="save" />
</div>
</form>

<script src="js/beedy.js" type="text/javascript"></script> 
</body>
</html> 