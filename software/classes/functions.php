<?php 
require_once "session.php";
require_once "db.php";
 
  $GetSession = new Session;

class System extends Database{
public function __construct(){
parent::__construct();
 
}
  

  public static function checkTimeOut( ){

global $GetSession; 
if(isset($GetSession->lastActivity)  && (time() - $GetSession->lastActivity > 30*60)):

header('location: signout.php');

endif;
  	/*if($timeout !== 0 && isset($_SESSION['last']) && time()- $_SESSION['last'] > $timeout):
  		//log user out
  		//
  		//
  		//
  		else:
  			$_SESSION['last'] = time();

endif;
*/
  }

  public static function setNewActivity(){

 global $GetSession; 
  return $GetSession->setLastActivity(time()) ;
  }

  public static function test(){

 global $GetSession; 
if($GetSession->loggedin== TRUE):

echo $GetSession->lastActivity;

	endif;
  }
public static function hasDrink($invoice){
    $return = '';
    $bool = false;
    $conn = Database::getInstance();
    $select = $conn->db->prepare(" SELECT * FROM sales_order WHERE invoice = ? ");
    $select->execute(array($invoice));
    $result = $select->fetchAll();
    foreach ($result as $value) 
    {
      # code...
    $r = self::checkDrink($value['product_id']);
    if($r == "D"):
      $bool = true;
    endif;

    }

  if($bool):
    return "D";
  else:
   return '';
  endif;
} 

public static function checkDrink($product_id){
     
    $conn = Database::getInstance();
    $select = $conn->db->prepare(" SELECT * FROM products WHERE product_id = ? ");
    $select->execute(array($product_id)); 
    while($row = $select->fetch())
    {
 
      if($row['main'] == 'D'):

        return  $row['main'];

      endif;
    }

  return '';
} 

public static function existOne($tbl, $col, $value){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? Limit 1");
$select->execute(array($value));
return $select->rowCount();
} 
public static function existTwo($tbl, $col, $col2, $value, $value2){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? AND $col2 LIKE ? Limit 1");
$select->execute(array($value, $value2));
return $select->rowCount();
} 
public static function existThree($tbl, $col, $col2, $col3, $value, $value2, $value3){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? AND $col2 LIKE ? AND $col3 LIKE ? Limit 1");
$select->execute(array($value, $value2, $value3));
return $select->rowCount();
} 
public static function existFour($tbl, $col, $col2, $col3, $col4, $value, $value2, $value3, $value4){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? AND $col2 LIKE ? AND $col3 LIKE ? AND $col4 LIKE ? Limit 1");
$select->execute(array($value, $value2, $value3, $value4));
return $select->rowCount();
} 
 
public static function loadDistincts($col, $tbl){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT DISTINCT $col FROM $tbl ");
$select->execute();
return $select;
} 


public static function loadDistinctWhere($col, $tbl, $where, $value){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT DISTINCT $col FROM $tbl WHERE $where like ? ");
$select->execute(array($value));
return $select;
} 


 	/**
	 *@method get_total_all_records()
	 *@return total row
	 *@param String $tbl table name
	 */
	
	public static function get_total_all_records($tbl)
	{
	
	$conn = Database::getInstance();
	$statement = $conn->db->prepare("SELECT * FROM $tbl");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
	}
 
 
public static function salesRpDate($d1, $d2){
$conn = Database::getInstance();
 
$select = $conn->db->prepare("SELECT * FROM sales WHERE date >= :a AND date <= :b ORDER by transaction_id DESC");
$select->execute(array(':a'=>$d1,':b'=>$d2));
return $select->fetchAll();
}

/**
	 *@method get_total_all_records condiion()
	 *@return total row
	 *@param String $tbl table name
	 */
	
	public static function get_total_all_records_cond($tbl,$col, $value)
	{
	
	$conn = Database::getInstance();
	$statement = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ?");
	$statement->execute(array($value));
	$result = $statement->fetchAll();
	return $statement->rowCount();
	}
	 
public static function loadDistinct($col, $tbl){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT DISTINCT $col FROM $tbl ");
$select->execute();
return $select->fetchAll();
}
public static function loadDistinctCond1($col, $tbl, $cond, $value){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT DISTINCT $col FROM $tbl WHERE $cond = ? ");
$select->execute(array($value));
return $select->fetchAll();
}
 
public static function bdV($value){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT DISTINCT name FROM hseat WHERE tid = ? ");
$select->execute(array($value));
return $select->fetchAll();
}
 // Generate Guid 
 public static  function charFormat($word)
{
$output=str_replace("'", '',$word);
$output=str_replace(" ", '',$output);
$output=str_replace("-", '',$output);
$output=substr($output, 0,16);
return $output;
}
public static function DemoGuid($y) { 
      $s = strtoupper(md5(uniqid(rand(),true))); 
    $guidText = 
        substr($s,0,4) . '-' . 
        substr($s,4,4) . '-'.$y . 
        substr($s,8,3). '-' . 
        substr($s,11,4); 
    return $guidText;
}
public static function NewGuid() { 
    $s = strtoupper(md5(uniqid(rand(),true))); 
    $guidText = 
        substr($s,0,4) . 
        substr($s,4,4) . 
        substr($s,8,4).  
        substr($s,12,4); 
    return $guidText;
}
public static function NewGuidR($s) { 
     $guidText = 
        substr($s,0,4) . '-' . 
        substr($s,4,4) . '-' . 
        substr($s,8,4). '-' . 
        substr($s,12,4); 
    return strtoupper($guidText);
}
// End Generate Guid 
 public static function beedy($beedy) {
	 
					$chars = "BEEDYBOLADE";
					$pass= rtrim(base64_encode($beedy), "=");
					return strtoupper($pass);
				}
 
 public static function beedyCheck($beedy)
				{
					$check= base64_decode($beedy);
 					return strtoupper($check); 
				}
 
public static function getColById($tbl, $col, $id, $return){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col = ? Limit 1");
$select->execute(array($id));
return $select->fetchColumn($return);
}
public static function getColById2($tbl, $col, $col2, $id,  $id2, $return){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col = ?  AND $col2 = ? Limit 1");
$select->execute(array($id,$id2));
return $select->fetchColumn($return);
}
public static function getName($tbl, $col, $id, $return){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? ");
$select->execute(array($id));
return $select->fetchColumn($return); 
}
public static function loadTable($tbl){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl");
$select->execute();
return $select;
}
public static function loadTbl($tbl){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl");
$select->execute();
return $select->fetchAll();
}
public static function loadTblCond($tbl, $cond, $value){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $cond LIKE ?  ");
$select->execute(array($value));
return $select;
} 

public static function loadTblCond2($tbl, $cond, $value){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $cond LIKE ?  ");
$select->execute(array($value));
return $select->fetchAll();
}


public static function loadTblCond3($tbl, $cond,  $cond2, $value, $value2){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $cond LIKE ? AND $cond2 LIKE ?  ");
$select->execute(array($value, $value2));
return $select->fetchAll();
}

public static function loadTblCond_3($tbl, $cond,  $cond2, $value, $value2){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $cond LIKE ? AND $cond2 LIKE ?  ");
$select->execute(array($value, $value2));
return $select;
}

public static function loadTblDescOrd($tbl, $id){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl ORDER BY $id DESC");
$select->execute();
return $select;
} 

public static function loadUsersOrderBy(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM user ORDER BY id DESC");
$select->execute();
return $select;
} 

public static function loadKitchensOrderBy(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM hall ORDER BY id DESC");
$select->execute();
return $select;
} 

public static function loadDistinctKitchens(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT DISTINCT kitchen FROM sales WHERE status = 'PENDING' ");
$select->execute();
return $select;
} 

public static function loadHallTbl(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM htables ORDER BY tid DESC");
$select->execute();
return $select;
} 
public static function loadSubCategory(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM SubCategory ORDER BY subId DESC");
$select->execute();
return $select;
} 
public static function loadTblSeat(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM hseat ORDER BY sid DESC");
$select->execute();
return $select;
} 

public static function loadAllProducts(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM products");
$select->execute();
return $select;
} 

public static function loadAllProductsWhere($main){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM products WHERE subId=? ");
$select->execute(array($main));
return $select;
} 

public static function loadAllsuppliers(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM suppliers");
$select->execute();
return $select;
} 


public static function loadSupplierOrderBy(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM suppliers ORDER BY supplier_id DESC");
$select->execute();
return $select;
} 

public static function loadProductsOrderBy(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM products ORDER BY product_id DESC");
$select->execute();
return $select;
} 

public static function loadProductsWhyQty(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM products WHERE   qty_left < 10 ORDER BY product_id DESC");
$select->execute();
return $select;
} 

public static function getMyFood($subId)
{
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM products WHERE subId=:subId ");
$select->execute(array(':subId'=>$subId));
return $select;
} 

public static function loadTotalProducts(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT *, price * qty_left as total FROM products ORDER BY product_id DESC");
$select->execute();
return $select;
} 


public static function loadTotalSubCategory(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM subcategory ORDER BY subId DESC");
$select->execute();
return $select;
} 


 
public static function amountSumSalesOrder($invoice){
$conn = Database::getInstance();
//$s =1;, ':s'=>$s AND status =:s 
$select = $conn->db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice=:invoice");
$select->execute(array(':invoice'=>$invoice));
return $select;
} 
public static function discountSumSalesOrder($invoice){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT sum(discount) FROM sales_order WHERE invoice=:invoice");
$select->execute(array(':invoice'=>$invoice));
return $select;
} 

public static function ReportTCond($tbl,$a, $b){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE date BETWEEN :a AND :b ");
$select->execute(array(':a'=>$a,':b'=>$b));
return $select;
} 

public static function ReportTSumCond($tbl,$col,$a, $b){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT sum($col) FROM $tbl WHERE date BETWEEN :a AND :b ");
$select->execute(array(':a'=>$a,':b'=>$b));
return $select;
} 



public static function salesReport($a, $b){
$conn = Database::getInstance(); 
$select = $conn->db->prepare("SELECT * FROM sales WHERE date >= :a AND date <= :b ORDER by transaction_id DESC");
$select->execute(array(':a'=>$a,':b'=>$b));
return $select;
} 
 

public static function accountReceiveable(){
$conn = Database::getInstance();
$type = "credit";
$d="Paid";
$select = $conn->db->prepare("SELECT * FROM sales WHERE status='Pending'");
$select->execute();
return $select;
} 

public static function accountReceiveable2($query){
$conn = Database::getInstance();
$type = "credit";
$d="PENDING";
$select = "SELECT * FROM sales WHERE status LIKE '%".$d."%' order BY transaction_id ASC";


$rs  = $conn->db->prepare($select);


$rs->execute();
return $rs;
} 

public static function ReceivableSumCond(){
$conn = Database::getInstance();
$d="Paid";
$type = "credit";
$select = $conn->db->prepare("SELECT sum(amount) FROM sales WHERE status='Pending'");
$select->execute();
return $select;
} 

public static function reportTbl($tbl, $col,$userid, $id,$ord){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col= :userid ORDER BY $id $ord");
$select->execute(array(':userid'=>$userid));
return $select;
} 
public static function salesReportAmount($a, $b){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT sum(amount) FROM sales WHERE date BETWEEN :a AND :b ORDER by transaction_id DESC");
$select->execute(array(':a'=>$a,':b'=>$b));
return $select;
} 

public static function salesReportProfit($a, $b){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT sum(profit) FROM sales WHERE date BETWEEN :a AND :b ORDER by transaction_id DESC");
$select->execute(array(':a'=>$a,':b'=>$b));
return $select;
} 

public static function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
	return $number;
   // return '&#8358;'. $number.'k';
}		

