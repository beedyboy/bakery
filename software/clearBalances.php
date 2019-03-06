<?php 
include_once('classes/functions.php');
$result =   System::loadDistinctKitchens();
	$rowcount = $result->rowcount();
?>   

	<form class="payAllBalances">
			  
				
<center><h4><i class="icon-plus-sign icon-large"></i> Clear Account</h4></center>
<hr />
			<input type="hidden" name="action" value="payAllBalances" />
			
				 
	 <span style="color:#D2322D; font-weight:bold;"><label for="rep_type"> Clear By Kitchen:</label></span>
		 <?php if(!empty($result)):  ?>
			 <br />
			 <label for="sr_rep_type"><input type="radio" class="sr_rep_type" name="kitchen" value="ALL"   /> All </label>
			 <br />
			 <?php while($hall =  $result->fetch()){ ?>	
			 <label for="sr_rep_type"><input type="radio" class="sr_rep_type" name="kitchen" value="<?php echo $hall['kitchen']; ?>"  /> <?php echo  $hall['kitchen']; ?></label> 
			  <br />
		<?php
		 } 
		endif; 
		?>		

				 
				
				<div id="add-bottom" style=" margin:10px 0 0;" class="col-md-offset-1 col-md-11 alert hide"></div>
				 <div style="float:right; margin-right:50px;">
				 
				<button class="btn btn-success btn-block btn-large pull-right" title="Click to Save" style="width:267px;">
					<i class="icon icon-save icon-large"></i> Save Transaction</button>
 </div>
  
		</form>
	
	
 <script src="js/beedy.js" type="text/javascript"></script>
  
   