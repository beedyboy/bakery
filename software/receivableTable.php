<?php
	include_once('classes/functions.php');
 
	$position=$GetSession->position;
	//table columns
 
	$select = '';
	$output = array();
	$d = "PENDING";
	 
	
	$conn = System::getInstance();
		 
	$data = array();
	

 if(isset($_POST['search']['value'])):
 
 $search = $_POST['search']['value'];
 $searchd = $_POST['search']['value'];
 $searchi = $_POST['search']['value'];
 else:
 
 $search = '';
 $searchd = '';
 $searchi = '';
 
 endif;
 
		
 
	$select = " SELECT * FROM sales WHERE status LIKE '%".$d."%'  AND (transaction_id LIKE '%".$search."%'  OR invoice_number LIKE '%".$searchi."%'
	OR date LIKE '%".$search."%' OR amount LIKE '%".$search."%' OR balance LIKE '%".$search."%' ) ";
 

	$rs  = $conn->db->prepare($select); 
		$rs->execute(); 
	$filtered_rows = $rs->rowCount();
	foreach($rs as $row)
	{ 
	$sub_array = array();   
	$sub_array[] =   $row['transaction_id'];
	$sub_array[] =   $row['date'];
	 
	$sub_array[] =   $row['cashier']; 
	$sub_array[] =   "<button class='btn btn-success viewInvoiceValue'>".$row['invoice_number']." </sup></button>";

	$sub_array[] =    System::formatMoney($row['amount'], true)."<sup class=' btn-danger btn-xs'>".System::hasDrink($row['invoice_number']);
	$sub_array[] =  System::formatMoney($row['balance'], true);
	
 
	
 
	 

	$sub_array[] = '<a href="#" id="'.$row["transaction_id"].'"	class="payButton" name="'.$row["invoice_number"].'" title="Click to pay"> 
<button class="btn btn-success"><i class="icon-save"></i></button></a>';

$sub_array[] = '<a href="#" id="'.$row["transaction_id"].'"  name="'.$row["invoice_number"].'" class="billPrint"  title="Click to send to printer">
<button  class="btn btn-warning btn-xs "> <i class="icon-arrow-up"></i> </button></a> ';

	$data[] = $sub_array;
	}
	
 
	
	$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	System::get_total_all_records_cond('sales', 'status', $d),
	"data"				=>	$data
	);
	echo json_encode($output); 
	
	//fetch query ends here
	
 
	
?>