public static function removeComma($value){
$value = str_replace(',','',$value);
return $value;
}
#############################insert functions###########################################

public static function saveSupplier(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):
if($existCheck = self::existOne('suppliers', 'supplier_name', $_POST['supplier_name'])==0)
{
$stmt = $conn->db->prepare("INSERT INTO suppliers (supplier_name,supplier_address,supplier_contact,contact_person,note) VALUES (:supplier_name,:supplier_address,:supplier_contact,:contact_person,:note)");
$stmt->bindParam(':supplier_name', $_POST['supplier_name'], PDO::PARAM_STR);
$stmt->bindParam(':supplier_address', $_POST['supplier_address'], PDO::PARAM_STR);
$stmt->bindParam(':supplier_contact', $_POST['supplier_contact'], PDO::PARAM_STR);
$stmt->bindParam(':contact_person', $_POST['contact_person'], PDO::PARAM_STR);
$stmt->bindParam(':note', $_POST['note'], PDO::PARAM_STR);
if ($stmt->execute()): return 1; 	else: return 0;	endif;
 }
 else {return 2;}
else:
return 10;
endif;

}
public static function saveFoodSubCat(){

$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):


if($existCheck = self::existTwo('subcategory',  'main', 'sub', $_POST['main'], $_POST['sub'])==0)
{   

$stmt = $conn->db->prepare("INSERT INTO subcategory ( main, sub ) VALUES (:main,:sub  )");  
$stmt->bindParam(':main', $_POST['main'], PDO::PARAM_STR);   
$stmt->bindParam(':sub', $_POST['sub'], PDO::PARAM_STR);  
if ($stmt->execute()): return 1; 	else: return 0;	endif;
 }
 else {return 2;}

else:
return 10;
endif;

}

public static function saveProduct(){ 
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):
 
if($existCheck = self::existOne('products',   'product_name', $_POST['product_name'])==0)
{   

$s_price = $_POST['s_price'];

if($s_price == NULL){
	$s_price = 0;
 
}
else{
	$s_price = $_POST['s_price'];
}

 
$quantity = $_POST['quantity'];
 if($quantity != ""){
$check =1;

 }
else{
	$check =0;
	$quantity = 0;
}
  
$stmt = $conn->db->prepare("INSERT INTO products ( product_name, selling_price, qty_left,   price, checks) 
VALUES (:product_name,:selling_price,:qty_left,  :price, :check )"); 
$stmt->bindParam(':product_name', $_POST['product_name'], PDO::PARAM_STR); 
$stmt->bindParam(':selling_price', $s_price, PDO::PARAM_STR);  
$stmt->bindParam(':qty_left', $quantity, PDO::PARAM_STR);   
$stmt->bindParam(':price', $s_price, PDO::PARAM_STR); 
//$stmt->bindParam(':vat', $vat, PDO::PARAM_STR);
$stmt->bindParam(':check', $check);
if ($stmt->execute()): return 1; 	else: return 0;	endif;
 }
 else {return 2;}
else:
return 10;
endif;

}

public static function saveCustomer(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):
if($existCheck = self::existTwo('customer', 'customer_name', 'contact', $_POST['name'], $_POST['contact'])==0)
{ 
$stmt = $conn->db->prepare("INSERT INTO customer (customer_name,address,contact)  VALUES (:customer_name,:address,:contact )");
$stmt->bindParam(':customer_name', $_POST['name'], PDO::PARAM_STR);
$stmt->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
$stmt->bindParam(':contact', $_POST['contact'], PDO::PARAM_STR); 
if ($stmt->execute()): return 1; else: return 0;	endif;
 }
 else {return 2;}
else:
return 10;
endif;

}

public static function saveUser(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):
if($existCheck = self::existOne('user', 'username', $_POST['username'])==0)
{ 
$stmt = $conn->db->prepare("INSERT INTO user (name,username,password,position)  VALUES (:name,:username,:password,:position )");
$stmt->bindParam(':name', $_POST['full_name'], PDO::PARAM_STR);
$stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
$stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR); 
$stmt->bindParam(':position', $_POST['position'], PDO::PARAM_STR); 
if ($stmt->execute()): return 1; else: return 0;	endif;
 }
 else {return 2;}
else:
return 10;
endif;

}

public static function addSubCategory(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):
if($existCheck = self::existTwo('SubCategory', 'main','sub', $_POST['main'], $_POST['sub'])==0)
{ 
$stmt = $conn->db->prepare("INSERT INTO SubCategory (main,sub)  VALUES (:main,:sub)");
$stmt->bindParam(':main', $_POST['main'], PDO::PARAM_STR); 
$stmt->bindParam(':sub', $_POST['sub'], PDO::PARAM_STR); 
if ($stmt->execute()): return 1; else: return 0;	endif;
 }
 else {return 2;}
else:
return 10;
endif;

}

public static function categoryGuide($Main){
	if($Main=="C"): echo "Continental"; 
elseif($Main=="L"): echo "Local Dishes"; 
elseif($Main=="D"): echo "Drinks"; 
elseif($Main=="S"): echo "Soup"; 
elseif($Main=="F"): echo "Fish - Chicken"; 
elseif($Main=="SM"): echo "Special Meal"; 
endif;

return $Main;
}

public static function addKitchen(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):
if($existCheck = self::existOne('hall', 'name', $_POST['name'])==0)
{ 
$stmt = $conn->db->prepare("INSERT INTO hall (name)  VALUES (:name)");
$stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR); 
if ($stmt->execute()): return 1; else: return 0;	endif;
 }
 else {return 2;}
else:
return 10;
endif;

}

public static function addHallTables(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):
 $number = 	substr(self::getColById('hall', 'id', $_POST['hall_id'], 1), 0,3)."-".$_POST['number'];
 if($existCheck = self::existTwo('htables', 'id','name', $_POST['hall_id'], $number)==0)
{

$stmt = $conn->db->prepare("INSERT INTO htables (id, name)  VALUES (:hall_id,:name)");
$stmt->bindParam(':hall_id', $_POST['hall_id'], PDO::PARAM_STR); 
$stmt->bindParam(':name', $number, PDO::PARAM_STR); 
if ($stmt->execute()): return 1; else: return 0;	endif;
 }
 else {return 2;}
else:
return 10;
endif;

}

