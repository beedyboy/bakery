<?php
 include_once('classes/functions.php'); 
?> 
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="saveCustomer" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Customer</h4></center>
<hr>
<input type="hidden" name="action" value="saveCustomer" />

<div id="ac">
<span>Full Name : </span><input type="text" style="width:215px; height:30px;" name="name" placeholder="Full Name" Required/><br>
<span>Address : </span><input type="text" style="width:215px; height:30px;" name="address" placeholder="Address"/><br>
<span>Contact : </span><input type="text" style="width:215px; height:30px;" name="contact" placeholder="Contact"/><br>
<!--<span>Product Name : </span><textarea style="height:70px; width:215px;" name="prod_name"></textarea><br>
<span>Total: </span><input type="text" style="width:215px; height:30px;" name="memno" placeholder="Total"/><br>
<span>Note : </span><textarea style="height:10px; width:215px;" name="note"></textarea><br>
<span>Expected Date: </span><input type="date" style="width:215px; height:30px;" name="date" placeholder="Date"/><br>-->
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:217px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
<br />

<div id="add-bottom" class="alert hide" style="margin:20px 0 0;"></div>
</div>
</form>

<?php include('footer.php');?>