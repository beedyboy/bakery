			
	
		<nav class="navbar navbar-expand-md navbar-dark fixed-top navbar-smartShopper-custom "  role="navigation">
						  <a class="navbar-brand" href="#">
						  <img src="ico/loogo.png" width="100%" height="57" alt="SmartShopper" >
						  
						  </a>
						  
						 
						  
			 <form class="head" name="clock">
				
	  <input style="  height: 30px;" type="text" class="disable trans"
				name="face" value="">
			 </form> 	  
						  
						  <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#serverMenu" aria-controls="serverMenu" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						  </button>
					
						  <div class="collapse navbar-collapse " id="serverMenu">
							<ul class="navbar-nav  ml-auto">
							  
							  <li class="nav-item">
								<a class="nav-link" href="#">
								 <i class="icon-calendar icon-large"></i>
									<?php
									$Today = date('y:m:d',time());
									$new = date('l, F d, Y', strtotime($Today));
									echo $new;
									?>	 
								</a>
							  </li>
							
							
							  <li class="nav-item">
								<a class="nav-link" href="#">
									<i class="icon-user icon-large"></i> Welcome:<strong> <?php echo  $GetSession->name; ?></strong>
								</a>
							  </li>
							
							  <li class="nav-item">
								<a class="nav-link" href="signout.php"><i class="icon-off icon-large"></i>Log out</a>
							  </li> 
							</ul>
							
						  </div>
						</nav>
					
					
		<!-- main body starts here -->
	<section class="container-fluid">
	<div class="row">	
			 