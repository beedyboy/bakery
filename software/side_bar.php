
				<!--  a side menu bar for admin
				add everything elarming with approvals and all-->
 
					 <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar" >
							
				   
						 
				<ul class="nav nav-pills flex-column ">
				<li class="nav-item">
					<a class="nav-link smartColor" href="#">  <span class="sr-only">(current)</span></a> </li>
				
				<li class="nav-item <?php if($active=="Dashboard"): echo 'active'; endif;?>">
				<a class="nav-link smartColor" href="index.php"><i class="icon-dashboard icon-2x"></i>Dashboard</a> </li>
			 
				<li class="nav-item <?php if($active=="Sales"): echo 'active'; endif;?>"> <a class="nav-link smartColor" href="newsales.php"><i class="icon-shopping-cart icon-2x"></i> Sales</a> </li> 
				<?php  if($GetSession->position !="Waiter" ): ?>
				
				<li class="nav-item <?php if($active=="Products"): echo 'active'; endif;?>"> <a class="nav-link smartColor" href="products.php"><i class="icon-list-alt icon-2x"></i> Products</a> </li>
				
				<li class="nav-item <?php if($active=="Suppliers"): echo 'active'; endif;?>"> <a class="nav-link smartColor" href="supplier.php"><i class="icon_contacts  icon-2x"></i> Suppliers</a> </li>				
				<?php endif; ?>
				
 
				<li class="nav-item <?php if($active=="BASKET"): echo 'active'; endif;?>"> <a class="nav-link smartColor" href="basket.php"><i class=" icon_bag_alt icon-2x"></i> My Basket</a></li> 
			<?php if($GetSession->position=="Admin" || $GetSession->position=="Manager"  || $GetSession->position=="Cashier"): ?>
				
				
		 <li class="nav-item <?php if($active=="SalesReport"): echo 'active'; endif;?>"> <a class="nav-link smartColor" href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Sales Report</a></li>    
				 
				<?php endif; ?>
				<?php  if($GetSession->position=="Admin" || $GetSession->position=="Manager" ): ?>	
					<li class="nav-item <?php if($active=="StaffReport"): echo 'active'; endif;?>"> <a class="nav-link smartColor" href="staffreport.php"><i class="icon-bar-chart icon-2x"></i> Staff Report</a></li>
			
			
<li class="nav-item <?php if($active=="Sales Evaluation"): echo 'active'; endif;?>"> <a class="nav-link smartColor" href="salesevaluation.php"><i class="icon-bar-chart icon-2x"></i> Sales Evaluation</a></li> 
				<?php endif; ?>
<?php  if($GetSession->position=="Admin" ): ?>	
				<li class="nav-item <?php if($active=="Users"): echo 'active'; endif;?>"> <a class="nav-link smartColor" href="user.php"><i class="icon_group icon-2x"></i> User Management</a> </li>
				<?php endif; ?>
							 
				
				<li class="nav-item"> <a class="nav-link smartColor" href="signout.php"><font color="red"><i class="icon-off icon-2x"></i></font><br> Logout</a></li>
				</ul>
			 
							 
				
						</nav>
				
		 
				 