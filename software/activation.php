
<?php include('header.php');?>
<body>
<?php include('navfixed.php');?>
	<?php
$position=$GetSession->position;
if($position=='cashier') {
$hide = 'hide';
 
} 
$active = "Activation Window";
?>

  <?php include_once("side_bar.php"); ?>
	
	<main class="col-xl-10 col-lg-10 col-md-10 col-sm-9 ml-sm-auto  pt-3" role="main">
		
			<div class="container-fluid">
				
		 <div class="pageheader">
			<i class="icon_c icon-key"></i> Activation Window
		
		 		<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Activation</li>
			</ul>
				</div>
		 
		 	<!--and main body here-->
	
<div class="col-sm-12 col-md-12" style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php" class="" >
	<button class="col-sm-3 col-md-2 btn btn-default btn-large smartColor" style="float: left;">
<i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
	 

</div>
	


<div class="col-sm-12 col-md-12">
 
 <a rel="facebox" href="licenceKey.php">
 <Button type="submit" class="btn btn-info" style="float:left; width:230px; height:35px;" />
 <i class="icon-plus-sign icon-large"></i> Insert License Key</button></a> 
 
 <a rel="facebox" href="systemWindow.php">
 <Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" />
 <i class="icon-plus-sign icon-large"></i> Renew License</button></a><br><br>
 
 
<br />
<br />
	</div>
  <div class="col-md-10">

 <h1>SMARTSHOPPER POINT OF SALES SYSTEM</h1>
 <hr />
 <?php $systemWindow =System::loadTable('systemWindow');
while($det = $systemWindow->fetch(PDO::FETCH_ASSOC)){
$code1 = $det['code1'];
$code2 = $det['code2'];
$codeKey = $det['codekey'];
$active = $det['active']; 
}
if($codeKey !="beedy"):
 ?>
 <table class="table table-bordered">
 <tr>
 <th>Serial Number</th> <td ><span class="btn btn-danger">  <?php echo $code1; ?> </span> </td>
 </tr>
  
  <tr>
 <th>Mode</th> <td class="text-success"><span class="btn btn-success"> <?php echo $active;  ?></span></td>
 </tr>


 </table> 
<br > <br/>
<?php
endif;
?>
 <table class="table table-striped">
 <tr>
 <th>Licensed to</th> <td ><span class="badge ">  <?php print _COMPANY_NAME_; ?> </span> </td>
 </tr>

  <tr>
 <th>Expiry Date</th> <td class="badge">  <?php print date('l jS F (Y-m-d)', strtotime(dateTo)); ?> 
  
 </td>
 </tr>

  <tr>
 <th>Day(s) Left</th> <td> <span class="badge"><?php if(bdLast > 0 ): print bdLast; else: echo 0; endif;  
 
 ?></span>  </td>
 </tr>
  <tr>
 <th>Status</th> <td  class="btn alert <?php  if(bdLast >= 0): echo " alert-success"; 
 else: echo " alert-danger"; endif; ?>"> <?php  if(bdLast >= 0): echo "Active"; else: echo "Expired"; endif;   ?>
 
 </tr>


 </table>
 
 </div>
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

     
  