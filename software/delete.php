<?php
require_once "classes/db.php";
require_once "classes/functions.php";
$conn = Database::getInstance();
date_default_timezone_set("Etc/GMT-8");
if(isset($_POST['action'])){ 
//started here 
  $action= $_POST['action']; 
  if($action=="deleteSupplier"):
  $supplier_id= $_POST['supplier_id'];
echo System::deleteSupplier($supplier_id);

elseif($action=="deleteProduct"):   
echo  System::deleteProduct($_POST['product_id']);
 
elseif($action=="deleteCustomer"):   
echo  System::deleteCustomer($_POST['customer_id']);
 
elseif($action=="deleteUser"):   
echo  System::deleteUser($_POST['id']);
 
elseif($action=="deleteKitchen"):   
echo  System::deleteKitchen($_POST['id']);
 
elseif($action=="deleteTable"):   
echo  System::deleteTable($_POST['id']);
 
 //deleteSeat 
elseif($action=="deleteSeat"):   
echo  System::deleteSeat($_POST['id']);

elseif($action=="deleteSubCat"):   
echo  System::deleteSubCat($_POST['id']);

endif;
}
?>
