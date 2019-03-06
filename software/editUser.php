<link href="dist/beedy_kaydee.css" media="screen" rel="stylesheet" type="text/css" /> <?php
include_once('classes/functions.php'); 
	$id=$_GET['id'];
	$result = System::loadTblCond('user','id', $id); 
	for($i=0; $row = $result->fetch(); $i++){
 
?>
  
	<form id="saveEditUser" > 
				
<center><h4><i class="icon-edit icon-large"></i> Edit User</h4></center>
<hr />
		
<input type="hidden" name="action" value="saveEditUser" />
<input type="hidden" name="id" value="<?php echo $id; ?>" />

	 
				<label>Full Name</label>
					<input type="text"  class="form-control" name="full_name" value="<?php echo $row['name']; ?>" placeholder="Full Name..." Required/>
                       <br />
					   
					   <label>Username </label>
					<input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>"  placeholder="Username..." Required>
							   
					<br />
			  
				 <label>Password </label>
					<input type="password" class="form-control" name="password" value="<?php echo $row['password']; ?>"  placeholder="********" >
							  
					<br />
				 <label>Position </label>
						<select name="position" class="custom-select form-control  mr-sm-2 mb-2 mb-sm-0" required>
<option value="">--Select One--</option>
<option <?php if($row['position']=="Admin"): echo "Selected"; endif; ?> value="Admin">Admin</option>
	<option <?php if($row['position']=="Manager"): echo "Selected"; endif; ?> value="Manager">Manager</option>
	<option <?php if($row['position']=="Cashier"): echo "Selected"; endif; ?> value="Cashier">Cashier</option>
	<option <?php if($row['position']=="Waiter"): echo "Selected"; endif; ?> value="Waiter">Waiter</option>
	<option <?php if($row['position']=="Local Kitchen"): echo "Selected"; endif; ?> value="Local Kitchen">Local Kitchen</option>
	 
 </select>
						<br />
				 <div style="float:right; margin-right:50px;">
				 	<button type="submit" class="btn btn-success btn-block btn-large pull-right"
							title="Click to Update Changes" style="width:267px;">
				<i class="icon icon-save icon-large"></i> Save Changes</button>
 
 </div>
 
				<div id="update-bottom" class="col-md-offset-1 col-md-11 alert hide"></div>
				 
		</form>
	 
<?php
}
 ?>
 
  <script src="public/js/jquery.min.js"></script> 
  <script src="js/beedy.js" type="text/javascript"></script>
   
   
    