<?php
	include_once('classes/functions.php');
	?>
 
	<thead>
		
<tr>
			<th colspan="2" style="border-top:1px solid #999999">  </th>
			<th colspan="2" style="border-top:1px solid #999999">  </th>
			<th colspan="5" style="border-top:1px solid #999999"> Total </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			<?php
				 
				 
				$results = System::ReceivableSumCond(); 
				for($i=0; $rows = $results->fetch(); $i++){
				$dsdsd=$rows['sum(amount)'];
				echo  System::formatMoney($dsdsd, true);
				}
				?>
			</th><th colspan="4" style="border-top:1px solid #999999"> 
			 
			</th>
		</tr>
			</thead>
			 