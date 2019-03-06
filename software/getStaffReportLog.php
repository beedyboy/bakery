<?php

include_once('classes/functions.php');
$conn = Database::getInstance(); 

$srtype= $_GET['srtype'];
$srname= $_GET['param'];


echo "Sales Record for ". $srname;
?>
	 

<!--<a href='#' d1="<?php echo $_GET['d2']; ?>" d2="<?php echo $_GET['d2']; ?>" class='rpExportPDF'>-->
<a href="printStaffRpt.php?param=<?php echo $_GET['param']; ?>&srtype=<?php echo $_GET['srtype']; ?>" class='btn btn-warning'>
<i class="icon-print"></i> Print
</a>
		 

<table class="table table-striped table-bordered">
<tr>
 
 
<th>Date</th>
<th>invoice</th>
<th>Amount Gh&cent;</th>
<th>Status</th>
</tr>
<?php

if($srtype == "All"){  
 $query = $conn->db->prepare("SELECT  *  FROM  sales WHERE cashier = ?  ") ;
$query->execute(array($srname)); 

 for($i=0; $row = $query->fetch(); $i++){
 
 ?> 
<tr class="record">
 
 
<td> <?php echo $row['date']; ?> </td>
<td  class='viewSoldInvoice'> <?php echo $row['invoice_number']; ?> </td>
<td> <?php echo $row['amount']; ?> </td>
<td> <?php echo $row['status']; ?> </td>
 
 
</tr>

<?php
 
}
//All data ends up
 ?>
<tr>
			<th colspan="2" style="border-top:1px solid #800000"> Total: </th>
			<th colspan="1" style="border-top:1px solid #800000">Gh&cent; 
			<?php 
 $results = $conn->db->prepare("SELECT   sum(amount)  FROM  sales  WHERE cashier = ? ") ; 
$results->execute(array($srname)); 
 for($i=0; $rows = $results->fetch(); $i++){
$total=$rows['sum(amount)'];
echo System::formatMoney($total, true);
 }	 
				?>
			</th>
				 
		</tr>

<?php
}

elseif($srtype == "Today"){

$today = date("Y-m-d");
 
 $query = $conn->db->prepare("SELECT  *  FROM  sales   WHERE cashier = ?  AND  DATE(date) = ? ") ;
$query->execute(array( $srname, $today)); 

 for($i=0; $row = $query->fetch(); $i++){
 
 ?>
	

<tr class="record">
 
  
<td> <?php echo $row['date']; ?> </td>
<td  class='viewSoldInvoice'> <?php echo $row['invoice_number']; ?> </td>
<td> <?php echo $row['amount']; ?> </td>
<td> <?php echo $row['status']; ?> </td>
 
 
</tr>

<?php
 
}
//Today's data ends up
 
?>
<tr>
			<th colspan="2" style="border-top:1px solid #800000"> Total: </th>
			<th colspan="1" style="border-top:1px solid #800000">Gh&cent; 
			<?php 
 $results = $conn->db->prepare("SELECT   sum(amount)  FROM  sales   WHERE  cashier = ?  AND  DATE(date) = ? ") ; 
$results->execute(array( $srname, $today)); 
 for($i=0; $rows = $results->fetch(); $i++){
$total=$rows['sum(amount)'];
echo System::formatMoney($total, true);
 }	 
				?>
			</th>
				 
		</tr>

<?php
}
//Today type ends here

elseif($srtype == "Yearly"){
$year= $_GET['param2'];  
$srname= $_GET['param'];  
 
 $query = $conn->db->prepare("SELECT   *   FROM  sales   WHERE  YEAR(date) = :y AND  cashier = :c  ") ;
$query->execute(array(':y'=>$year,':c'=>$srname)); 

 for($i=0; $row = $query->fetch(); $i++){
 
 ?>
	

<tr class="record"> 
<td> <?php echo $row['date']; ?> </td>
<td  class='viewSoldInvoice'> <?php echo $row['invoice_number']; ?> </td>
<td> <?php echo $row['amount']; ?> </td>
<td> <?php echo $row['status']; ?> </td>
 
 
</tr>

<?php
 
}

?>
<tr>
			<th colspan="2" style="border-top:1px solid #800000"> Total: </th>
			<th colspan="1" style="border-top:1px solid #800000">Gh&cent; 
			<?php 
 $results = $conn->db->prepare("SELECT   sum(amount)  FROM  sales   WHERE  YEAR(date) = :y   AND  cashier = :c ") ; 
$results->execute(array(':y'=>$year,':c'=>$srname));
 for($i=0; $rows = $results->fetch(); $i++){
$total=$rows['sum(amount)'];
echo System::formatMoney($total, true);
 }	 
				?>
			</th>
				 
		</tr>

<?php
//yearly data ends up
 
}
//year type ends here
 
 
 
 
if($srtype == "Monthly"){
$srname= $_GET['param'];  
$year= $_GET['param2'];  
$month= $_GET['param3'];  
 
 $query = $conn->db->prepare("SELECT   *  FROM  sales   WHERE  YEAR(date) = :y AND  MONTH(date) = :m AND cashier = :c ") ;

$query->execute(array(':y'=>$year, ':m'=>$month,':c'=>$srname)); 


 for($i=0; $row = $query->fetch(); $i++){
 
 ?>
	

<tr class="record">
 
  
<td> <?php echo $row['date']; ?> </td>
<td  class='viewSoldInvoice'> <?php echo $row['invoice_number']; ?> </td>
<td> <?php echo $row['amount']; ?> </td>
<td> <?php echo $row['status']; ?> </td>
 
 
</tr>

<?php
 
}
?>
<tr>
			<th colspan="2" style="border-top:1px solid #999999"> Total: </th>
			<th colspan="1" style="border-top:1px solid #999999">Gh&cent; 
			<?php 
 $results = $conn->db->prepare("SELECT   sum(amount)  FROM  sales   WHERE  YEAR(date) = :y AND  MONTH(date) = :m AND cashier = :c ") ; 
$results->execute(array(':y'=>$year, ':m'=>$month,':c'=>$srname));
 for($i=0; $rows = $results->fetch(); $i++){
$total=$rows['sum(amount)'];
echo System::formatMoney($total, true);
 }	 
				?>
			</th>
				 
		</tr>

<?php
//monthly data ends up
 
}

?>
  </table>