<?php
			include_once('classes/functions.php');
	 	$result =   System::loadUsersOrderBy();
			while($row = $result->fetch())
	           {			?>
		          <tr class="del<?php echo $row['id']; ?>">
			<td hidden><?php echo $row['id']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><?php echo $row['name']; ?></td> 
			<td><?php echo $row['position']; ?></td> 
			<td>
			<input type="hidden" class="action<?php echo $row['id']; ?>"  name="action" value="deleteUser" />
  
<a class="editUser" title="Click to edit this user" id="<?php echo $row['id']; ?>"><button class="btn btn-warning"><i class="icon-edit"></i> </button> </a>
			<a href="#" fname="<?php echo $row['name']; ?>" id="<?php echo $row['id']; ?>" class="delUser" title="Click to Delete the user"><button class="btn btn-danger"><i class="icon-trash"></i></button></a></td>
			</tr>
			<?php
				}
			?> 
		 
	
 <script type="text/javascript"> 
 
$(function() {
  $('.delUser').click( function() {
var del_id = $(this).attr("id");
var firstName = $(this).attr("fname");
 
var action = $('.action'+del_id).val();
if(confirm("Confirm "+ firstName +" details to be deleted? There is NO undo!")){
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

