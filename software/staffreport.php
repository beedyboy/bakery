
<?php include('header.php');?>
<body>
<?php include('navfixed.php');?>
	<?php
$position=$GetSession->position;
if($position=='cashier') {
$hide = 'hide';
 
} 
$active = "StaffReport";
?>

  <?php include_once("side_bar.php"); ?>
	
	<main class="col-xl-10 col-lg-10 col-md-10 col-sm-9 ml-sm-auto  pt-3" role="main">
		
			<div class="container-fluid">

				
		 <div class="pageheader">
			<i class="icon_c icon-bar-chart"></i> Staff Report
		
		 		<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Staff Report</li>
			</ul>
				</div>
		 
		
	  
					</div>
			
			<div class="row margin-padding-0">
		
		<!-- left side search -->		
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
	

<span>
<label for="CourseCat">Staff:</label></span>

<select class="form-control" id="srname" name="srname" required>
<option value="">Select One </option>
	<?php
	$query = System::loadUsersOrderBy();; 
	 

while($b = $query->fetch()){
	
	?>
	<option value="<?php echo $b['name']; ?>" ><?php echo $b['name']; ?></option>
	<?php
}
?>
 </select>
 

<span style="color:#D2322D; font-weight:bold;"><label for="rep_type"> View By:</label></span>
 <span><label for="sr_rep_type"><input type="radio" class="sr_rep_type" name="sr_rep_type" value="All"   /> All Time</label>
 <span><label for="sr_rep_type"><input type="radio" class="sr_rep_type" name="sr_rep_type" value="Today"   /> Today</label>
<label for="sr_rep_type"><input type="radio" class="sr_rep_type" name="sr_rep_type" value="Calendar"/> Calendar</label>
 

</span>
 	<br />
	
	
 <div id="srgroupView" style="border: 2px solid #5BD6FC;" class="display-0 margin-padding-0">

 
	<center>
		 
 
<input type="hidden" name="action" value="getReportLog" />
 
  
<span>
<label for="CourseCat">Year:</label></span>
<span id="srYearList">
<select class="form-control" name="sryear" required>
<option value="">Select Year First</option>
</select>
</span>
  
 <br />
 
<span>
<label for="CourseCat">Month:</label></span>
<span id="srMonthList">
<select class="form-control" name="srmonth" required>
<option value="">Select Year First</option>
</select>
</span>
  
 </center>
 
 </div>
 
 
 
 

</div>
 <!-- left side search ends up here -->	

 
<!-- right side search -->	
<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12" id="activate">
<h1 class='pageGuide'>Result Table</h1>	
<div id="resultViewer" class="resultViewer innerMain-left innerMain-right">
	Search sales report using the field on the left screen
		</div>
		
</div>

<!-- right side ends up here-->	

 
			</div>
				 </main>
				 	<!--and main body here-->
  
				</div>
				
				</section>
				

	 
	<!--/span-->
 
 <?php include('footer3.php'); ?>
</body>

</html>

    
<!--
<span>
<label for="CourseCat">From:</label></span>
 <input type="text"   style=" height:30px;" name="d1" class="tcal form-control" value="" readonly />
 
<span>
<label for="CourseCat">To:</label></span>
 <input type="text"   style="height:30px; " name="d2" class="tcal form-control" value="" readonly/>
<span style="color:#D2322D; font-weight:bold;"><label for="rep_type"> Time By:</label></span>
 <span><label for="rep_time_type"><input type="radio" class="rep_time_type" name="rep_time_type" value="Daily"   />Daily</label>
<label for="rep_type"><input type="radio" class="rep_time_type" name="rep_time_type" value="Weekly"/> Weekly</label>
<label for="rep_type"><input type="radio" class="rep_time_type" name="rep_time_type" value="Monthly"/> Monthly</label>

</span>
 -->
 