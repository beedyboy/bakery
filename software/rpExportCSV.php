<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
			include_once('classes/functions.php'); 
			
			 $d1=$_GET['d1'];
				$d2=$_GET['d2'];
			
	  
 $resultClass  = System::salesRpDate($d1,$d2);
//header("Content-Type: application/csv");
//header("Content-Disposition: attachment;Filename=cars-models.csv");
$time = date("Y-m-d");
$day = date("l");
 
 
$head = "Sales Report \t"."-".$day."\t"."-".$time;
  $filename = $head.".csv";
  
 header('Content-type: application/csv'); //Change File type CSV/TXT etc
 header('Content-Disposition: attachment; filename=' . $filename);

 $output = fopen('php://output', 'w');
 //fputcsv($output, $head);
fputcsv($output, array('Transaction Id','Cashier', ' Date', 'Invoice Number ', 'Vat (12.5%)', 'Nhil (2.5%)', 'Fund Levy (2.5%)', 'Amount', 'Grand Total'));
  
if(!empty($resultClass)): ?>
 
<?php
foreach($resultClass as $LIST): 
//$bankId = $LIST['bankId']; 
 
 
$row=array($LIST['transaction_id'],	$LIST['cashier'],
 $LIST['date'], $LIST['invoice_number'],
 System::formatMoney($LIST['vat']), System::formatMoney($LIST['nhil']), 
 System::formatMoney($LIST['fund']),
 System::formatMoney($LIST['amount']),
 System::formatMoney(System::getColById('sales', 'invoice_number', $LIST['invoice_number'], 4)));

fputcsv($output, $row);
?> 
<?php 
 
endforeach;
?>
 
<?php
endif;  
$total = 0;
  $results = System::salesReportAmount($d1,$d2);
                for($i=0; $rows = $results->fetch(); $i++){
                $dsdsd=$rows['sum(amount)'];
                $total = System::formatMoney($dsdsd, true);
                }


fputcsv($output, array('#',' ', '  ', ' Total Amount', $total));


 ?> 
 