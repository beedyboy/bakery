<?php
			include_once('classes/functions.php');
			$id=$_GET['invoice'];
			
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT DISTINCT plate FROM sales_order WHERE invoice = ?  ");
$select->execute(array($id));

 
				 
for($i=1; $rows= $select->fetch();  $i++){ 
		
		 
	if($rows['plate'] > 1):  
		
$select3 = $conn->db->prepare("SELECT * FROM sales_order WHERE invoice = ?  AND plate = ?");
$select3->execute(array($id,$rows['plate']));
$rowCount= $select3->rowCount();
$amount =0;
$discount =0;
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
 $discount+=$row['discount'];
 // $transaction_id = $row['transaction_id']
}

?>
			<tr class="record">
			<td hidden><?php //echo $product_id; ?></td>
			 <td>
	<button class="btn-warning cancelCartGrpMeal" id="<?php echo $rows['plate'];?>" invoice="<?php echo $_GET['invoice']; ?>">
      <i class="fas fa-times"></i>
      </button>&nbsp;&nbsp;<?php echo $name; ?>
      </td>
			 <td>
			<?php
			//$ppp=$row['price'];
			//echo System::formatMoney($ppp, true);
			?>
			</td>
			 
			
	 
			<td>
				 <div class="quantity">
     <!--  <button class="local-minus"  id="<?php echo $rows['plate'];?>"  invoice="<?php echo $_GET['invoice']; ?>" >
     <i class="fas fa-minus"></i>
     </button>
       -->
      
      <button class="local-plus"   id="<?php echo $rows['plate'];?>"  invoice="<?php echo $_GET['invoice']; ?>"  class="cart-qty"  >
      <i class="fas fa-plus"></i>
      </button>
    </div>
    </td>

    <td><input type="number" class="sendLocalDisc"  plate="<?php echo $rows['plate'];?>"  invoice="<?php echo $_GET['invoice']; ?>" style="width:55px;" value="<?php echo $discount; ?>" /></td>
			

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
				?>
			
			
			<tr class="record">
			<td hidden><?php echo $row['product_id']; ?></td>
			 <td>
	<button class="btn-warning cancelCartMeal" id="<?php echo $row['transaction_id'];?>" >
      <i class="fas fa-times"></i>
      </button>&nbsp;&nbsp;<?php echo System::getColById('products', 'product_id', $row['product_id'], 1); ?>
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
			 <div class="quantity">
      <button class="qty-minus"  id="<?php echo $row['transaction_id'];?>" >
      <i class="fas fa-minus"></i>
      </button>
      
      <input type="text" name="qty" class="cart-qty"  tid="<?php echo $row['transaction_id'];?>"  id="id<?php echo $row['transaction_id'];?>"  value="<?php echo $row['qty']; ?>">
      
      <button class="qty-plus"  id="<?php echo $row['transaction_id'];?>"  class="cart-qty"  >
      <i class="fas fa-plus"></i>
      </button>
    </div>
   <?php endif; ?>
    </td>
			
			<td><input type="number" class="sendDisc"  tid="<?php echo $row['transaction_id'];?>"  style="width:55px;" value="<?php echo $row['discount']; ?>" /></td>
			
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
			 
			 
			