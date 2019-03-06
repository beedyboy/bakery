
<?php include('header.php');?>
<body>
<?php include('navfixed.php');?>
	<?php
$position=$GetSession->position;
if($position=='cashier') {
$hide = 'hide';
 
} 
$active = "Users";
?>

  <?php include_once("side_bar.php"); ?>
	
	<main class="col-xl-10 col-lg-10 col-md-10 col-sm-9 ml-sm-auto  pt-3" role="main">
		
			<div class="container-fluid">
				
		 <div class="pageheader">
			<i class="icon_c icon_group"></i> User Management
		
		 		<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Users</li>
			</ul>
				</div>
		 
		 	<!--and main body here-->
	
<div class="col-sm-12 col-md-12" style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php" class="" >
	<button class="col-sm-3 col-md-2 btn btn-default btn-large smartColor" style="float: left;">
<i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
		<?php 
 
	$result =   System::loadUsersOrderBy();
	$rowcount = $result->rowcount();
							 			?>
 <div class="col-sm-9 col-md-10" style="text-align:center;">
			Total Number of Users: <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $rowcount;?>]</font>
			</div>
	  

</div>
	


<div class="col-sm-12 col-md-12">
<input type="text" class="col-sm-9 col-md-10"  name="filter" value="" id="filter" style="height:35px;" placeholder="Search User..." autocomplete="off" />
 
	<Button class="btn  col-sm-3 col-md-2 smartBtn addUser"  data-toggle="tooltip" title="Add New User" style="height:35px;" />
	<i class="icon-plus-sign icon-large"></i> Add User</button>

<br />
<br />
	</div>

<table class="table  table-responsive table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
	<tr>
			<th> Username</th>
			<th>Password</th>
			<th> Full Name </th>
			<th> Position </th> 
			<th> Action </th>
		</tr>
	</thead>
	
	<tbody class="userBody">
	</tbody>

</table>
	<div class="clearfix"></div>

 
	 
		
	
	<!--and it ends here-->
		
					</div>
		
				 </main>
				 
				</div>
				
				</section>
				

	 
	<!--/span-->
 
 <?php include('footer3.php'); ?>
</body>

</html>

     
 