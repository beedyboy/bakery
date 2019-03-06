<?php
 include_once('new_header.php'); 
 
?> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<body onLoad="document.getElementById('country').focus();">
<center><h4>Customer Ledger</h4></center>
<hr>
<form action="customer_ledger.php" method="get">
<div id="ac">
<input type="text" size="25" value="" name="invoice_number" id="country" onkeyup="suggestReceipt(this.value);" onblur="fill();" class="" autocomplete="on" placeholder="Enter Customer Invoice here!" style="width:268px; height:30px;" /><br><br>
     
      <div class="suggestionsBox" id="suggestions" style="display: none;">
        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
      </div>
<button class="btn btn-success btn-block btn-large" style="width:287px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</form>

<?php include('footer.php');?>
</body>
</html> 