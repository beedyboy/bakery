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
	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
		 
      <?php include_once("side_bar.php"); ?>    </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
		 
<div style="margin-top: -19px; margin-bottom: 21px;">
<a href="sales.php?invoice=<?php echo $finalcode ?>"><button class="btn btn-default"><i class="icon-arrow-left"></i> Back to Sales</button></a>
</div>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,widtd=800, height=400, left=100, top=25"; 
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
  
<?php
include_once('classes/functions.php');
			 
$conn = Database::getInstance();


$a  =  $_GET['d1'];

  $b =  $_GET['d2'];

  $checker = "Total";

 if( isset($_GET['checker'])):
 	$checker = $_GET['checker'];

 endif;

  $sales_order = array(); 
  $price_order = array(); 
 ?>


	 
<table class="table  table-responsive table-bordered" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
		 
			<th  > Product Name </th> 
			<th > Quantity Sold </th> 
			<th>Amount </th>
		<th > Quantity Left </th> 
		</tr>
	</thead>
	
<?php

$select = $conn->db->prepare("SELECT *  FROM sales  WHERE date >= :a AND date <= :b");
$select->execute(array(':a'=>$a,':b'=>$b));

$invoice_list  = $select->fetchAll();


foreach($invoice_list as $LIST):
//loop through each and get product id
//System::getColById($tbl, $col, $id, $return);
//
//
$select2 = $conn->db->prepare("SELECT *  FROM sales_order  WHERE invoice = ?");
$select2->execute(array($LIST['invoice_number']));

while($srow = $select2->fetch()){


if(array_key_exists( $srow['product_id'] , $sales_order) ):

$sales_order[ $srow['product_id']] += $srow['qty'];
$price_order[ $srow['product_id']] += $srow['amount'];


else:
	$sales_order[ $srow['product_id']]  =  $srow['qty'];
$price_order[ $srow['product_id']]  = $srow['amount'];

	endif;
	
 

  ?>


<span><?php // echo $LIST['invoice_number']; ?></span>
 
<?php

}
endforeach;
  ?>



<tbody>


<?php 
$total_qty = '';
$total_amount = 0;

foreach($sales_order as $key => $val){
$p =  System::getColById('products', 'product_id', $key, 1) ;
$main =  System::getColById('products', 'product_id', $key, 4);

if($main != $checker AND $checker =="Total"):
$total_qty += $val;
$total_amount+=$price_order[$key];
	?>
	  
<tr>
<td> <?php echo $p ; ?></td>

<td> <?php echo $val; ?></td>


<td> <?php echo $price_order[$key]; ?></td>
<td> <?php echo  System::getColById('products', 'product_id', $key, 3);?></td>



</tr>

<?php

elseif($main == $checker ):

$total_amount+=$price_order[$key];
	$total_qty += $val;
	
	//echo $checker;
	 
?>
<tr>
<td> <?php echo $p ; ?></td>

<td> <?php echo $val; ?></td>

<td> <?php echo $price_order[$key]; ?></td>

<td> <?php echo  System::getColById('products', 'product_id', $key, 3);?></td>



</tr>


<?php

endif;

}

?>



<tr>
<td></td>
<td >Total Quantity: <span class=" ">

<?php echo $total_qty; ?>

  </span> 
   </td><td >Total Amount: <span class=" ">

<?php echo $total_amount; ?>

  </span> 
   </td>
</tr>

</tbody>

</table>




</tbody>

</table>

	</div>
	
 

<div class="pull-right" style="margin-right:100px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
		</div>	
		
</div>
</div>


