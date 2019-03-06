
<?php include('header.php');?>
<body>
<?php include('navfixed.php');?>
	<?php
$position=$GetSession->position;
if($position=='cashier') {
$hide = 'hide';
 
} 
$active = "Sales";
?>

  <?php include_once("side_bar.php"); ?>
	
	<main class="col-xl-10 col-lg-10 col-md-10 col-sm-9 ml-sm-auto  pt-3" role="main">
		
			<div class="container-fluid">
				
		 <div class="pageheader">
			<i class="icon_c icon-money"></i> Sales
		
		 		<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Local Kitchen</li>
			</ul>
				</div>
		 
		 	<!--and main body here-->
	
<div class="col-sm-12 col-md-12" style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php" class="" >
	<button class="col-sm-3 col-md-2 btn btn-default btn-large smartColor" style="float: left;">
<i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
		 

</div>
	
  
 
<div id="selector">
 <?php $loadMainCat = System::loadLocalDistincts(); ?> 

 <div id="smartCategory">
 
 <div id="productlist">
 <?php 
if(!empty($loadMainCat)): 
 
while($row=$loadMainCat->fetch() ){
 $main = $row['main'];
   
?>	

	<a rel="facebox" href="salesWindow.php?product_id=<?php echo $row['product_id'];?>&main=<?php echo $main; ?>&name=<?php echo $row['product_name']; ?>
		&invoice=<?php echo $_GET['invoice']; ?>">
		 <?php echo $row['product_name']; ?> - <?php echo $row['price']; ?> 
		</a>
	   
<?php
}
?>
 
<?php endif; ?> 	
	</div> 


	  
	</div> 

<br>
  
<input type="hidden" id="invoice" name="invoice" value="<?php echo $_GET['invoice']; ?>">

<br />
</div>


 <div class="smartProducts" id="smartProducts">
 
  <div id="smartCatProducts">
  
  
  
  </div>
			
			
			<div class="box" id="orderlist">
<table class="table  table-responsive table-bordered" id="resultTable" data-responsive="table">
	<thead>
		<tr>
		 	<th> Menu Name </th>
			 <th> Price </th>
			<th> Qty </th>
			<th> Amount </th>
			<th> Discount </th>
			<th> Action </th>
		</tr>
	</thead>
	<tbody class="kitchencartBody">
		
			 
		
	</tbody>
</table>
<div class="clearfix"></div>

</div>
<!-- orderlist ends up -->
 
	
		</div>
	<!--/smartProducts-->
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

 
  