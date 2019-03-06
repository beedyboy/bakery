<?php 
include_once('classes/functions.php'); 
?>   

	<form id="saveUser">
			  
				
<center><h4><i class="icon-plus-sign icon-large"></i> Add User</h4></center>
<hr />
			<input type="hidden" name="action" value="saveUser" />
			
				 
				<label>Full Name</label>
					<input type="text"  class="form-control" name="full_name" placeholder="Full Name..." Required/>
                       <br />
					   
					   <label>Username </label>
					<input type="text" class="form-control" name="username"  placeholder="Username..." Required>
							   
					<br />
			 
				 <label>Password </label>
					<input type="password" class="form-control" name="password"  placeholder="********" >
							  
					<br />
				 <label>Position </label>
						<select name="position" class="custom-select form-control  mr-sm-2 mb-2 mb-sm-0" required>
<option value="">--Select One--</option>
<option value="Admin">Admin</option>
<option value="Manager">Manager</option>
<option value="Cashier">Cashier</option> 
<option value="Waiter">Waiter</option> 
<option value="Local Kitchen">Local Kitchen</option> 
</select>
						<br />
				 
				
				<div id="add-bottom" style=" margin:10px 0 0;" class="col-md-offset-1 col-md-11 alert hide"></div>
				 <div style="float:right; margin-right:50px;">
				 
				<button class="btn btn-success btn-block btn-large pull-right" title="Click to Save" style="width:267px;">
					<i class="icon icon-save icon-large"></i> Save</button>
 </div>
  
		</form>
	
	
 <script src="js/beedy.js" type="text/javascript"></script>
  