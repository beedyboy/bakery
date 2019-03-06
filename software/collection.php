
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
	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
		 
      <?php include_once("side_bar.php"); ?>    </div><!--/.well -->
        </div><!--/span-->
		
	<div class="span10">
	<div class="contentheader">
			<i class="icon-bar-chart"></i> Collection Report
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Collection Report</li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<button  style="float:right;" class="btn btn-success btn-mini"><a href="javascript:Clickheretoprint()"> Print</button></a>

</div>
<form action="collection.php" method="get">
<center><strong>From : <input type="text" style="width:223px; padding:8px;" name="d1" class="tcal" value="" /> To: <input type="text" style="width: 223px; padding:8px;" name="d2" class="tcal" value="" />
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
</strong></center>
</form>
<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
Collection Report from&nbsp;<?php echo $_GET['d1'] ?>&nbsp;to&nbsp;<?php echo $_GET['d2'] ?>
</div>

<table id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="17%"> Transaction ID </th>
			<th width="8%"> Date </th>
			<th width="25%"> Customer Name </th>
			<th width="25%"> Invoice Number </th>
			<th width="15%"> Amount </th>
			<th width="10%"> Remarks </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$result = System::ReportTCond('collection',$d1, $d2);
				 for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td>CTI-000<?php echo $row['transaction_id']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['invoice']; ?></td>
			<td><?php
			$dsdsd=$row['amount'];
			echo System::formatMoney($dsdsd, true);
			?></td>
			<td><?php echo $row['remarks']; ?></td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
	<thead>
		<tr>
			<th colspan="4" style="border-top:1px solid #999999"> Total </th>
			<th colspan="2" style="border-top:1px solid #999999"> 
			<?php
				 
				 $results=System:: ReportTSumCond('collection','amount', $d1,$d2);
				 for($i=0; $rows = $results->fetch(); $i++){
				$dsdsd=$rows['sum(amount)'];
				echo System::formatMoney($dsdsd, true);
				}
				?>
			</th>
		</tr>
	</thead>
</table>

</div>
<div class="clearfix"></div>
</div>
</div>
</div>

	
<?php include('footer.php'); ?>
</body>
</html>

	 