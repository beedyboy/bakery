<?php
include_once('classes/functions.php'); 

$conn = Database::getInstance(); 
 /*
   $db = new mysqli('localhost', 'root' ,'kaydee', 'beedypos');
	if(!$db) {
	
		echo 'Could not connect to the database.';
	}*/ 
	// else {
	//System::getName('htables', 'tid', $row['tid'], 2);	
		if(isset($_POST['queryString'])) 
		{
			$queryString = $_POST['queryString'];
			
			if(strlen($queryString) >0) 
			{ 
				$status='Paid';

				$query = $conn->db->prepare("SELECT * FROM sales WHERE  invoice_number LIKE '$queryString%' LIMIT 10");
				$query->execute();

				// $query = $db->query("SELECT * FROM sales WHERE  invoice_number LIKE '$queryString%' LIMIT 10");
				if($query) 
				{
				echo '<ul class="search">';
					while ($result = $query ->fetchObject())
					 {
						//$tid =$result->tid;
	         			echo '<li onClick="fill2(\''.addslashes($result->invoice_number).'\');">'.System::getName("htables", "tid",	$result->tid, 2).' - '.$result->invoice_number.'</li>';
	         		
					}
				echo '</ul>';
					
				} 
				else 
				{
					echo 'OOPS we had a problem :(';
				}
			} 
			else 
			{
				// do nothing
			}
		}
		else
		 {
			echo 'There should be no direct access to this script!';
		}
	 
?>