<link href="dist/beedy_kaydee.css" media="screen" rel="stylesheet" type="text/css" /> 
<?php
include_once('classes/functions.php'); 
	$id=$_GET['id'];
	$result = System::loadTblCond('products','product_id', $id); 
	for($i=0; $row = $result->fetch(); $i++){
 
?>
  
	<form id="saveEditProduct" > 
				
<center><h4><i class="icon-edit icon-large"></i> Edit Product</h4></center>
<hr />
			
<input type="hidden" name="action" value="saveEditProduct" />
<input type="hidden" name="product_id" value="<?php echo $id; ?>" />

			  
				<label>Product Name</label>
					<input type="text"  class="form-control" name="product_name"  value="<?php echo $row['product_name']; ?>" required/>
                       <br />
				 
				</fieldset>
				 
					<label>Selling Price </label>
					<input type="text" id="txt1" class="form-control" name="selling_price" value="<?php echo $row['selling_price']; ?>" onkeyup="sum();" placeholder="Selling Price..."  >
							   
					<br />
				 
				 <label>Quantity Left </label>
					<input type="text" id="quantity" min="0" class="form-control" name="qty_left" value="<?php echo $row['qty_left']; ?>"  placeholder="Quantity..." >
							  
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