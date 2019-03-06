
<?php include('header.php');?>

<link href="../pos.css" rel="stylesheet" type="text/css" />
<body>
<?php include('navfixed.php');?>
	<?php
$position=$GetSession->position;
if($position=='cashier') {
$hide = 'hide';
 
} 
$active = "GeneralSettings";
?>
  <?php include_once("side_bar.php"); ?>
	
	<main class="col-xl-10 col-lg-10 col-md-10 col-sm-9 ml-sm-auto  pt-3" role="main">
		
			<div class="container-fluid">
				
		 <div class="pageheader">
			<i class="icon_c icon_cog"></i> General Settings
		
		 		<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Settings</li>
			</ul>
				</div>
		 
		 	<!--and main body here-->
	
<div class="col-sm-12 col-md-12" style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php" class="" >
	<button class="col-sm-3 col-md-2 btn btn-default btn-large smartColor" style="float: left;">
<i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
	 
	  

</div>
	

   <div class="col-sm-12 col-md-12">
		
  
		 
<!-- food categories follows -->
<div class="bd-tab-container gs">
	

		<!-- tab links-->
		<ul class="bd-tab">
			
	 
 
<li class="bd-tab-link "> 
			<a href="#" id="C"  class=""> 
	Discount Settings
</a></li>
	
<li class="bd-tab-link "> 
			<a href="#" id="C"  class=""> 
	Restaurant Profile
</a></li>
			
		</ul>
	
	
			
		<div class="bd-tab-content">
			

			 
	

			<!-- discount tab panel starts down here -->
			<div class="bd-tab-panel " data-index="1">
<div class="discount_fetcher">
	
</div>		
						</div> 
			
<!-- restaurant profile starts down here -->
			<div class="bd-tab-panel active" data-index="2">
 	<?php

$loadSystem = System::loadTbl('system');  
$i = 0;
foreach($loadSystem as $Data):
$i++;
$companyName= $Data['companyName'];
$address= $Data['address'];
$CompanyEmail= $Data['CompanyEmail']; 
$CompanyPhoneNum= $Data['CompanyPhoneNum']; 
endforeach; 
?>
							<table class="table  table-responsive table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
 <form id="updateRestaurant">
			  
				
<center><h4><i class="icon-plus-sign icon-large"></i> Restaurant Profile</h4></center>
<hr />
			<input type="hidden" name="action" value="updateRestaurant" />
			
		<tr> 
			<th> Organization Name </th> 
<td> <input type="text" name="companyName" class="form-control" value="<?php echo $companyName; ?>" required> </td> 

			</tr>
			<tr>
			<th> Address</th>
			<td>  <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" required></td>
		
			</tr>
			<tr>
			<th> Telephone No</th> 
			<td>  <input type="text" name="CompanyPhoneNum"  class="form-control" value="<?php echo $CompanyPhoneNum; ?>" required> </td> 
			
			</tr>

			<th > Email Address</th>
			 	<td > <input type="email" multiple="multiple" name="CompanyEmail" class="form-control" value="<?php echo $CompanyEmail; ?>" ></td>
		</tr>
 
	<tr>
	<td colspan="2">
	 	<div id="add-bottom" style=" margin:10px 0 0;" class="col-md-offset-1 col-md-11 alert hide"></div>
				 <div style="float:right; margin-right:50px;">
				 
				<button class="btn btn-success btn-block btn-large pull-right" title="Click to Save" style="width:267px;">
					<i class="icon icon-save icon-large"></i> Save Changes</button>
 </div>
  
  </td>
  </tr>
		</form>
	

</table>

						</div> 
			

	<!-- content ends here-->
		</div>
</div>
	<!-- container ends up here-->
		
		
		 	</div>
			
		 		</div>
			
			 
		<div class="clearfix"></div>

 
	 
		
	
	<!--and it ends here-->
		 
		
				 </main>
				 
				</div>
				
				</section>
				

	 
	<!--/span-->
 
 <?php include('footer3.php'); ?>
</body>

</html>

    