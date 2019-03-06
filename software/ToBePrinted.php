<?php
	include_once('classes/functions.php');
 
	$position=$GetSession->position;
	//table columns 
	$select = '';
	$output = array();
	$d = "NO";
	 
	
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
 
 
 $select = " SELECT * FROM printer WHERE status LIKE '%".$d."%'  AND (trans_id LIKE '%".$search."%'  OR printId LIKE '%".$searchi."%'
	OR receipt_type LIKE '%".$search."%' ) ";
 
$rs  = $conn->db->prepare($select); 
		$rs->execute(); 
	$filtered_rows = $rs->rowCount();
	foreach($rs as $row)
	{ 
	$sub_array = array();  
	$sub_array[] = System::getColById('products', 'product_id', System::getColById('sales_order', 'transaction_id', $row['trans_id'], 4), 1); //name
	//main is 5
	$sub_array[] =  System::getColById('sales_order', 'transaction_id', $row['trans_id'], 2); //qty
	$sub_array[] = System::formatMoney( System::getColById('sales_order', 'transaction_id', $row['trans_id'], 3), true); //amt
	  
	$invoice = System::getColById('sales_order', 'transaction_id', $row['trans_id'], 1);
	
	$sub_array[] =  System::getColById('htables', 'tid', System::getColById('sales', 'invoice_number', $invoice, 8),2); //tn
	$sub_array[] =  System::getName('hseat', 'sid', System::getColById('sales', 'invoice_number', $invoice, 9), 2); //sn
	
//$hid =System::getName('hall', 'id', $row['hall'], 1);	

	$sub_array[] = '<button type="button" name="printBtn" id="'.$row["printId"].'" class="btn btn-warning btn-xs printBtn" ><i class="icon-arrow-up icon-large"></i> Print</button> 
						<button type="button" id="'.$row["printId"].'" tid="'.$row["trans_id"].'" pid="'.$position.'" class="btn btn-danger btn-xs cancelOrder" ><i class="icon-trash icon-large"></i> Cancel Order</button>
						';
	$data[] = $sub_array;
	}
	
	//<a href="preview.php?invoice="'.$row["invoice_number"].'"  id="'.$row["printId"].'" title="Click to send to printer"> 
	
	$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	System::get_total_all_records_cond('printer', 'status', 'NO'),
	"data"				=>	$data
	);
	echo json_encode($output); 
	
	//fetch query ends here
	
 
	
?>
