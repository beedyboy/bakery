<link href="dist/beedy_kaydee.css" media="screen" rel="stylesheet" type="text/css" /> <?php
include_once('classes/functions.php'); 
	$id=$_GET['id'];
		$result = System::loadTblCond('suppliers','supplier_id', $id);
	for($i=0; $row = $result->fetch(); $i++){
 
?>
  
	<form id="saveEditSupplier" > 
				
<center><h4><i class="icon-edit icon-large"></i> Edit Supplier</h4></center>
<hr />
		
<input type="hidden" name="action" value="saveEditSupplier" />
<input type="hidden" name="supplier_id" value="<?php echo $id; ?>" />	
<label>Supplier Name</label>
					<input type="text"  class="form-control" name="supplier_name" value="<?php echo $row['supplier_name']; ?>" placeholder="Supplier Name..." Required/>
                       <br />
					   
					   <label>Address </label>
					<input type="text" id="txt1" class="form-control" name="supplier_address"  value="<?php echo $row['supplier_address']; ?>"  placeholder="Address..." >
							   
					<br />
			   
				 <label>Contact Person </label>
					<input type="text" id="quantity" value="<?php echo $row['contact_person']; ?>" class="form-control" name="supplier_contact"  placeholder="Contact Person..." >
							  
					<br />
				 <label>Contact No </label>
					<input type="text" id="quantity" class="form-control" name="contact_person"  value="<?php echo $row['supplier_contact']; ?>" placeholder="Contact Number..." >
					<br />
				 <label>Note </label>
				 
					<textarea style="width:215px; height:80px;" class="form-control" name="note" id="note"  placeholder="Note..." /><?php echo $row['note']; ?></textarea>		  
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
   