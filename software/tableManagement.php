 <?php 
 include_once('classes/functions.php');
	$result =   System::loadHallTbl();
	$rowcount = $result->rowcount();
	
					while($row = $result->fetch())
{			?>
			 	<tr class="del<?php echo $row['tid']; ?>">
				<td hidden><?php echo $row['tid']; ?></td> 
			<td><?php echo System::getColById('hall', 'id', $row['id'], 1); ?></td>  
			<td><?php echo $row['name']; ?></td>  
			<td>
			<input type="hidden" class="action<?php echo $row['tid']; ?>"  name="action" value="deleteTable" />
<input type="hidden"  class="name<?php echo $row['tid']; ?>" value="<?php echo $row['name']; ?>" />
<a class="editMapTable" title="Click to edit this table" href="#" id="<?php echo $row['tid']; ?>"><button class="btn btn-warning"><i class="icon-edit"></i> </button> </a>
			<a href="#" id="<?php echo $row['tid']; ?>" class="deltbl" title="Click to Delete the table"><button class="btn btn-danger"><i class="icon-trash"></i></button></a></td>
			</tr>
			<?php
				}
			?>
		
		 
 <script type="text/javascript"> 
 
$(function() {
 

  $('.deltbl').click( function() {
var del_id = $(this).attr("id");
var firstName = $('.name'+del_id).val();
var action = $('.action'+del_id).val();
if(confirm("Confirm table No "+ firstName +" to be deleted? There is NO undo!")){
$.ajax({
type: "POST",
url: "delete.php",
data: ({id: del_id,action: action}),
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