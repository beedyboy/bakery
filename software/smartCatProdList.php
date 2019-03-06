<?php
include_once('classes/functions.php'); 
 $main =$m = $_GET['main']; 
?>

 <input type="hidden" id="main" name="main" value="<?php echo  $main;?>" >
  <input type="hidden" id="date" value="<?php echo date("m/d/y"); ?>" />
 
 <div id="productlists">
 <table class="  table-responsive " style="margin: 30px; 	padding:7px;"  >
	<thead>
		<tr>
		 	 
		 <th> Menu Name </th>
		 
			<th> Qty </th>
			 
		</tr>
	</thead>
	<tbody>
		
	
	<?php 
	$result =   System::loadAllProductsWhere($main);
	
	if($main == "C"):
	
	while( $cRow = $result->fetch()){
	?>	
		<tr>
		<td width="20px"> <label class="form-check-label">
		<input type="checkbox"  class="form-check-input" name="menu[]"  value="<?php echo $cRow['product_id'];?>">
		<?php echo $cRow['product_name']; ?> </label></td>
		 
		<td> <div class="col-2">  <input type="number" name="quantity" size="2" maxlength="2" class="form-control"> </div> </td>
		
	</tr>
		<?php
	}
	// Continental headed up there
	
	elseif($main == "D"):
	while( $dRow = $result->fetch()){
	?>	
		<tr>
		<td width="20px"> <label class="form-check-label">
		<input type="checkbox"  class="form-check-input dmenu" name="dmenu[]"  id="dmenu<?php echo $dRow['product_id'];?>"  value="<?php echo $dRow['product_id'];?>">
		<?php echo $dRow['product_name']; ?> </label></td>
		 
		<td> <div class="col-2">  <input type="number" name="quantity"  id="dmenu<?php echo $dRow['product_id'];?>qty" size="2" maxlength="2" value="1" class="form-control"> </div> </td>
		
	</tr>
		<?php
	}
	 
	// Bar drinks ends up  here
	
	// local dishes can follow
	
		elseif($main == "L"):
	while( $LRow = $result->fetch()){
	?>	
		<tr>
		<td width="20px"> <label class="form-check-label">
		<input type="checkbox"  class="form-check-input" name="menu[]" value="<?php echo $LRow['product_id'];?>">
		<?php echo $LRow['product_name']; ?> </label></td>
		 
		<td> <div class="col-2">  <input type="number" name="quantity" size="2" maxlength="2" class="form-control"> </div> </td>
		
	</tr>
		<?php
	}
	
endif;
 ?>
</tbody>
 
 </table>
		</div>	  
		
		 <script src="js/beedy.js" type="text/javascript"></script>  