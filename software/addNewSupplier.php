<?php 
include_once('classes/functions.php'); 
?>   

	<form id="saveSupplier">
			  
				
<center><h4><i class="icon-plus-sign icon-large"></i> Add Supplier</h4></center>
<hr />
			<input type="hidden" name="action" value="saveSupplier" />
			
				 
				<label>Supplier Name</label>
					<input type="text"  class="form-control" name="supplier_name" placeholder="Supplier Name..." Required/>
                       <br />
					   
					   <label>Address </label>
					<input type="text" id="txt1" class="form-control" name="supplier_address"  placeholder="Address..." >
							   
					<br />
			 
				 <label>Contact Person </label>
					<input type="text" id="quantity" class="form-control" name="supplier_contact"  placeholder="Contact Person..." >
							  
					<br />
				 <label>Contact No </label>
					<input type="text" id="quantity" class="form-control" name="contact_person"  placeholder="Contact Number..." >
					<br />
				 <label>Note </label>
				 
					<textarea style="width:215px; height:80px;" class="form-control" name="note" id="note"  placeholder="Note..." /></textarea>		  
					<br />
				
				<div id="add-bottom" style=" margin:10px 0 0;" class="col-md-offset-1 col-md-11 alert hide"></div>
				 <div style="float:right; margin-right:50px;">
				 
				<button class="btn btn-success btn-block btn-large pull-right" title="Click to Save" style="width:267px;">
					<i class="icon icon-save icon-large"></i> Save</button>
 </div>
  
		</form>
	
	
 <script src="js/beedy.js" type="text/javascript"></script>
   