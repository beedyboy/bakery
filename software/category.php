
<?php include('header.php');?>

<?php include('navfixed.php');?>
	<?php
$position=$GetSession->position;
if($position=='cashier') {
$hide = 'hide';
 
} 
$active = "Category Management";
?> 
	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
		 
      <?php include_once("side_bar.php"); ?>    </div><!--/.well -->
        </div><!--/span-->
 	<div class="span10">
	<div class="contentheader">
			<i class="icon-group"></i> Category Management
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			 <li class="active">Category</li>
			</ul>


<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
		 
</div>	
<br /> 
 <br />
<input type="text"  name="filter" value="" style="height: 30px;" id="filter" placeholder="Search ..." autocomplete="off" />
	
	<?php 
 
	$result =   System::loadSubCategory();
	$rowcount = $result->rowcount();
							 			?>
		 
<a rel="facebox" href="addCategory.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Sub</button></a><br><br>
<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="25%">Main Category </th> 
			<th width="25%">Sub Category </th> 
			<th width="15%"> Action </th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = $result->fetch())
{			?>
			 	<tr class="del<?php echo $row['subId']; ?>">
				<td hidden><?php echo $row['subId']; ?></td> 
			<td><?php $m = $row['main'];
if($m=="C"): echo "Continental"; elseif($m=="L"): echo "Local Dishes"; elseif($m=="D"): echo "Drinks";
elseif($m=="S"): echo "Soup"; endif;
			?></td>  
			<td><?php echo $row['sub']; ?></td>  
			<td>
			<input type="hidden" class="action<?php echo $row['subId']; ?>"  name="action" value="deleteSubCat" />
<input type="hidden"  class="name<?php echo $row['subId']; ?>" value="<?php echo $row['sub']; ?>" />
<a rel="facebox" title="Click to edit this sub categoy" href="editSub.php?id=<?php echo $row['subId']; ?>"><button class="btn btn-warning"><i class="icon-edit"></i> </button> </a>
			<a href="#" id="<?php echo $row['subId']; ?>" class="delbutton" title="Click to Delete the sub categoy"><button class="btn btn-danger"><i class="icon-trash"></i></button></a></td>
			</tr>
			<?php
				}
			?>
		
		
		
	</tbody>
</table>
	
	         
	
	
	</div>
</div>
 <script type="text/javascript"> 
 
$(function() {
  $('.delbutton').click( function() {
var del_id = $(this).attr("id");
var firstName = $('.name'+del_id).val();
var action = $('.action'+del_id).val();
if(confirm("Confirm "+ firstName +" sub categoy to be deleted? There is No undo!")){
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

<?php include('footer.php'); ?>
</body>
</html>
