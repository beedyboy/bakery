
<?php include('header.php');?>
<body>
<?php include('navfixed.php');?>
	 
</div>
 <input type="hidden" id="invoice" name="invoice" value="<?php echo $_GET['invoice']; ?>">
<div class="row">
	<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 bg-danger  margin-padding-0">
		
<?php include('side_bar.php'); ?>
		
		</div>
	
	<!-- main body div --> 
	<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10" style="margin-left: 0; margin-right: 0; margin-top: -2.8rem; padding:0;"> 
 <!-- new row here -->
 <div class="row  margin-padding-0"> 

<!-- body header here -->
<div class= "col-xl-12 col-lg-12 col-md-12 col-sm-12 margin-padding-0">
		
 <div class="pageheader " style="margin: 0px; padding-right:0px;">
			<i class="icon_c icon-money"></i> Sales 
		 		<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Sales</li>
			<li class="pull-right"> <a  href="index.php" class="linkback" >
	<button class="col-sm-3 col-md-2 btn btn-default btn-large smartColor">
<i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>	
	</li>
				 </ul>
		 	</div>
 <!-- page header ends up -->
		 	</div>
		 <!-- body header ends up -->
		 
	
		 
		
	<!-- sales category goes here -->
	<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 margin-padding-0">
 
 <div  style="margin-left: 20px; margin-right: 6px;  border:1px solid #000; border-radius:20px; background:#FFFFCC;
 box-shadow:0 3px 3px 2px #484848;
	-moz-box-shadow:0 2px 3px 2px #484848;
	-webkit-box-shadow:0 2px 3px 2px #484848;"> 
		 
		 <div id="smartCategory">
  
<a href="#" id="C"  class="smartContinental"> 
	Continental
</a>

<a href="#" id="L"  class="smartCategory"> 
	Local Dishes
</a>

<a href="#" id="D"  class="smartCategory"> 
	Bar
</a>
	 
 	
	</div>
		 <!-- smartCategory ends up here -->
			
	  <div id="smartCatProducts">
  
   
  
  </div>
		<!-- smartCatProducts ends  up here -->
		
</div>
		</div>
	
	<!-- sales category ends up -->
	<!-- cart should follows -->
	
	
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 bg-danger  margin-padding-0" >
		
		<table class=" table-responsive table-bordered " id="" data-responsive="table"  >
	<thead>
		<tr>
		 	<th> Menu Name </th>
			 <th> Price </th>
			<th> Qty </th>
			<th> Amount </th>
<!--			<th> Discount </th>-->
			<th> Action </th>
		</tr>
	</thead>
	<tbody class="cartBody">
		
			 
		
	</tbody>
</table>

		
		
	</div>
	
	 <!-- cart ends up here -->


</div>
<!-- new row ends up -->
	</div>
		<!-- main body div ends up here --> 
	
	
</div>
	<!-- row ends up -->
	
</section> 
<!-- end of section -->

		
<script type="text/javascript"> 
 
$(function() {
  $('.smartCategory').click( function() {
var del_id = $(this).attr("id"); 
getMyCatFood(del_id);
});
  
  //smartContinental
    $('.smartContinental').click( function() {
var del_id = $(this).attr("id"); 
getContinentalFood(del_id);
});

});
</script>  
 <?php include('footer3.php'); ?>
</body>

</html>

     