			
	
	<?php
			include_once('classes/functions.php');
			$transaction_id=$_GET['transaction_id'];
			
            $invoice  = System::getColById('sales', 'transaction_id', $transaction_id, 1);

            // $vat  = System::getColById('sales', 'transaction_id', $transaction_id, 14);
            // $fund  = System::getColById('sales', 'transaction_id', $transaction_id, 13);
            // $nhil  = System::getColById('sales', 'transaction_id', $transaction_id, 12);

				$resultas = System::amountSumSalesOrder($sdsd);
			 
				?>

				<div>
                <h5>Breakdown for Tax, NHIL, Fund Levy</h5>
                <hr />
                <p>Invoice Number: <?=$invoice?></p>
                <hr />
                <!-- <p><mark>Vat</mark>: Gh&cent; <?=System::formatMoney($vat, true)?> </p>
                <p><mark> Level Fund</mark> (2.5%): Gh&cent; <?=System::formatMoney($fund, true)?> </p>
                <p> <mark>NHIL </mark> (2.5%): Gh&cent; <?=System::formatMoney($nhil, true)?> </p>
                 -->
                <p class="btn btn-danger"> Please note that <strong>VAT</strong> is 12.5% 
                while <strong>NHIL</strong> and <strong>Fund Level</strong> are 2.5% each </p>
                </div>

<script src="js/beedy.js" type="text/javascript"></script>  