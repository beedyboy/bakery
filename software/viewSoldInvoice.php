			
	
	<?php
			include_once('classes/functions.php');
				$id = str_replace(' ','', $_GET['invoice']);
			
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT DISTINCT plate FROM sales_order WHERE invoice = ?  ");
$select->execute(array($id));

 
	
	 if($GetSession->position=="Admin"): ?>	
		<!--	
	<a href="editOrder.php?invoice=<?php echo $id; ?>">Edit Order</a>-->
	<?php endif; ?>
	
	<table class="table table-responsive" >
	<thead>
		<tr>
		 	<th> Items </th>
			 <th> Unit Price </th>
			<th> Quantity </th>
		 <th>Dis</th>
			 
			<th> Total Price </th>
		</tr>
	</thead>
	<tbody>
		
			 

		<?php		 
				for($i=1; $rows= $select->fetch();  $i++){
	 
		 
	if($rows['plate'] > 1):  
		
$select3 = $conn->db->prepare("SELECT * FROM sales_order WHERE invoice = ?  AND plate = ?");
$select3->execute(array($id,$rows['plate']));
$rowCount= $select3->rowCount();
$amount =0;
$name ='';
for($i=1; $row= $select3->fetch();  $i++){

$category  = System::getColById('products', 'product_id', $row['product_id'], 4);
 $product_id = $row['product_id'];
 if($i < $rowCount){
$name .= System::getColById('products', 'product_id', $product_id, 1)." & ";	
 }
 else{
$name .= System::getColById('products', 'product_id', $product_id, 1);	
 }

 $amount+=$row['amount'];
 // $transaction_id = $row['transaction_id']
}

?>
			<tr class="record">
			<td hidden><?php //echo $product_id; ?></td>
			 <td>
	 <?php echo $name; ?>
      </td>
			 <td>
			<?php
			//$ppp=$row['price'];
			//echo System::formatMoney($ppp, true);
			?>
			</td>
			<td>
				...
    </td>
			<td>
			<?php echo System::formatMoney($amount, true); ; ?>
			</td>
			 
			</tr>
			<?php
			
			else:
					
$select2 = $conn->db->prepare("SELECT * FROM sales_order WHERE invoice = ?  AND plate = ?");
$select2->execute(array($id,$rows['plate']));
			for($i=1; $row= $select2->fetch();  $i++){
		 $category  = System::getColById('products', 'product_id', $row['product_id'], 4);		

 	$discount+=$row['discount'];
				?>
			
			
			<tr class="record">
			<td hidden><?php echo $row['product_id']; ?></td>
			 <td>
 <?php echo System::getColById('products', 'product_id', $row['product_id'], 1); ?>
      </td>
			 <td>
			<?php
			$ppp=$row['price'];
			echo System::formatMoney($ppp, true);
			?>
			</td>
			<td>
				<?php
				if($category=="L" || $category=="S" || $category=="SM"):
				
				echo "...";
				else: ?>
			 <?php echo $row['qty']; ?>
   <?php endif; ?>
    </td>
			
			<td> <?php
				if($category=="L" || $category=="S" || $category=="SM"):
					echo $discount;
				else:
				 echo $row['discount']; ?>
				endif;
			</td>
			
			<td>
			<?php
			$dfdf=$row['amount'];
			echo System::formatMoney($dfdf, true);
			?>
			</td>
			 
			</tr>
			
			
			<?php
			}
		 endif;
		}
			?>
			 
			 
	</tbody>
	</table>
			
	<span class="pull-right"> Total: 
	<?php 
//echo $_GET['invoice'];
				$resultas = System::amountSumSalesOrder($_GET['invoice']);
				 
				for($i=0; $rowas = $resultas->fetch(); $i++){
				 $total=$rowas['sum(amount)'];
				echo "<mark>".System::formatMoney($total, true)."</mark>";
				}


				?>

				</span>
			