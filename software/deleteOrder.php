<?php
	include('classes/db.php');
	$conn = Database::getInstance();
	
	$id=$_GET['id'];
	$invoice=$_GET['invoice']; 
	$qty=$_GET['qty'];
	$product_id=$_GET['product_id'];
	//edit qty_left
	$sql = $conn->db->prepare("UPDATE products 	SET qty_left=qty_left+? WHERE product_id=?" );
	$sql->execute(array($qty,$product_id));

	$result =$conn->db->prepare("DELETE FROM sales_order WHERE transaction_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	
	if(isset($_GET['from'])):
			header("location: local.php?invoice=$invoice");
	else:
	header("location: sales.php?invoice=$invoice");
	
	endif;
?>