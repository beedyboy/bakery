<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
            include_once('classes/functions.php');
            $Database = new Database;
			$conn = $Database->getDb(); 
          
          $conn->beginTransaction();
          
            $changes = $conn->exec("ALTER TABLE `sales` ADD `nhil` VARCHAR(30) NULL AFTER `ord_type`, 
    ADD `fund` VARCHAR(30) NULL AFTER `nhil`, 
    ADD `vat` VARCHAR(30) NULL AFTER `fund`");

          
         if($conn->commit()):
        header('location: ../'); 
            
         endif;
         

          
            ?>
         