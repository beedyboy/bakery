<?php 
include_once('classes/functions.php'); 
?>   

	<form id="saveProduct">
			  
				
<center><h4><i class="icon-plus-sign icon-large"></i> Add Product</h4></center>
<hr />
			<input type="hidden" name="action" value="saveProduct" />
			
			 

				<label>Product Name</label>
					<input type="text"  class="form-control" name="product_name" Required/>
                       <br />
					   
			 
				 
					<label>Selling Price </label>
					<input type="text" id="txt1" class="form-control" name="s_price" onkeyup="sum();" placeholder="Selling Price..." >
				 			   
					<br />
				 <label>Quantity </label>
					<input type="text" id="quantity" class="form-control" name="quantity"  placeholder="Quantity..." >
							  
					<br />
				
				<div id="add-bottom" style=" margin:10px 0 0;" class="col-md-offset-1 col-md-11 alert hide"></div>
				 <div style="float:right; margin-right:50px;">
				 
				<button class="btn btn-success btn-block btn-large pull-right" title="Click to Save" style="width:267px;">
					<i class="icon icon-save icon-large"></i> Save</button>
 </div>
  
		</form>
	
	
 <script src="js/beedy.js" type="text/javascript"></script>  
 
<script src="js/beedyScript.js" type="text/javascript"></script> 