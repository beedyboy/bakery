<div id="mainbody">  
	<!--<?php if($GetSession->position=="Admin" || $GetSession->position=="Manager" || $GetSession->position=="Local Kitchen"): ?>
<a href="local.php?invoice=<?php echo $finalcode ?>"><i class="icon_c icon-shopping-cart icon-2x"></i><br> Local Kitchen</a>    
<?php endif; ?>  
-->
<?php  if($GetSession->position !="Local Kitchen"): ?>
         
<?php if($GetSession->position=="Admin" || $GetSession->position=="Manager"  || $GetSession->position=="Waiter"): ?>
<a href="newsales.php"><i class="icon_c icon-shopping-cart icon-2x"></i><br> Sales</a>    

<a href="mybasket.php"><i class="icon_c icon_bag_alt icon-2x"></i><br> Basket</a>    
<?php endif; ?>  

         
<?php  if($GetSession->position !="Waiter" && $GetSession->position !="Cashier" ): ?>
<a href="products.php"><i class="icon_c icon-list-alt icon-2x"></i><br> Products</a>    


<a href="supplier.php"><i class="icon_contacts icon_c icon-2x"></i><br> Suppliers</a>     

<?php endif; ?>


<?php if($GetSession->position=="Admin" || $GetSession->position=="Manager"  || $GetSession->position=="Cashier"): ?> 

<a href="salesreport.php?d1=0&d2=0"><i class="icon_c icon-bar-chart icon-2x"></i><br> Sales Report</a>

<a href="accountreceivables.php?d1=0&d2=0"> <i class="icon_c icon_flowchart  icon-2x"></i><br> Account Receivable  </a>   
 

<?php endif; ?>

 

<?php  if($GetSession->position=="Admin"): ?>
<a href="staffreport.php"><i class="icon_c icon-bar-chart icon-2x"></i><br>  Staff Report</a>
<a href="salesevaluation.php"><i class="icon_c icon-bar-chart icon-2x"></i> <br> Sales Evaluation</a>
<a href="user.php"><i class="icon_c icon_group icon-2x"></i><br> User Management</a>   

<a href="generalSettings.php"><i class="icon_c icon-cog icon-2x"></i><br> General Settings</a>

<a rel="facebox" href="backup.php"><i class="icon_c icon_cloud_alt  icon-2x"></i><br> Back up</a> 

<a href="activation.php"><i class="icon_c icon-key icon-2x"></i><br> Activation</a>

   
<?php endif; ?>   
<?php endif; ?>
<a href="signout.php"><i class="icon_c icon-off icon-2x"></i><br> Logout</a> 
 
<div class="clearfix"></div>
</div>