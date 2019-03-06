
<?php include('header.php');?>
<body>
<?php include('navfixed.php');?>
	<?php
$position=$GetSession->position;
if($position=='cashier') {
$hide = 'hide';
 
} 
$active = "SalesReport";
?>

  <?php include_once("side_bar.php"); ?>
	
	<main class="col-xl-10 col-lg-10 col-md-10 col-sm-9 ml-sm-auto  pt-3" role="main">
		
			<div class="container-fluid">
				
		 <div class="pageheader">
			<i class="icon_c icon-bar-chart"></i> Sales Report
		
		 		<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Sales Report</li>
			</ul>
				</div>
		 
		 	<!--and main body here-->
	<div class="row" > 
<div class="col-sm-12 col-md-12" style="margin-top: -19px; margin-bottom: 21px;">
 <div class="col-sm-3 col-md-2 " >
<a  href="index.php" class="" >
	<button class=" btn btn-default btn-large smartColor" style="float: left;">
		<i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
	
</div>

		
		<div class="col-sm-12 col-md-12" style="text-align:center;">
		


<?php if(isset($_GET['d1'])  && !empty($_GET['d2'])):
		 ?>

		 <a href="printSalesRpt.php?d1=<?php echo $_GET['d1']; ?>&d2=<?php echo $_GET['d2']; ?>" class='btn btn-warning'>
<i class="icon-print"></i> Print
</a>
		 

 

<!--<a href='#' d1="<?php echo $_GET['d2']; ?>" d2="<?php echo $_GET['d2']; ?>" class='rpExportPDF'>-->
<a href="rpExportPDF.php?d1=<?php echo $_GET['d2']; ?>&d2=<?php echo $_GET['d2']; ?>" class='btn btn-warning'>
<i class="fas fa-file-pdf"></i> Export to PDF
</a>
		
		<a href="rpExportCSV.php?d1=<?php echo $_GET['d2']; ?>&d2=<?php echo $_GET['d2']; ?>" class='btn btn-primary'>
<i class="fas fa-file-excel"></i> Export to Excel
</a>
		
		<?php endif; ?>
		</div>
		
</div>
</div>

	<div class="row" > 
	<div class="col-sm-12 col-md-12" > 
 <div class="col-sm-9 col-md-10" style="text-align:center;">
		
<form action="salesreport.php" method="get">
<center><strong>From : <input type="text"   style="width:223px; height:30px; padding:8px;" name="d1" class="tcal" value="" /> 
To: <input type="text"   style="width: 223px; height:30px; padding:8px;" name="d2" class="tcal" value="" />
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
</strong></center>
</form>

				</div>
<center>Sales Report from&nbsp; <mark><?php echo $_GET['d1'] ?></mark>&nbsp;to&nbsp;<mark><?php echo $_GET['d2'] ?></mark>
</center>
	  </div>
	  </div>


	
<br />
<br />
 

<table class="table  table-responsive table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="10%"> Transaction ID </th>
			<th width="18%"> Cashier </th>
			<th width="14%"> Transaction Date </th> 
			<th width="14%"> Invoice Number </th>
			<th width="14%"> Amount Gh&cent; </th> 
			<th width="17%"> Status </th> 
			<th width="12%"> View Tax, NHIL, etc </th> 
		</tr>
	</thead>
	<tbody>
		
			<?php
				 $d1=$_GET['d1'];
				$d2=$_GET['d2'];
			
				 
				$result = System::salesReport($d1,$d2);  
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td>STI-00<?php echo $row['transaction_id']; ?></td>
			<td><?php echo $row['cashier']; ?></td> 
			<td><?php echo $row['date']; ?></td> 
			<td class='viewSoldInvoice'><?php echo $row['invoice_number']; ?></td>
			<td><?php
			$dsdsd=$row['amount'];
			echo System::formatMoney($dsdsd, true);
			?></td>
			 
			 <td><?php echo $row['status']; ?></td>
			 <td><button id="<?=$row['transaction_id']?>"	class="viewTax"  title="Click to view Tax, NHIL, and Level Fund"> 
			 <span class="btn btn-success"><i class="icon-search"></i></span>
			 </button> </td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
	<thead>
		<tr>
			<th colspan="4" style="border-top:1px solid #999999"> Total: </th>
			<th colspan="1" style="border-top:1px solid #999999">Gh&cent; 
			<?php 
				//$results = $db->prepare("SELECT sum(amount) FROM sales WHERE date BETWEEN :a AND :b");
				 
				$results=System::salesReportAmount($d1,$d2);
				for($i=0; $rows = $results->fetch(); $i++){
				$dsdsd=$rows['sum(amount)'];
				echo System::formatMoney($dsdsd, true);
				}
				?>
			</th>
				 
		</tr>
	</thead>
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

    