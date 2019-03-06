<?php
			include_once('classes/functions.php');
			
				$result =   System::loadSupplierOrderBy();
	$rowcount = $result->rowcount(); 
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="del<?php echo $row['supplier_id']; ?>">
			<td><?php echo $row['supplier_name']; ?></td>
			<td><?php echo $row['supplier_contact']; ?></td>
			<td><?php echo $row['supplier_address']; ?></td>
			<td><?php echo $row['contact_person']; ?></td>
			<td><?php echo $row['note']; ?></td>
			<td>
			<input type="hidden" class="action<?php echo $row['supplier_id']; ?>"  name="action" value="deleteSupplier" />
<input type="hidden"  class="name<?php echo $row['supplier_id']; ?>" name="AdminTitle" value="<?php echo $row['supplier_name']; ?>" />

<a class="editsupplier" href="#" id="<?php echo $row['supplier_id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a>
			<a href="#" id="<?php echo $row['supplier_id']; ?>" class="delSupplier" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
			</tr>
			<?php
				}
			?>
				 
		 
	
 <script type="text/javascript"> 
 
$(function() {
  $('.delSupplier').click( function() {
 var del_id = $(this).attr("id");
var firstName = $('.name'+del_id).val();
var action = $('.action'+del_id).val();
if(confirm("Confirm "+ firstName +" details to be deleted? There is NO undo!")){
$.ajax({
type: "POST",
url: "delete.php",
data: ({supplier_id: del_id,action: action}),
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

