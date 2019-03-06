<?php
 include_once('classes/functions.php'); 
 
?> <?php
   $db = new mysqli('localhost', 'root' ,'', 'beedypos');
	if(!$db) {
	
		echo 'Could not connect to the database.';
	} else {
	//System::getName('htables', 'tid', $row['tid'], 2);	
		if(isset($_POST['queryString'])) {
			$queryString = $db->real_escape_string($_POST['queryString']);
			
			if(strlen($queryString) >0) { 
				$status='Paid';
				$query = $db->query("SELECT * FROM sales WHERE  invoice_number LIKE '$queryString%' LIMIT 10");
				if($query) {
				echo '<ul>';
					while ($result = $query ->fetch_object()) {
						//$tid =$result->tid;
	         			echo '<li onClick="fill(\''.addslashes($result->invoice_number).'\');">'.System::getName("htables", "tid",	$result->tid, 2).' - '.$result->invoice_number.'</li>';
	         		
					}
				echo '</ul>';
					
				} else {
					echo 'OOPS we had a problem :(';
				}
			} else {
				// do nothing
			}
		} else {
			echo 'There should be no direct access to this script!';
		}
	}
?>