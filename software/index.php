
<?php include('header.php');?>
<body>
<?php include('navfixed.php');?>
	<?php
$position=$GetSession->position;
if($position=='cashier') {
$hide = 'hide';
 
} 
$active = "Dashboard";
?>

  <?php include_once("side_bar.php"); ?>
	
	<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
		
			<div class="container-fluid">
      <div class="row-fluid">
		 <div class="pageheader">
			<i class="icon_c icon-dashboard"></i> Dashboard  <?php //echo $GetSession->lastActivity; ?>
		
		 	<ul class="breadcrumb">
			<li class="active">Dashboard</li>
			</ul>
				</div>
		 <h2 class="display-2 text-center">	<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:#fff;">
		 <center><?php echo $GetSession->companyName; ?></center></font>
</h2>
		 	<!--and main body here-->
	<div class="span10">
	 
		<?php include_once ("top_nav.php"); ?>
</div>
	
	<!--and it ends here-->
		
		
		
				 </main>
				 
				</div>
				
				</section>
				

	 
	<!--/span-->
 

</body>
<?php include('footer.php'); ?>
</html>
