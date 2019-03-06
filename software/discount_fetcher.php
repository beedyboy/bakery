		 <?php
 
include_once('classes/functions.php');

$conn = Database::getInstance();

$query = $conn->db->prepare("SELECT   *   FROM   discount_settings  ") ;
$query->execute(); 

 for($i=0; $row = $query->fetch(); $i++){
		$value = $row['value'];
		$status = $row['status'];
		
	}
		
 ?>
	<table class="tables">
				
				<tr>
					<td> <label> Enable Discount: </label> </td>
				<td><label class="switch"> 
   
   <input type="checkbox" name="showsorting"   <?php if($status=="YES"): echo "Checked"; endif; ?> id="showDiscount">
   <div class="slider round">  </div>
	 </label>
 		   </td>
					
				</tr>
				<!--
				<tr>
					<td><label>Percentage (%): </label></td>
					<td> 			<input type="text" style="width:215px; height:30px;"  id="dPerc" value="<?php echo $value; ?>" /><br>
 </td>
				</tr>
				-->
				<tr>
					<td colspan="2" class="pull-right">
						<button class="btn btn-success activateDiscount"><i class="icon icon-save"></i>Save</button></td>
				</tr>
				
			</table>