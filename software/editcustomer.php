<?php
	include('auth.php');
	$id=$_GET['id'];
	$result = System::loadTblCond('customer','customer_id', $id);  
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="saveEditCustomer">
<center><h4><i class="icon-edit icon-large"></i> Edit Customer</h4></center>
<hr>
<div id="ac"> 
<input type="hidden" name="action" value="saveEditCustomer" />
<input type="hidden" name="customer_id" value="<?php echo $id; ?>" />
<span>Full Name : </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['customer_name']; ?>" /><br>
<span>Address : </span><input type="text" style="width:265px; height:30px;" name="address" value="<?php echo $row['address']; ?>" /><br>
<span>Contact : </span><input type="text" style="width:265px; height:30px;" name="contact" value="<?php echo $row['contact']; ?>" /><br>
 <div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
<br />
<div id="update-bottom" class="alert hide" style="margin:20px 0 0;"></div>

</div>
</form>
<?php
}
 include('footer.php');?>