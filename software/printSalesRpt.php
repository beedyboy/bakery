<?php include('header.php');?>
 
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
	    </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
		 
 
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,widtd=800, height=400, left=100, top=15"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="widtd: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script> 
  
<div class="content" id="content"> 
<div class="content" id="content"> 

 Sales Report from&nbsp; <mark><?php echo $_GET['d1'] ?></mark>&nbsp;to&nbsp;<mark><?php echo $_GET['d2'] ?></mark> 
 <hr />

 <br />
 

<table class="table table-striped table-bordered">
	<thead>
		<tr>  
			<th > Invoice Number </th>
			<th > Amount Gh&cent; </th>  
			<th > Vat Gh&cent; </th>  
			<th > Nhil Gh&cent; </th>  
			<th > Levy Fund Gh&cent; </th>  
				</tr>
	</thead>
	<tbody>
		
			<?php
				 $d1=$_GET['d1'];
				$d2=$_GET['d2'];
			
				 $vat = 0;
				$result = System::salesReport($d1,$d2);  
				for($i=0; $row = $result->fetch(); $i++){
					$vat += $row['vat'];
					$nhil += $row['nhil'];
					$fund += $row['fund'];
			?>
			<tr class="record">
			  
			<td class='viewSoldInvoice'><?php echo $row['invoice_number']; ?></td>
			<td><?php
			$dsdsd=$row['amount'];
			echo System::formatMoney($dsdsd, true);
			?></td>
			 
			 <td><?php
			$dsdsd=$row['vat'];
			echo System::formatMoney($dsdsd, true);
			?></td>
			 
			 <td><?php
			$dsdsd=$row['nhil'];
			echo System::formatMoney($dsdsd, true);
			?></td>
			 
			 <td><?php
			$dsdsd=$row['fund'];
			echo System::formatMoney($dsdsd, true);
			?></td>
			 
			 
			</tr>
			<?php
				}
			?>
		
	</tbody>
	<thead>
		<tr class="text text-info">
			<th style="border-top:1px solid #999999"> Total: </th>
			<th  style="border-top:1px solid #999999">Gh&cent; 
			<?php 
				//$results = $db->prepare("SELECT sum(amount) FROM sales WHERE date BETWEEN :a AND :b");
				 
				$results=System::salesReportAmount($d1,$d2);
				for($i=0; $rows = $results->fetch(); $i++){
				$dsdsd=$rows['sum(amount)'];
				echo System::formatMoney($dsdsd, true);
				}
				?>
			</th>
			<th  style="border-top:1px solid #999999">Gh&cent; 
			<?php 
		 
				echo System::formatMoney($vat, true);
				 
				?>
			</th>
			<th  style="border-top:1px solid #999999">Gh&cent; 
			<?=System::formatMoney($nhil, true); ?>
			</th>
			<th  style="border-top:1px solid #999999">Gh&cent; 
			<?=System::formatMoney($fund, true); ?>
			</th>
				 
		</tr>
	</thead>
</table>
	<div class="clearfix"></div>

	 					 
					 
	</div>
	
	
	</div>
	</div>
	</div>
	
 

<div class="pull-right" style="margin-right:100px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
		</div>	
		
</div>
</div>


