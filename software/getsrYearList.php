<?php
 
include_once('classes/functions.php');  
	
	
	$conn = Database::getInstance(); 
	$query = $conn->db->prepare("SELECT  DISTINCT YEAR(date) as date
    FROM  sales  WHERE cashier = ? ") ;
$query->execute(array($_GET['srname']));
 
?>  
 
<select class="form-control" id="sryear"  name="sryear" required>
<option value="">Select Year</option>
<?php
while( $row = $query->fetch()){
	
	 

?>	
<option value="<?php echo $row['date']; ?>" > 
 <?php echo $date = $row['date']; ?></option>
<?php 
 }
?>
</select>
 

<br/>  