public static function saveSeat(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):
if($existCheck = self::existTwo('hseat', 'tid','name', $_POST['tid'], $_POST['name'])==0)
{ 
$stmt = $conn->db->prepare("INSERT INTO hseat (tid, name)  VALUES (:hall_id,:name)");
$stmt->bindParam(':hall_id', $_POST['tid'], PDO::PARAM_STR); 
$stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR); 
if ($stmt->execute()): return 1; else: return 0;	endif;
 }
 else {return 2;}
else:
return 10;
endif;

}
public static function activateDiscount(){
 $conn = Database::getInstance();
 
	$stmt = $conn->db->prepare("UPDATE discount_settings SET value=:value, status = :status "); 
 $stmt->execute(array(':value'=>$_GET['dPerc'],':status'=>$_GET['status']));
 if($stmt): return 1; else: return 0; endif;
}
public static function checkDiscount($return){
 
 $conn = Database::getInstance();
$query = $conn->db->prepare("SELECT * FROM discount_settings  ") ;
$query->execute(); 

return $query->fetchColumn($return);
 
}
public static function Incoming(){
$conn = Database::getInstance();
 global $GetSession; 
if($GetSession->loggedin== TRUE):
  $m =$_POST['main'];
 // $checks=self::getColById('products', 'product_id', $_POST['product_id'], 7);
  $ivat=self::getColById('products', 'product_id', $_POST['product_id'], 5);
 $price =  $ivat=self::getColById('products', 'product_id', $_POST['product_id'], 6);
	//$existCheck =self::getColById('products', 'product_id', $_POST['product_id'], 3);
 
if($m=="C"):
 	 $qty =$_POST['qty'];
 	 $discount =$_POST['discount'];
	 $pd = $price - $discount;
$amount = $pd * $qty;
$vat = $ivat * $qty;
   elseif($m=="D"):
 	 $qty =$_POST['qty'];
 	 $discount =$_POST['discount'];
	 $pd = $price - $discount;
$amount = $pd * $qty;
$vat = $ivat * $qty;
  
/**
*This part checks for qty  if( $existCheck > 0 AND $existCheck >= $_POST['qty'] )
{ 
$updateClass = $conn->db->prepare("UPDATE products SET qty_left=qty_left - :qty WHERE product_id=:product_id ");
 $updateClass->execute(array(':qty'=>$qty,':product_id'=> $_POST['product_id']));
}


 else {return 2; }
*/ 
 
 elseif($m=="S"):
	  $qty =0; 
$amount = 0;
$vat = 0;
$discount =0;

  elseif($m=="L" || $m=="SM"):
	  $qty =0; 
$discount =$_POST['discount'];
//fufu 2c dis 1 
	 $amount = $_POST['amount'] -$discount;
$price =0;
$vat = 0; 
 
 elseif($m=="F"):
	 $qty =$_POST['qty'];
 	 $discount =$_POST['discount'];
	 $pd = $price - $discount;
$amount = $pd * $qty;
$vat = $ivat * $qty;

/*
if($checks > 0)
{
 if( $existCheck > 0)
{ 
$updateClass = $conn->db->prepare("UPDATE products SET qty_left=qty_left - :qty WHERE product_id=:product_id ");
 $updateClass->execute(array(':qty'=>$qty,':product_id'=> $_POST['product_id']));
}
 else {return 2; }
 
 
}
*/

	 endif;
 
 
 $made = self::existTwo('sales_order', "product_id",  "invoice",   $_POST['product_id'], $_POST['invoice']);
 
 if($made > 0) {
	 
	 
	 $transaction_id =  self::getColById2('sales_order', "product_id",  "invoice",   $_POST['product_id'], $_POST['invoice'], 0);
	 
	 $updateClass = $conn->db->prepare("UPDATE sales_order SET qty=qty + :qty,  amount=amount + :amount,
	 price=price + :price,  vat=vat + :vat,  discount=discount + :discount 
	 WHERE transaction_id=:transaction_id ");
 $updateClass->execute(array(':qty'=>$qty, ':amount'=>$amount, ':price'=>$price, ':vat'=>$vat, 
 ':discount'=>$discount, ':transaction_id'=> $transaction_id));
	 
	 if($updateClass):  return 1; else: return 0;	endif;
	 
 }
 else {
	 
	 
 
 $stmt = $conn->db->prepare("INSERT INTO sales_order (invoice, qty, amount, product_id, price, vat, discount, date) 
 VALUES (:invoice, :qty, :amount, :product_id, :price, :vat, :discount, :date)"); 
if ($stmt->execute(array(':invoice'=>$_POST['invoice'],':qty'=>$qty,
':amount'=> $amount,':product_id'=> $_POST['product_id'],':price'=> $price,':vat'=> $vat,
':discount'=> $discount,':date'=> $_POST['date']))): return 1; else: return 0;	endif;
 }
 
else:
return 10;
endif;
 
}
 
  
 
public static function sendDisc(){
$conn = Database::getInstance();
 global $GetSession; 
if($GetSession->loggedin== TRUE):
  //$m =$_GET['main'];
 
 $transaction_id = $_GET['transaction_id'];
 $discount = $_GET['discount'];
 
  $price=self::getColById('sales_order', 'transaction_id', $transaction_id, 3);
  $product_id=self::getColById('sales_order', 'transaction_id', $transaction_id, 4);
   
  
   $amount = $price - $discount; 
  // get available quantity
   //substract qty by 1
   // substract amount by product price
    $updateClass = $conn->db->prepare("UPDATE sales_order SET discount=:discount,  amount=:amount  WHERE transaction_id=:transaction_id ");
 $updateClass->execute(array(':discount'=>$discount, ':amount'=>$amount,  ':transaction_id'=> $transaction_id));
   if($updateClass): 
   return 1; else: return 0;  endif;
  
 
else:
return 10;

endif;
 
}
  
  
 
public static function sendLocalDisc(){
$conn = Database::getInstance();
 global $GetSession; 
if($GetSession->loggedin== TRUE):
 
 $totalAmount = 0;

 $invoice = $_GET['invoice'];
 $plate = $_GET['plate'];
 $discount = $_GET['discount'];

 $calc = $conn->db->prepare("SELECT * FROM sales_order WHERE invoice= ? AND plate = ?");
 $calc->execute(array($invoice, $plate));
 $data = $calc->fetchAll();
 $total = $calc->rowCount();


$select = $conn->db->prepare("SELECT sum(price) FROM sales_order WHERE invoice= ? AND plate = ?  ");
$select->execute(array($invoice, $plate));

for($i=0; $rowas = $select->fetch(); $i++){
      $totalAmount = $rowas['sum(price)'];
       
        }
 
 $deduct = $discount/ $total;
 foreach ($data as $value)
  {
   
     $transaction_id= $value['transaction_id'];
     $price= $value['price'];  
     


$first = $price*100;
  $first = $first/$totalAmount;
$final = $first*$discount;
  $final = round($final/100);

     $amount = $value['amount'] - $final; 

    $updateClass = $conn->db->prepare("UPDATE sales_order SET discount=:discount,  amount=:amount  WHERE transaction_id=:transaction_id ");
 $updateClass->execute(array(':discount'=>$final, ':amount'=>$amount,  ':transaction_id'=> $transaction_id));
  
  
  
 }
 
   return 1; 
 
else:
return 10;

endif;
 
}
 

 
 
 
 //addMenuItem
 
public static function addMenuItem(){
$conn = Database::getInstance();
 global $GetSession; 
if($GetSession->loggedin== TRUE):
  //$m =$_GET['main'];
  $discount_value ="";
  $discount_status = self::checkDiscount(1);
  if($discount_status == "YES"){
     $discount_value = self::checkDiscount(0);  
  }
  
 $price  = self::getColById('products', 'product_id', $_GET['product_id'], 4);
	 
 $date = date("m/d/y"); 
 $qty = 1;
	   
 $amount = $price * $qty; 
  $existCheck =self::getColById('products', 'product_id', $_GET['product_id'], 3);
if( $qty > $existCheck  ): return 5; endif; 

 $made = self::existTwo('sales_order', "product_id",  "invoice",   $_GET['product_id'], $_GET['invoice']);
  
 if($made > 0) { 
	 //get transid
	 $transaction_id =  self::getColById2('sales_order', "product_id",  "invoice",   $_GET['product_id'], $_GET['invoice'], 0);
	 
	 //update sales
	 $updateClass = $conn->db->prepare("UPDATE sales_order SET qty=qty + :qty,  amount=amount + :amount WHERE transaction_id=:transaction_id ");
 $updateClass->execute(array(':qty'=>$qty, ':amount'=>$amount,  ':transaction_id'=> $transaction_id));
	 
	 if($updateClass):  	self::minusProduct($_GET['product_id'], $qty);
	 return 1; else: return 0;	endif;
	 
 }
  else { 

 $stmt = $conn->db->prepare("INSERT INTO sales_order (invoice, qty, amount, product_id, price,  date) 
 VALUES (:invoice, :qty, :amount, :product_id, :price, :date)"); 
if ($stmt->execute(array(':invoice'=>$_GET['invoice'],':qty'=>$qty,
':amount'=> $amount,':product_id'=> $_GET['product_id'],':price'=> $price, ':date'=> $date))):


	self::minusProduct($_GET['product_id'], $qty);
return 1; else: return 0;	endif;
 }
 
else:
return 10;
endif;
 
}


 
 public static function minusProduct($product_id, $qty){

$conn = Database::getInstance();
$updateClass = $conn->db->prepare("UPDATE products SET qty_left=qty_left - :qty WHERE product_id= :product_id ");

 $updateClass->execute(array(':qty'=>$qty,':product_id'=> $product_id));

 }

 
 public static function plusProduct($product_id, $qty){

$conn = Database::getInstance();
$updateClass = $conn->db->prepare("UPDATE products SET qty_left=qty_left + :qty WHERE product_id= :product_id ");

 $updateClass->execute(array(':qty'=>$qty,':product_id'=> $product_id));

 }


public static function maxPlate($invoice){
 
 
$conn = Database::getInstance();
$qry = $conn->db->prepare("SELECT MAX(plate) FROM sales_order WHERE invoice = ?");
$qry->execute(array($invoice));
$row = $qry->fetch();

return $row['MAX(plate)'];

}
 
 

public static function addLocalMenuItem(){
$conn = Database::getInstance();
 global $GetSession; 
if($GetSession->loggedin== TRUE):
 
 
   $made = self::existOne('sales_order', "invoice",   $_GET['invoice']);
 	 //$plate  = self::getColById('sales_order', 'invoice', $_GET['invoice'], 10);
	 	$plate = 2;
	 if($made < 1){
		$plate = 2;
	 }
	 else{
		$plate  = self::maxPlate($_GET['invoice']) +1;
	 }
// return $plate;
  $date = date("m/d/y"); 
 foreach($_GET['localOrder'] as $key=>$value){
	$qty =$_GET['localQuantity'][$key];
	$product_id =$value;
	 $price  = self::getColById('products', 'product_id', $product_id, 6);

		$amount = $price * $qty; 
	$stmt = $conn->db->prepare("INSERT INTO sales_order (invoice, qty, amount, product_id, price, date, plate) 
 VALUES (:invoice, :qty, :amount, :product_id, :price, :date, :plate)"); 
 $stmt->execute(array(':invoice'=>$_GET['invoice'],':qty'=>$qty,
':amount'=> $amount,':product_id'=> $product_id,':price'=> $price, ':date'=> $date,  ':plate'=> $plate));
  
}
  
  
else:
return 10;
endif;
 
}
 
//localPlusMinus
public static function localPlusMinus()
{

$conn = Database::getInstance();
 global $GetSession; 
if($GetSession->loggedin== TRUE):


 $plate = $_GET['plate'];
 $invoice = $_GET['invoice'];
 $sub = $_GET['sub'];

$newPlate  = self::maxPlate($invoice) +1;
  $stmt = $conn->db->prepare("SELECT * FROM sales_order WHERE invoice=? AND plate = ?");
  $stmt->execute(array($invoice, $plate));
  $OldValues =  $stmt->fetchAll();
  $total = $stmt->rowCount();

 foreach($OldValues as $VALUES)
 { 

  $stmt = $conn->db->prepare("INSERT INTO sales_order (invoice, qty, amount, product_id, price, date, plate) 
 VALUES (:invoice, :qty, :amount, :product_id, :price, :date, :plate)"); 
 $stmt->execute(array(':invoice'=>$invoice,':qty'=>$VALUES['qty'],
':amount'=> $VALUES['amount'],':product_id'=> $VALUES['product_id'],':price'=> $VALUES['price'], ':date'=> $VALUES['date'],  ':plate'=> $newPlate));
  
}
return 1;

/*
  for ($i=0; $i < $total; $i++) 
  { 
    # code...
  
  }*/

else: //log out
return 10;


  endif;
}
 
 
 //redAddQuantity
 
public static function redAddQuantity(){
$conn = Database::getInstance();
 global $GetSession; 
if($GetSession->loggedin== TRUE):
  //$m =$_GET['main'];
 
 $transaction_id = $_GET['transaction_id'];
 $qty = $_GET['qty'];
 $sub = $_GET['sub'];
 
  $product_id=self::getColById('sales_order', 'transaction_id', $transaction_id, 4);
 $price =$amount = self::getColById('products', 'product_id', $product_id, 6);
	 

 
 //get the category of the product
$category  = self::getColById('products', 'product_id', $product_id, 4); 
  
  //get sales_order quantity for the product
	  $quantity = self::getColById('sales_order', 'transaction_id', $transaction_id, 2);
	  
  
 $qty_val = 1;
	 
	 
	 if($sub == "minus"){
			 // get available quantity
	 //substract qty by 1
	 // substract amount by product price
	 

	  if($quantity > $qty_val): 
	  //quantity is greater than 1
	  ////add 1 to product
self::plusProduct($product_id, $qty_val);
//then update sales by removing 1

	  $updateClass = $conn->db->prepare("UPDATE sales_order SET qty=qty - :qty_val,  amount=amount - :amount  WHERE transaction_id=:transaction_id ");
 $updateClass->execute(array(':qty_val'=>$qty_val, ':amount'=>$amount, ':transaction_id'=> $transaction_id));

	 if($updateClass):    return 1; else: return 0;	endif;

//what if the sales quantity is less than 1

elseif($quantity <= $qty_val):
	  $result =$conn->db->prepare("DELETE FROM sales_order WHERE transaction_id= :memid");
	$result->bindParam(':memid', $transaction_id);
	if($result->execute()) { 
self::plusProduct($product_id, $qty_val); return 1;	} else{return 0; }
  

endif;

	 /* 


	  */
  

 }

elseif($sub == "plus"){
	//this is for adding to product
	
  //use the category to check if its continental or bar or local and fish
	if($category=="L" || $category == "C" || $category=="D" || $category=="F"):
  
  //check the remaining product quantity
  
  $qty_left =self::getColById('products', 'product_id', $product_id, 3);
//if the qty left is lesser than 1 then exist for the given category
if(  $qty_left < 1 ):

//return menu finished
return 5; 
	endif;
	//end for category checking
 endif;

 //then continue by adding the product to sales_order

	  $updateClass = $conn->db->prepare("UPDATE sales_order SET qty=qty + :qty_val,  amount=amount + :amount  WHERE transaction_id=:transaction_id ");
 $updateClass->execute(array(':qty_val'=>$qty_val, ':amount'=>$amount,  ':transaction_id'=> $transaction_id));
	 if($updateClass): 
	 //minus 1 from product
	 	self::minusProduct($product_id, $qty_val);
	 return 1; else: return 0;	endif;
	
}
	else {
	
	// //here is for change in input field
	

 //if value provided is lesser than 1
	  if($qty < 1):
	 
	 //check for iniital quantity value
	 //add the value to product
	 self::plusProduct($product_id, $quantity);

//then delete the product from sales_order
	  $result =$conn->db->prepare("DELETE FROM sales_order WHERE transaction_id= :memid");
	$result->bindParam(':memid', $transaction_id);
	$result->execute();

return 1;
	//otherwise the quantity is not 0 and the quantity is not more than product quantity
	elseif($qty >= 1):
		 //use the category to check if its continental or bar or local and fish
	if($category=="L" || $category == "C" || $category=="D" || $category=="F"):
  
  //check the remaining product quantity
  
  $qty_left =self::getColById('products', 'product_id', $product_id, 3);
//if the qty left is lesser than 1 then exist for the given category
if( $qty > $qty_left  ):

//return menu finished
return 5; 
	endif;
	//end for category checking
 endif;
	//so multiply the given value woth amount
	 $amount = $qty * $amount;
	 //update with the values
	  $updateClass = $conn->db->prepare("UPDATE sales_order SET qty=:qty_val,  amount=:amount  WHERE transaction_id=:transaction_id ");
 $updateClass->execute(array(':qty_val'=>$qty, ':amount'=>$amount, ':transaction_id'=> $transaction_id));
	 if($updateClass): 
	 	//minus from product
  	self::minusProduct($product_id, $qty);
	 return 1; else: return 0;	endif;
	

	endif;
}
	 
	   
	  
    
 
 //$made = self::existTwo('sales_order', "product_id",  "invoice",   $_GET['product_id'], $_GET['invoice']);
 
 
else:
return 10;

endif;
 
}
 

 
 
 //AcceptOrder 
public static function AcceptOrder(){
$conn = Database::getInstance();
 global $GetSession; 
if($GetSession->loggedin== TRUE):
  $m =$_GET['main'];
 
  $ivat=self::getColById('products', 'product_id', $_GET['product_id'], 5);
 $price =  $ivat=self::getColById('products', 'product_id', $_GET['product_id'], 6);
	 
 
 $qty =$_GET['qty'];
 
 	 $discount =0;
	 $pd = $price - $discount;
$amount = $pd * $qty;
$vat = $ivat * $qty;
    
 
 $made = self::existTwo('sales_order', "product_id",  "invoice",   $_GET['product_id'], $_GET['invoice']);
 


 if($made > 0) {
	 
	 
	 $transaction_id =  self::getColById2('sales_order', "product_id",  "invoice",   $_GET['product_id'], $_GET['invoice'], 0);
	 
	 $updateClass = $conn->db->prepare("UPDATE sales_order SET qty=qty + :qty,  amount=amount + :amount,
	 price=price + :price,  vat=vat + :vat,  discount=discount + :discount 
	 WHERE transaction_id=:transaction_id ");
 $updateClass->execute(array(':qty'=>$qty, ':amount'=>$amount, ':price'=>$price, ':vat'=>$vat, 
 ':discount'=>$discount, ':transaction_id'=> $transaction_id));
	 
	 if($updateClass):  return 1; else: return 0;	endif;
	 
 }
  else {
	 
	 
 

 $stmt = $conn->db->prepare("INSERT INTO sales_order (invoice, qty, amount, product_id, price, vat, discount, date) 
 VALUES (:invoice, :qty, :amount, :product_id, :price, :vat, :discount, :date)"); 
if ($stmt->execute(array(':invoice'=>$_GET['invoice'],':qty'=>$qty,
':amount'=> $amount,':product_id'=> $_GET['product_id'],':price'=> $price,':vat'=> $vat,
':discount'=> $discount,':date'=> $_GET['date']))): return 1; else: return 0;	endif;
 }
 
else:
return 10;
endif;
 
}
 

 
public static function saveKitchenOrder(){
$conn = Database::getInstance();
 global $GetSession; 
if($GetSession->loggedin== TRUE):
 $amount=$_POST['amount']; 
 $status = "PAID";
$stmt = $conn->db->prepare("INSERT INTO sales (invoice_number,cashier,date,amount,discount,balance, status) 
 VALUES (:invoice_number, :cashier, :date, :amount, :discount, :balance, :status)"); 
 
$stmt->bindParam(':invoice_number', $_POST['invoice'], PDO::PARAM_STR); 
$stmt->bindParam(':cashier', $_POST['cashier'], PDO::PARAM_STR); 
$stmt->bindParam(':date', $_POST['date'], PDO::PARAM_STR); 
$stmt->bindParam(':amount', $_POST['amount'], PDO::PARAM_STR); 
$stmt->bindParam(':discount', $_POST['profit'], PDO::PARAM_STR);  
$stmt->bindParam(':balance', $amount, PDO::PARAM_STR);  
$stmt->bindParam(':status', $status, PDO::PARAM_STR);  
if ($stmt->execute()):  

return 1; else: return 0;	endif; 
 
else:
return 10;

endif;
}

public static function saveOrder(){
$conn = Database::getInstance();
 global $GetSession; 
if($GetSession->loggedin== TRUE):

  $invoice=$_POST['invoice'];

	$resultas = self::amountSumSalesOrder($invoice);
				 
				for($i=0; $rowas = $resultas->fetch(); $i++){
			$balance = 	$amount =  $rowas['sum(amount)'];
			 
				}
				
 $resulta = self::discountSumSalesOrder($invoice);
				 
				for($i=0; $qwe = $resulta->fetch(); $i++){
			 $discount=$qwe['sum(discount)'];			 
				}

 $ord_type=$_POST['ord_type'];
 		

 $date=$_POST['date'];
 
$vatPercentage = 12.5;
$vat = ($vatPercentage / 100) * $amount; 

$nhilPercentage = 0.025;
$nhil = $nhilPercentage * $amount;
 

$fundPercentage = 0.025;
$fund = $fundPercentage * $amount;

 $lastprice = $amount + $vat + $nhil + $fund; 
 


$stmt = $conn->db->prepare("INSERT INTO sales (invoice_number, cashier, date, amount, discount, tid, sid, hall, balance, ord_type, kitchen) 
 VALUES (:invoice_number, :cashier, :date, :amount, :discount, :tid, :sid,:hall, :balance, :ord_type, :kitchen)"); 
 
 
 $stmt->bindParam(':invoice_number', $_POST['invoice'], PDO::PARAM_STR); 
$stmt->bindParam(':cashier', $_POST['cashier'], PDO::PARAM_STR); 
$stmt->bindParam(':date', $date); 
$stmt->bindParam(':amount', $amount, PDO::PARAM_STR); 
$stmt->bindParam(':discount', $discount, PDO::PARAM_STR); 
 
$stmt->bindParam(':tid', $_POST['tid'], PDO::PARAM_INT); 

$stmt->bindParam(':sid', $_POST['seat'], PDO::PARAM_INT); 

$stmt->bindParam(':hall', $_POST['hid'], PDO::PARAM_INT);
 
$stmt->bindParam(':balance', $balance, PDO::PARAM_STR);  
$stmt->bindParam(':ord_type', $ord_type, PDO::PARAM_STR);  

$stmt->bindParam(':kitchen', $_POST['kitchen']);
// $stmt->bindParam(':vat', $vat);
// $stmt->bindParam(':nhil', $nhil);
// $stmt->bindParam(':fund', $fund);

 

if ($stmt->execute()): 
 
	$loadTblCond = self::loadTblCond('sales_order','invoice',$_POST['invoice']);
		
		for($i=1; $row= $loadTblCond->fetch();  $i++){
			
//    $made = self::existOne('printer', 'trans_id', $row['transaction_id']);
 
//  if($made < 1):
// 			$pnt = $conn->db->prepare("INSERT INTO printer (trans_id)  VALUES (:trans_id)"); 
// 			$pnt->bindParam(':trans_id', $row['transaction_id'], PDO::PARAM_INT); 
// 			$pnt->execute(); 
//    endif;
			
		}
 


return 1; else: return 0;	endif; 
 
else:
return 10;

endif;
}


public static function saveEditSales(){
$conn = Database::getInstance();


 global $GetSession; 
if($GetSession->loggedin== TRUE):
//get the invoice
 $invoice  = $_GET['invoice'];

//search for the total of order in the sales_order
//i mean the total amount
 $resultas = System::amountSumSalesOrder($invoice);
         $total = 0;
        for($i=0; $rowas = $resultas->fetch(); $i++){
       $balance =   $total=$rowas['sum(amount)'];
        // echo System::formatMoney($total, true);
        }
////now update the sales using the invoice numner


// $vatPercentage = 12.5;
// $vat = ($vatPercentage / 100) * $total;  

// $nhilPercentage = 0.025;
// $nhil = $nhilPercentage * $total; 
 

// $fundPercentage = 0.025;
// $fund = $fundPercentage * $total; 

// $lastprice = $total + $vat + $nhil + $fund; 
 
 
$updateClass = $conn->db->prepare("UPDATE sales SET amount=  :total, balance=  :balance  WHERE invoice_number= :invoice ");

 if($updateClass->execute(array(':total'=>$total, ':balance'=>$balance,  ':invoice'=> $invoice))):

return 1; else: return 0; endif; 

else:

  return 10;
endif;
}


public static function saveTakeOutOrder(){
$conn = Database::getInstance();
 global $GetSession; 
if($GetSession->loggedin== TRUE): 
 
  $invoice=$_GET['invoice'];
				$resultas = self::amountSumSalesOrder($invoice);
				 
				for($i=0; $rowas = $resultas->fetch(); $i++){
			$balance = 	$amount = $rowas['sum(amount)'];
			 
				}
				
 $resulta = self::discountSumSalesOrder($invoice);
				 
				for($i=0; $qwe = $resulta->fetch(); $i++){
			 $discount=$qwe['sum(discount)'];			 
				}

 $date=$_GET['date']; 
$stmt = $conn->db->prepare("INSERT INTO sales (invoice_number, cashier, date, amount, discount, balance) 
 VALUES (:invoice_number, :cashier, :date, :amount, :discount, :balance)"); 
 
$stmt->bindParam(':invoice_number', $invoice, PDO::PARAM_STR); 
$stmt->bindParam(':cashier', $_GET['cashier'], PDO::PARAM_STR); 
$stmt->bindParam(':date', $date); 
$stmt->bindParam(':amount', $amount, PDO::PARAM_STR); 
$stmt->bindParam(':discount', $discount, PDO::PARAM_STR);

$stmt->bindParam(':balance', $balance, PDO::PARAM_STR);   
 

if ($stmt->execute()):  
return 1; else: return 0;	endif; 
 
else:
return 10;

endif;
}

public static function addToOrder(){
$conn = Database::getInstance();
 global $GetSession; 
if($GetSession->loggedin== TRUE):
 $invoice=$_POST['invoice'];
 $Tnum=$_POST['Tnum'];
 
 $exist = self::existOne("sales", "invoice_number", $Tnum);
 
 if($exist > 0):
 
$loadTblCond = self::loadTblCond('sales_order','invoice',$_POST['invoice']);
		$tid = System::getName('sales', 'invoice_number', $Tnum, 0);	
		
		$amount=0;
		$balance=0;
		for($i=1; $row= $loadTblCond->fetch();  $i++){
			
			$amount+=$row['amount']; 
			
			$pnt = $conn->db->prepare("INSERT INTO printer (trans_id)  VALUES (:trans_id)"); 
			$pnt->bindParam(':trans_id', $row['transaction_id'], PDO::PARAM_INT); 
			$pnt->execute();
			}

			$updateClass = $conn->db->prepare("UPDATE sales_order SET invoice=:code1 WHERE invoice=:id ");
$updateClass->bindParam(':code1', $Tnum, PDO::PARAM_STR);   
$updateClass->bindParam(':id', $invoice, PDO::PARAM_STR);  
$updateClass->execute();
		

$oldAmount = System::getName('sales', 'invoice_number', $Tnum, 4);	
			
$balance = $newAmount = $oldAmount + $amount;

// $vatPercentage = 12.5;
// $vat = ($vatPercentage / 100) * $newAmount;  

// $nhilPercentage = 0.025;
// $nhil = $nhilPercentage * $newAmount; 
 

// $fundPercentage = 0.025;
// $fund = $fundPercentage * $newAmount; 
			
$amount = $newAmount + $vat + $nhil + $fund; 
 
$supdateClass = $conn->db->prepare("UPDATE sales  SET amount= :extra, balance= :balance  WHERE invoice_number=:in ");
$supdateClass->bindParam(':extra', $newAmount, PDO::PARAM_STR);   
$supdateClass->bindParam(':balance', $balance, PDO::PARAM_STR);   
// $supdateClass->bindParam(':vat', $vat, PDO::PARAM_STR);   
// $supdateClass->bindParam(':fund', $fund, PDO::PARAM_STR);   
// $supdateClass->bindParam(':nhil', $nhil, PDO::PARAM_STR);   
$supdateClass->bindParam(':in', $Tnum, PDO::PARAM_STR);  

if ($supdateClass->execute()): 
 

return 1; else: return 0;	

endif; 
		
		
 
 
 
 else:
 
 return 20;
 
 
 
 endif;
 
  
 
else:
return 10;

endif;
}

public static function saveLedger(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE): 
if($_POST['paying'] > $_POST['balance'])
{
return 2;
}
else{
$date = date("m/d/Y");
  
$balance=$_POST['balance']-$_POST['paying'];
 $stmt = $conn->db->prepare("INSERT INTO collection (date,name,invoice,amount,remarks,balance) 
 VALUES (:date,:invoice_number,:invoice,:amount,:remarks,:balance)"); 
if ($stmt->execute(array(':date'=>$date,':invoice_number'=>$_POST['invoice_number'],':invoice'=> $_POST['invoice'],
':amount'=> $_POST['amount'],':remarks'=> $_POST['remarks'],':balance'=> $balance))): 
 
 if($balance == 0):
$updateClass = $conn->db->prepare("UPDATE sales SET balance=:balance,due_date=:due_date WHERE invoice_number=:invoice_number ");
$updateClass->bindParam(':balance', $balance, PDO::PARAM_STR);
$updateClass->bindParam(':due_date', $_POST['remarks'], PDO::PARAM_STR); 
$updateClass->bindParam(':invoice_number', $_POST['invoice_number'], PDO::PARAM_INT);
if($updateClass->execute()){return 1;} else {return 0;} 

else:
$updateClass = $conn->db->prepare("UPDATE sales SET balance=:balance WHERE invoice_number=:invoice_number ");
$updateClass->bindParam(':balance', $balance, PDO::PARAM_STR); 
$updateClass->bindParam(':invoice_number', $_POST['invoice_number'], PDO::PARAM_INT);
if($updateClass->execute()){return 1;} else {return 0;} 
endif;
 else: return 0;	endif;
 }
 
else:
return 10;

endif;
}

public static function systemWindow(){ 
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE): 
 $A=0; $B=0; $C=0; $D=0;
   $mode = $_POST['mode'];
   if($mode=="Trial"){
   $days = $_POST['days'];
   if($days=="0008"): $D=0; elseif($days =="0016"): $C=1; $D=6;
   elseif($days=="0034"): $C=3; $D=4; elseif($days=="0064"): $C=6; $D=4;
   elseif($days=="0080"): $C=8; 
   endif;
 }
  
  $charFormat = self::NewGuid();  
	$id = 1;
 $c1 = substr_replace($charFormat,$A,0,1); 
 
 $c2 = substr_replace($c1,$B,5,1); 
 
  $c3 = substr_replace($c2,$C,10,1);  
  
 $c4 = substr_replace($c3,$D,15,1);  
 
 $Guid= self::NewGuidR($c4); 
 
$b= self::beedy($Guid); //decode
  $foruser =  self::NewGuidR( self::beedy($b));
  $system= self::NewGuidR( self::beedy($foruser)); //to be confirmed


$updateClass = $conn->db->prepare("UPDATE systemWindow SET code1=:code1, code2=:code2, codeKey=:codeKey, active=:active WHERE id=:id ");
$updateClass->bindParam(':code1', $foruser, PDO::PARAM_STR);  
$updateClass->bindParam(':code2', $system, PDO::PARAM_STR);  
$updateClass->bindParam(':codeKey', $Guid, PDO::PARAM_STR);  
$updateClass->bindParam(':active', $mode, PDO::PARAM_STR);  
$updateClass->bindParam(':id', $id, PDO::PARAM_STR);  
if($updateClass->execute()){return 1;} else {return 0;} 
  
else:
return 10;

endif;
}
 
public static function activateKey(){
$conn = Database::getInstance();
  
  $systemWindow =self::loadTable('systemWindow');
 
foreach($systemWindow as $det):
 //while($det = $systemWindow->fetch(PDO::FETCH_ASSOC)){
$code1 = $det['code1'];
$code2 = $det['code2'];
$codeKey = $det['codekey'];
$active = $det['active'];  
endforeach;
//}
$coder = self::charFormat($code2);
   $id = 1;
 $license = self::charFormat($_POST['name']);
 
 if($coder === $license): 
 $bd ="beedy"; 
$updateClass = $conn->db->prepare("UPDATE systemWindow SET code1=:code1, code2=:code2, codeKey=:codeKey, active=:active WHERE id=:id ");
$updateClass->bindParam(':code1', $bd, PDO::PARAM_STR);  
$updateClass->bindParam(':code2', $bd, PDO::PARAM_STR);  
$updateClass->bindParam(':codeKey', $bd, PDO::PARAM_STR);  
$updateClass->bindParam(':active', $bd, PDO::PARAM_STR);  
$updateClass->bindParam(':id', $id, PDO::PARAM_STR);  
if($updateClass->execute()){
$Guid = self::charFormat($codeKey);

$a= substr($Guid, 0,1);
$b= substr($Guid, 5,1);
$c= substr($Guid, 10,1);
$d= substr($Guid, 15,1);

 				
				$days=$a.$b.$c.$d;
	$from=date('Y-m-d');
	$dateFrom=date('Y-m-d');
$dateTo= date('Y-m-d', strtotime($dateFrom. '+'. $days.' days'));
	if($days >= 5000): $active="Life"; $dateTo="2099-12-12";  endif;		
				
$updateKey = $conn->db->prepare("UPDATE beedySystem SET code1=:code1, code2=:code2, codeKey=:codeKey, dateFrom=:dateFrom,
 dateTo=:dateTo, active=:active WHERE id=:id ");
$updateKey->bindParam(':code1', $code1, PDO::PARAM_STR);  
$updateKey->bindParam(':code2', $code2, PDO::PARAM_STR);  
$updateKey->bindParam(':codeKey', $codeKey, PDO::PARAM_STR);  
$updateKey->bindParam(':dateFrom', $from, PDO::PARAM_STR);  
$updateKey->bindParam(':dateTo', $dateTo, PDO::PARAM_STR);  
$updateKey->bindParam(':active', $active, PDO::PARAM_STR);  
$updateKey->bindParam(':id', $id, PDO::PARAM_STR); 
if($updateKey->execute()): return 1; else: return 0;
endif;
} else {return 0;} 
  
else: return 2; endif;
 
}

#############################insert functions###########################################

#############################update functions###########################################

public static function printOrder($id){
$conn = Database::getInstance();
 global $GetSession; 
 $status ="YES"; 
if($GetSession->loggedin== TRUE):  
$updateClass = $conn->db->prepare("UPDATE printer SET status=:s WHERE printId=:id ");
$updateClass->bindParam(':s', $status, PDO::PARAM_STR);  
$updateClass->bindParam(':id', $id, PDO::PARAM_INT);
if($updateClass->execute()){ 
	return 1;
	} else {return 2;} 
else:
return 10;
endif;
} 

public static function cancelOrder($id, $tid){
$conn = Database::getInstance();
 global $GetSession;
 $receipt_type="Cancelled Bill";
 $status ="YES";
 $two = 2;
if($GetSession->loggedin== TRUE):  
$updateClass = $conn->db->prepare("UPDATE printer SET status=:s, receipt_type=:r WHERE printId=:id ");
$updateClass->bindParam(':s', $status, PDO::PARAM_STR); 
$updateClass->bindParam(':r', $receipt_type, PDO::PARAM_STR); 
$updateClass->bindParam(':id', $id, PDO::PARAM_INT);
if($updateClass->execute()){
	
	$invoice =  self::getColById('sales_order', 'transaction_id', $tid, 1);
	$deduct =  self::getColById('sales_order', 'transaction_id', $tid, 3);

	$oldAmount =  self::getColById('sales', 'invoice_number', $invoice, 5);
	 
	$oupdateClass = $conn->db->prepare("UPDATE sales_order SET status=:so  WHERE transaction_id=:tid ");
$oupdateClass->bindParam(':so', $two, PDO::PARAM_STR);  
$oupdateClass->bindParam(':tid', $tid, PDO::PARAM_INT);
$oupdateClass->execute();

$balance =$newAmount = $oldAmount - $deduct;
	
// $vatPercentage = 12.5;
// $vat = ($vatPercentage / 100) * $newAmount;  

// $nhilPercentage = 0.025;
// $nhil = $nhilPercentage * $newAmount; 
 

// $fundPercentage = 0.025;
// $fund = $fundPercentage * $newAmount; 

//  $amount = $newAmount + $vat + $nhil + $fund; 

$supdateClass = $conn->db->prepare("UPDATE sales SET amount= :deduct,   balance= :bal  WHERE invoice_number=:in ");
$supdateClass->bindParam(':deduct', $newAmount);  
$supdateClass->bindParam(':bal', $balance);  
// $supdateClass->bindParam(':vat', $vat); 
// $supdateClass->bindParam(':nhil', $nhil); 
// $supdateClass->bindParam(':fund', $fund); 
$supdateClass->bindParam(':in', $invoice);
$supdateClass->execute();



	return 1;
	} else {return 2;} 
else:
return 10;
endif;
} 


public static function payButton($transaction_id){
$conn = Database::getInstance();
 global $GetSession;
 $status ="PAID";
if($GetSession->loggedin== TRUE):  
$updateClass = $conn->db->prepare("UPDATE sales SET status=:name WHERE transaction_id=:id ");
$updateClass->bindParam(':name', $status, PDO::PARAM_STR); 
$updateClass->bindParam(':id', $transaction_id, PDO::PARAM_INT);
if($updateClass->execute()){return 'Transaction Completed';} else {return "Error: Please try again later";} 
else:
return "Please log in to perform this transaction";
endif;
} 




public static function payAllBalances(){
$conn = Database::getInstance();
 global $GetSession;
 $status ="PAID";
 $pend ="PENDING";
if($GetSession->loggedin== TRUE):  
    if($_POST['kitchen'] == "ALL"): 

      $updateClass = $conn->db->prepare("UPDATE sales SET status=:name WHERE status=:pend ");
      $updateClass->bindParam(':name', $status, PDO::PARAM_STR); 
      $updateClass->bindParam(':pend', $pend, PDO::PARAM_STR); 
      if($updateClass->execute()): return 1; else: return 0; endif; 
    else:
        $updateClass = $conn->db->prepare("UPDATE sales SET status=:name WHERE kitchen=:id ");
        $updateClass->bindParam(':name', $status, PDO::PARAM_STR); 
        $updateClass->bindParam(':id', $_POST['kitchen'], PDO::PARAM_STR);
        if($updateClass->execute()): return 1; else: return 0; endif;
   endif;
else:
  return 10;
endif;
} 




public static function saveEditSub(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):  
$updateClass = $conn->db->prepare("UPDATE subcategory SET main=:main, sub=:sub WHERE subId=:id ");
$updateClass->bindParam(':main', $_POST['main'], PDO::PARAM_STR); 
$updateClass->bindParam(':sub', $_POST['sub'], PDO::PARAM_STR); 
$updateClass->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
if($updateClass->execute()){return 1;} else {return 0;} 
else:
return 10;
endif;
} 
 
public static function saveEditKit(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):  
$updateClass = $conn->db->prepare("UPDATE hall SET name=:name WHERE id=:id ");
$updateClass->bindParam(':name', $_POST['name'], PDO::PARAM_STR); 
$updateClass->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
if($updateClass->execute()){return 1;} else {return 0;} 
else:
return 10;
endif;
} 
 
public static function saveEditTbl(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):
$number =   substr(self::getColById('hall', 'id', $_POST['hall_id'], 1), 0,3)."-".$_POST['name'];
$updateClass = $conn->db->prepare("UPDATE htables SET id=:id, name=:name WHERE tid=:tid ");
$updateClass->bindParam(':name', $number, PDO::PARAM_STR); 
$updateClass->bindParam(':id', $_POST['hall_id'], PDO::PARAM_INT);
$updateClass->bindParam(':tid', $_POST['tid'], PDO::PARAM_INT);
if($updateClass->execute()){return 1;} else {return 0;} 
else:
return 10;
endif;
} 

 
public static function saveEditSeat(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):
 
$updateClass = $conn->db->prepare("UPDATE hseat SET tid=:tid, name=:name WHERE sid=:sid ");
$updateClass->bindParam(':name',  $_POST['name'], PDO::PARAM_STR); 
$updateClass->bindParam(':tid', $_POST['tid'], PDO::PARAM_INT);
$updateClass->bindParam(':sid', $_POST['sid'], PDO::PARAM_INT);
if($updateClass->execute()){return 1;} else {return 0;} 
else:
return 10;
endif;
} 
 
public static function saveEditUser(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):  
$updateClass = $conn->db->prepare("UPDATE user SET name=:name,username=:username,password=:password ,position=:position WHERE id=:id ");
$updateClass->bindParam(':name', $_POST['full_name'], PDO::PARAM_STR);
$updateClass->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
$updateClass->bindParam(':password', $_POST['password'], PDO::PARAM_STR); 
$updateClass->bindParam(':position', $_POST['position'], PDO::PARAM_STR); 
$updateClass->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
if($updateClass->execute()){return 1;} else {return 0;} 
else:
return 10;
endif;
} 
 
public static function saveEditSupplier(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):
$updateClass = $conn->db->prepare("UPDATE suppliers SET supplier_name=:supplier_name,supplier_address=:supplier_address,supplier_contact=:supplier_contact,contact_person=:contact_person,note=:note WHERE supplier_id=:supplier_id ");
$updateClass->bindParam(':supplier_name', $_POST['supplier_name'], PDO::PARAM_STR);
$updateClass->bindParam(':supplier_address', $_POST['supplier_address'], PDO::PARAM_STR);
$updateClass->bindParam(':supplier_contact', $_POST['supplier_contact'], PDO::PARAM_STR);
$updateClass->bindParam(':contact_person', $_POST['contact_person'], PDO::PARAM_STR);
$updateClass->bindParam(':note', $_POST['note'], PDO::PARAM_STR);
$updateClass->bindParam(':supplier_id', $_POST['supplier_id'], PDO::PARAM_INT);
if($updateClass->execute()){return 1;} else {return 0;} 
else:
return 10;
endif;
} 

public static function saveEditProduct(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):

 if($_POST['qty_left'] != null){
$check =1; 
 }
else{
	$check =0;
} 

$price = $_POST['selling_price'];
$updateClass = $conn->db->prepare("UPDATE products SET product_name=:product_name,
selling_price=:selling_price, price=:price,  checks=:checks,   qty_left=:qty_left WHERE product_id=:product_id "); 
$updateClass->bindParam(':product_name', $_POST['product_name'], PDO::PARAM_STR); 
$updateClass->bindParam(':selling_price', $_POST['selling_price'], PDO::PARAM_STR);
$updateClass->bindParam(':price', $price, PDO::PARAM_STR); 
$updateClass->bindParam(':checks', $check); 
$updateClass->bindParam(':qty_left', $_POST['qty_left'], PDO::PARAM_STR); 
$updateClass->bindParam(':product_id', $_POST['product_id'], PDO::PARAM_INT);
if($updateClass->execute()){return 1;} else {return 0;} 
else:
return 10;
endif;
} 

public static function saveEditCustomer(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):  
$updateClass = $conn->db->prepare("UPDATE customer SET customer_name=:customer_name,address=:address,contact=:contact WHERE customer_id=:customer_id ");
$updateClass->bindParam(':customer_name', $_POST['name'], PDO::PARAM_STR);
$updateClass->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
$updateClass->bindParam(':contact', $_POST['contact'], PDO::PARAM_STR); 
$updateClass->bindParam(':customer_id', $_POST['customer_id'], PDO::PARAM_INT);
if($updateClass->execute()){return 1;} else {return 0;} 
else:
return 10;
endif;
} 
 
public static function updateRestaurant(){
$conn = Database::getInstance();
 global $GetSession;
if($GetSession->loggedin== TRUE):  
$updateClass = $conn->db->prepare("UPDATE system  SET companyName=:companyName, CompanyEmail=:CompanyEmail, address=:address ,CompanyPhoneNum=:CompanyPhoneNum ");
$updateClass->bindParam(':companyName', $_POST['companyName'], PDO::PARAM_STR);
$updateClass->bindParam(':CompanyEmail', $_POST['CompanyEmail'], PDO::PARAM_STR);
$updateClass->bindParam(':address', $_POST['address'], PDO::PARAM_STR); 
$updateClass->bindParam(':CompanyPhoneNum', $_POST['CompanyPhoneNum'] );
if($updateClass->execute()){return 1;} else {return 0;} 
else:
return 10;
endif;
} 
 
#############################update functions###########################################

#############################delete functions###########################################
public static function deleteKitchen($id){
$conn = Database::getInstance();
$deleteInfo = $conn->db->prepare("DELETE FROM hall WHERE id = :reqId");
$deleteInfo->bindValue(":reqId",$id);
if($deleteInfo->execute()):
echo "Kitchen deleted successfully";
endif; 
}
public static function deleteSubCat($id){
$conn = Database::getInstance();
$deleteInfo = $conn->db->prepare("DELETE FROM SubCategory WHERE subId = :reqId");
$deleteInfo->bindValue(":reqId",$id);
if($deleteInfo->execute()):
echo "Sub Category deleted successfully";
endif; 
}
public static function deleteTable($id){
$conn = Database::getInstance();
$deleteInfo = $conn->db->prepare("DELETE FROM htables WHERE tid = :reqId");
$deleteInfo->bindValue(":reqId",$id);
if($deleteInfo->execute()):
echo "Table deleted successfully";
endif; 
}

//deleteSeat
public static function deleteSeat($id){
$conn = Database::getInstance();
$deleteInfo = $conn->db->prepare("DELETE FROM hseat WHERE sid = :reqId");
$deleteInfo->bindValue(":reqId",$id);
if($deleteInfo->execute()):
echo "Seat deleted successfully";
endif; 
}


public static function deleteUser($id){
$conn = Database::getInstance();
$deleteInfo = $conn->db->prepare("DELETE FROM user WHERE id = :reqId");
$deleteInfo->bindValue(":reqId",$id);
if($deleteInfo->execute()):
echo "User deleted successfully";
endif; 
}

public static function deleteSupplier($supplier_id)
{
$conn = Database::getInstance();
$deleteInfo = $conn->db->prepare("DELETE FROM suppliers WHERE supplier_id = :reqId");
$deleteInfo->bindValue(":reqId",$supplier_id);
if($deleteInfo->execute()):
echo "Supplier deleted successfully";
endif; 
}

public static function deleteProduct($product_id)
{
$conn = Database::getInstance();
$deleteInfo = $conn->db->prepare("DELETE FROM products WHERE product_id = :reqId");
$deleteInfo->bindValue(":reqId",$product_id);
if($deleteInfo->execute()):
echo "Product deleted successfully";
endif;

}
public static function deleteCustomer($customer_id)
{
$conn = Database::getInstance();
$deleteInfo = $conn->db->prepare("DELETE FROM customer WHERE customer_id = :reqId");
$deleteInfo->bindValue(":reqId",$customer_id);
if($deleteInfo->execute()):
echo "Customer deleted successfully";
endif;

}

public static function cancelSoldOrder()
{

    global $GetSession;
    if($GetSession->loggedin== TRUE):
  
        $conn = Database::getInstance();

        $invoice=$_POST['invoice'];  

        $qry =  self::loadTblCond2('sales_order','invoice', $invoice);

        foreach ($qry as $value)
         {
          # code...
           $qty = self::getColById('sales_order', 'transaction_id', $value['transaction_id'], 2);
            $product_id =self::getColById('sales_order', 'transaction_id', $value['transaction_id'], 4);

            self::plusProduct($product_id, $qty);
        }

        $result =$conn->db->prepare("DELETE FROM sales WHERE invoice_number= :invoice");
        $result->bindParam(':invoice', $invoice);
        $result->execute();

        $result1 =$conn->db->prepare("DELETE FROM sales_order WHERE invoice= :invoice");
        $result1->bindParam(':invoice', $invoice);
        if($result1->execute()): 
          return 1; 
         
          //loadTblCond_3
          $loadTblCond = self::loadTblCond('sales_order','invoice', $invoice); 
         
            for($i=1; $row= $loadTblCond->fetch();  $i++)
            {
             
               $made = self::existOne('printer', 'trans_id', $row['transaction_id']);
             
             if($made > 0):
             self::deletePrinter($row['transaction_id']);
         
             endif; 
           }
  
        else:
        return 2;
        
        endif; 
   else:
      return 10;
    endif;
   
}


public static function cancelCartMeal()
{
$conn = Database::getInstance();

	$id=$_GET['id'];
	$invoice=self::getColById('sales_order', 'transaction_id', $id, 1);
	$qty=self::getColById('sales_order', 'transaction_id', $id, 2);
	$product_id=self::getColById('sales_order', 'transaction_id', $id, 4);
	//edit qty_left
	$sql = $conn->db->prepare("UPDATE products 	SET qty_left=qty_left+? WHERE product_id=?" );
	$sql->execute(array($qty,$product_id));

	$result =$conn->db->prepare("DELETE FROM sales_order WHERE transaction_id= :memid");
	$result->bindParam(':memid', $id);
	if($result->execute()): 
	return 1;

 $made = self::existOne('printer', 'trans_id', $id);
 
 if($made > 0):
 self::deletePrinter($id);
 
 endif;
  
 
	else:
	return 2;
	
	endif; 

}



public static function cancelCartGrpMeal()
{
$conn = Database::getInstance();

	$plate=$_GET['plate'];
	$invoice=$_GET['invoice'];
//	$invoice=self::getColById('sales_order', 'transaction_id', $id, 1);
 
	$result =$conn->db->prepare("DELETE FROM sales_order WHERE invoice= ? AND plate =? "); 
	if($result->execute(array($invoice,$plate))): 
	return 1;

 
 $made = self::existTwo('sales_order', "product_id",  "invoice",   $_GET['product_id'], $_GET['invoice']);
   
  
 	$loadTblCond = self::loadTblCond3('sales_order','invoice', 'plate',$_POST['invoice'], $plate);
		
		for($i=1; $row= $loadTblCond->fetch();  $i++){
		 
   $made = self::existOne('printer', 'trans_id', $row['transaction_id']);
 
 if($made > 0):
 self::deletePrinter($row['transaction_id']);
 
 endif;
  
			
		}
 
 
 
	else:
	return 2;
	
	endif; 

}

public static function deletePrinter($id){
 
$conn = Database::getInstance();
	$result =$conn->db->prepare("DELETE FROM printer WHERE transaction_id= :memid");
	$result->bindParam(':memid', $id);
 $result->execute();
}

public static function emptySales($id){
 
$conn = Database::getInstance();
	$result =$conn->db->prepare("DELETE FROM sales WHERE invoice_number= :memid");
	$result->bindValue(':memid', $id);
 $result->execute();
}


public static function emptyCart()
{
$conn = Database::getInstance();

	$invoice=$_GET['invoice']; 
   //self::emptySales($invoice);  
   //
   // plusProduct($product_id, $qty)


$qry =  self::loadTblCond2('sales_order','invoice', $invoice);

foreach ($qry as $value)
 {
	# code...
	 $qty = self::getColById('sales_order', 'transaction_id', $value['transaction_id'], 2);
	  $product_id =self::getColById('sales_order', 'transaction_id', $value['transaction_id'], 4);

	  self::plusProduct($product_id, $qty);
}

  $result =$conn->db->prepare("DELETE FROM sales WHERE invoice_number= :invoice");
  $result->bindParam(':invoice', $invoice);
  $result->execute();

	$result1 =$conn->db->prepare("DELETE FROM sales_order WHERE invoice= :invoice");
	$result1->bindParam(':invoice', $invoice);
	if($result1->execute()): 
	return 1;

 
  //loadTblCond_3
 	$loadTblCond = self::loadTblCond('sales_order','invoice', $invoice);
   //$count =  $loadTblCond->rowCount();
 
  	for($i=1; $row= $loadTblCond->fetch();  $i++){
		 
   $made = self::existOne('printer', 'trans_id', $row['transaction_id']);
 
 if($made > 0):
 self::deletePrinter($row['transaction_id']);
 
 endif;
  
   
			
		}
 
 
	else:
	return 2;
	
	endif; 

}


#############################delete functions###########################################

 
public static function PasswordDecider() {
	$chars = "01012323453456456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 9) {
 
		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}

public static function createRandomPassword() {
	$chars1 = self::PasswordDecider();
	$chars2 = self::PasswordDecider();
	$chars = $chars1 + $chars2;
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {
 
		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	$last = $pass + $chars2;
	return "MG-".$last;
}



}
