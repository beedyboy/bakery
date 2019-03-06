<?php 
include('auth.php');
$main = $_POST['main']; 
$loadTblCond = System::loadTblCond('subcategory', 'main', $main); ?>
<?php 
if(!empty($loadTblCond)): 
?>
<select class="form-control" name="subId" required>
<option value="">Select Sub-Category</option>
<?php
while($Table = $loadTblCond->fetch()){
?>	
<option value="<?php echo $Table['subId']; ?>" > <?php echo $Table['sub']; ?></option>
<?php 
}
?>
</select>
<?php
endif; 
?>