<?php
			include_once('classes/functions.php');
			
				$result = System::loadTotalProducts(); 
			  $pCount = $result->rowCount();
					if($pCount <1 ): echo "<tr><td colspan='5'>
					<center><strong>No Product at the moment</strong></center></td></tr>"; endif;
			for($i=0; $row = $result->fetch(); $i++){
				$total=$row['total'];
				$availableqty=$row['qty_left'];
	  $checks=System::getColById('products', 'product_id', $row['product_id'], 5);
 
			?>
		<tr  class="del<?php echo $row['product_id']; if($availableqty < 10 ): ?> "alert alert-warning record" style="color: #fff; background:rgb(255, 95, 66);" <?php endif; ?>">

			 <td><?php echo $row['product_name']; ?></td>
			  
			

			<td><?php
			$sprice=$row['selling_price'];
			echo System::formatMoney($sprice, true); 
			?>
			</td>
		 
			<td><?php echo System::formatMoney($sprice  , true); ?></td> 
			 <td><?php echo $row['qty_left']; ?></td>
			<td>
			<?php
			$total=$row['qty_left'] * ($row['selling_price']);
			echo System::formatMoney($total, true);
			?>
			</td>
			<?php if($GetSession->position=="Admin" || $GetSession->position=="Manager"): ?>
			<td>
			<input type="hidden" class="action<?php echo $row['product_id']; ?>"  name="action" value="deleteProduct" />
<input type="hidden"  class="name<?php echo $row['product_id']; ?>" value="<?php echo $row['product_name']; ?>" />

<a class="editproduct" title="Click to edit the product"  id="<?php echo $row['product_id']; ?>">
<button class="btn btn-warning"><i class="icon-edit"></i> </button> </a>
			
			<a href="#" id="<?php echo $row['product_id']; ?>" class="delProduct" title="Click to Delete the product"><button class="btn btn-danger"><i class="icon-trash"></i></button></a>
			</td> 
			<?php endif; ?>
			</tr>
			<?php
				}
			?>
		 
	
 <script type="text/javascript"> 
 
$(function() {
  $('.delProduct').click( function() {
var del_id = $(this).attr("id");
var firstName = $('.name'+del_id).val();
var action = $('.action'+del_id).val();
if(confirm("Confirm "+ firstName +" details to be deleted? There is NO undo!")){
$.ajax({
type: "POST",
url: "delete.php",
data: ({product_id: del_id,action: action}),
cache: false,
success: function(html){
alert(html);
$(".del"+del_id).fadeOut('slow');
}
});
}
else{
return false;}
});

});
</script>

