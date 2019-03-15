
<?php include('header.php');?>
<body>
<?php include('navfixed.php');?>
	<?php
$position=$GetSession->position;
if($position=='cashier') {
$hide = 'hide';
 
} 
$active = "Products";
?>

  <?php include_once("side_bar.php"); ?>
	
	<main class="col-xl-10 col-lg-10 col-md-10 col-sm-9 ml-sm-auto  pt-3" role="main">
		
			<div class="container-fluid">
				
		 <div class="pageheader">
			<i class="icon-table"></i> Products  
		
		 		<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Products</li>
			</ul>
				</div>
		 
		 	<!--and main body here-->
	
<div class="col-sm-12 col-md-12" style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php" class="" >
	<button class="col-sm-3 col-md-2 btn btn-default btn-large smartColor" style="float: left;">
<i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
		 	
	<?php 
 
	$result =   System::loadProductsOrderBy();
	$rowcount = $result->rowcount();
			 
				$result = System::loadProductsWhyQty();
				$rowcount123 = $result->rowcount();

			?>
				<div class="col-sm-9 col-md-10" style="text-align:center;">
			Total Number of Products:  <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $rowcount;?>]</font>
			<br />
			<font style="color:rgb(255, 95, 66);; font:bold 22px 'Aleo';">[<?php echo $rowcount123;?>]</font> Products are below QTY of 10 
			</div>

</div>
	


<div class="col-sm-12 col-md-12">
<input type="text" class="col-sm-9 col-md-10"  name="filter" value="" id="filter" style="height:35px;" placeholder="Search Product..." autocomplete="off" />

<!-- 
<a rel="facebox" href="addProduct.php"  class="col-sm-3 col-md-2 " href="#" data-toggle="tooltip" alt="Add Product" >
	<Button type="submit" class="btn btn-info" style="  height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Product</button>
</a> -->

	<Button class="btn  col-sm-3 col-md-2 smartBtn addproduct"  data-toggle="tooltip" title="Add New Product" style="height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Product</button>

<br />
<br />
	</div>

<table class="table  table-responsive table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr> 
			<th> Product Name </th>  
			<th> Selling Price Gh&cent;</th> 
			<th > Price Gh&cent;</th> 
			<th> Qty Left </th>
			<th> Total Gh&cent;</th>
			<?php if($GetSession->position=="Admin" || $GetSession->position=="Manager"): ?><th width="10%"> Action </th> <?php endif; ?>
		</tr>
	</thead>
	
	<tbody class="productBody">
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

