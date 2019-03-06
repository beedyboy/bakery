<?php

include_once('classes/functions.php');
$conn = Database::getInstance(); 

$rtype= $_GET['rtype'];

?>

<table class="table table-striped table-bordered">
<tr>
 
<th>Sales By</th>
<th>Date</th>
<th>invoice</th>
<th>Amount Gh&cent;</th>
<th>Status</th>
</tr>
<?php

if($rtype == "All"){  
 $query = $conn->db->prepare("SELECT   *   FROM  sales  ") ;
$query->execute(); 

 for($i=0; $row = $query->fetch(); $i++){
 
 ?> 
<tr class="record">
 
 
<td> <?php echo $row['cashier']; ?> </td>
<td> <?php echo $row['date']; ?> </td>
<td class='viewSoldInvoice'> <?php echo $row['invoice_number']; ?> </td>
<td> <?php echo $row['amount']; ?> </td>
<td> <?php echo $row['status']; ?> </td>
 
 
</tr>

<?php
 
}
//All data ends up
 ?>
<tr>
			<th colspan="3" style="border-top:1px solid #800000"> Total: </th>
			<th colspan="1" style="border-top:1px solid #800000">Gh&cent; 
			<?php 
 $results = $conn->db->prepare("SELECT   sum(amount)  FROM  sales ") ; 
$results->execute(); 
 for($i=0; $rows = $results->fetch(); $i++){
$total=$rows['sum(amount)'];
echo System::formatMoney($total, true);
 }	 
				?>
			</th>
				 
		</tr>

<?php
}

elseif($rtype == "Today"){

$today = date("Y-m-d");
 
 $query = $conn->db->prepare("SELECT  *  FROM  sales   WHERE  DATE(date) = ?  ") ;
$query->execute(array($today)); 

 for($i=0; $row = $query->fetch(); $i++){
 
 ?>
	

<tr class="record">
 
 
 
<td> <?php echo $row['cashier']; ?> </td>
<td> <?php echo $row['date']; ?> </td>
<td  class='viewOthSoldInvoice'> <?php echo $row['invoice_number']; ?> </td>
<td> <?php echo $row['amount']; ?> </td>
<td> <?php echo $row['status']; ?> </td>
 
 
</tr>

<?php
 
}
//Today's data ends up
 
?>
<tr>
			<th colspan="3" style="border-top:1px solid #800000"> Total: </th>
			<th colspan="1" style="border-top:1px solid #800000">Gh&cent; 
			<?php 
 $results = $conn->db->prepare("SELECT   sum(amount)  FROM  sales   WHERE  DATE(date) = ?") ; 
$results->execute(array($today)); 
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

elseif($rtype == "Yearly"){
$year= $_GET['param'];  
 
 $query = $conn->db->prepare("SELECT   *   FROM  sales   WHERE  YEAR(date) = :y  ") ;
$query->execute(array(':y'=>$year)); 

 for($i=0; $row = $query->fetch(); $i++){
 
 ?>
	

<tr class="record">
 
 
<td> <?php echo $row['cashier']; ?> </td>
<td> <?php echo $row['date']; ?> </td>
<td> <?php echo $row['invoice_number']; ?> </td>
<td> <?php echo $row['amount']; ?> </td>
<td> <?php echo $row['status']; ?> </td>
 
 
</tr>

<?php
 
}

?>
<tr>
			<th colspan="3" style="border-top:1px solid #800000"> Total: </th>
			<th colspan="1" style="border-top:1px solid #800000">Gh&cent; 
			<?php 
 $results = $conn->db->prepare("SELECT   sum(amount)  FROM  sales   WHERE  YEAR(date) = :y  ") ; 
$results->execute(array(':y'=>$year));
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
 
 
 
 
if($rtype == "Monthly"){
$year= $_GET['param'];  
$month= $_GET['param2'];  
 
 $query = $conn->db->prepare("SELECT   *  FROM  sales   WHERE  YEAR(date) = :y AND  MONTH(date) = :m  ") ;

$query->execute(array(':y'=>$year, ':m'=>$month)); 


 for($i=0; $row = $query->fetch(); $i++){
 
 ?>
	

<tr class="record">
 
 
<td> <?php echo $row['cashier']; ?> </td>
<td> <?php echo $row['date']; ?> </td>
<td> <?php echo $row['invoice_number']; ?> </td>
<td> <?php echo $row['amount']; ?> </td>
<td> <?php echo $row['status']; ?> </td>
 
 
</tr>

<?php
 
}
?>
<tr>
			<th colspan="3" style="border-top:1px solid #999999"> Total: </th>
			<th colspan="1" style="border-top:1px solid #999999">Gh&cent; 
			<?php 
 $results = $conn->db->prepare("SELECT   sum(amount)  FROM  sales   WHERE  YEAR(date) = :y AND  MONTH(date) = :m  ") ; 
$results->execute(array(':y'=>$year, ':m'=>$month));
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