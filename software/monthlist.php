<?php
 
include_once('classes/functions.php');  
	
	
	$conn = Database::getInstance(); 
	$query = $conn->db->prepare("SELECT    DISTINCT MONTH(date) as date
    FROM  sales  WHERE YEAR(date) = ? ") ;
$query->execute(array($_GET['ryear']));
 
?>  
 
<select class="form-control" id="rmonth"  name="rmonth" required>
<option value="">Select Month</option>
<?php
while( $row = $query->fetch()){
	$date = $row['date'];
	$dateObj = DateTime::CreateFromFormat('!m', $date);

?>	
<option value="<?php echo $row['date']; ?>" > 
 <?php echo $dateObj->format('F'); ?></option>
<?php 
 }
?>
</select>
 

<br/>  