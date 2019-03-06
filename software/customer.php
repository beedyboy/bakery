
<?php include('header.php');?>

<?php include('navfixed.php');?>
	<?php
$position=$GetSession->position;
if($position=='cashier') {
$hide = 'hide'; 
} 
$active = "Customers";
?> 
	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">  <?php include_once("side_bar.php"); ?>    </div><!--/.well -->
        </div><!--/span--> 
<div class="span10">
	<div class="contentheader">
			<i class="icon-group"></i> Customers
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Customers</li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<?php 
			 
				$result = System::loadTblDescOrd('customer','customer_id'); 
				$rowcount = $result->rowcount();
			?>
			<div style="text-align:center;">
			Total Number of Customers: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
			</div>
</div>
<input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Search Customer..." autocomplete="off" />
<a rel="facebox" href="addcustomer.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Customer</button></a><br><br>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="9%"> Membership Id </th>
			<th width="17%"> Full Name </th>
			<th width="10%"> Address </th>
			<th width="10%"> Contact Number</th>
			<!--<th width="23%"> Product Name</th>
			<th width="9%"> Total </th>
			<th width="17%"> Note </th>-->
			<th width="14%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="del<?php echo $row['customer_id']; ?>">
						<td><?php echo $row['customer_id']; ?> </td>
			<td><?php echo $row['customer_name']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['contact']; ?></td>
			 

			<td>
			<input type="hidden" class="action<?php echo $row['customer_id']; ?>"  name="action" value="deleteCustomer" />
<input type="hidden"  class="name<?php echo $row['customer_id']; ?>" value="<?php echo $row['customer_name']; ?>" />
<a  title="Click To Edit Customer" rel="facebox" href="editcustomer.php?id=<?php echo $row['customer_id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> 
			<a href="#" id="<?php echo $row['customer_id']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>

		</div>
</div>
 <script type="text/javascript"> 
 
$(function() {
  $('.delbutton').click( function() {
var del_id = $(this).attr("id");
var firstName = $('.name'+del_id).val();
var action = $('.action'+del_id).val();
if(confirm("Confirm "+ firstName +" details to be deleted? There is NO undo!")){
$.ajax({
type: "POST",
url: "delete.php",
data: ({customer_id: del_id,action: action}),
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
