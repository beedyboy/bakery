<?php 
include('auth.php');

$conn = Database::getInstance();

$select = $conn->db->prepare("UPDATE `sales` SET  `date`= '2018-05-16'   WHERE `date`= '2018-05-17' ");
$select->execute();


$select = $conn->db->prepare("UPDATE `sales` SET  `date`= '2018-05-16'   WHERE `date`= '2018-05-18' ");
$select->execute();


$select = $conn->db->prepare("UPDATE `sales_order` SET  `date`= '05/16/18'  WHERE `date`= '05/18/18'
");
 $select->execute();



$select = $conn->db->prepare("UPDATE `sales_order` SET  `date`= '05/16/18'  WHERE `date`= '05/17/18'
");
if($select->execute()): 

	echo "Data Updated Successfully";
else:
	echo "Not updated";


endif;

?>