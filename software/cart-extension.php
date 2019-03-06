<?php
			include_once('classes/functions.php');
			 $id=$_GET['invoice'];
			 
			 $discount_status = System::checkDiscount(1);
   
  
				$loadTblCond = System::loadTblCond('sales_order','invoice',$id);
			 
				 $rowCount= $loadTblCond->rowCount(); 
			?>
				<table class="table table-striped" >
	 
		<tr>
		 	<th> Product Count (<?php echo $rowCount; ?>)</th> 
			 <th colspan="5"></th>   
			 <th>Sub Total (&cent;)
			<?php $sdsd=$_GET['invoice'];
				$resultas = System::amountSumSalesOrder($sdsd);
				 
				for($i=0; $rowas = $resultas->fetch(); $i++){
				 $total=$rowas['sum(amount)'];
				echo System::formatMoney($total, true);
				}
				?>
				</th>
		</tr>
		<?php if($discount_status == "YES"): ?>
		<tr>
		 	<th class="bd-w-25"> </th> 
			 <th colspan="5" class="bd-w-25"></th>   
			 <th class="bd-w-25">Discount (&cent;) <?php
			 $qry= System::discountSumSalesOrder($_GET['invoice']);
			 for($i=0; $rowas = $qry->fetch(); $i++){
				 $profit=$rowas['sum(discount)'];
			echo System::formatMoney($profit, true);
			
			 }
			?>
				</th>
		</tr>
			<?php  endif; ?>
	<tr>
		 	<th> </th> 
			 <th colspan="5"></th>   
			 <th>Net Payable (&cent;) <?php  echo System::formatMoney($total, true); ?>
				</th>
		</tr>
			
	  
		 

		
				</table>