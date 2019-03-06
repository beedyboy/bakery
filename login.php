 <?php
 global $GetSession; ?>
<html>
<head>
<title>
<?php echo $GetSession->companyName; ?>
</title>
    <link rel="shortcut icon" href="software/ico/facon.png">

  <link href="software/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="software/css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="software/css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="software/css/bootstrap-responsive.css" rel="stylesheet">

<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
<script src="software/lib/jquery.js" type="text/javascript"></script>
</head>
<body>
    <div class="container-fluid">
      <div class="member-fluid">
		<div class="span4">
		</div>
	
</div>
<div id="login">

<form id="login-form" class="submitForm" role="form" action="#">

<input type="hidden" name="action" value="login" />
			<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 15px #000; color:#fff;"><center>
			 <?php echo  $GetSession->companyName; ?></center></font>
		<br>

		
<div class="input-prepend">
		<span style="height:30px; width:25px;" class="add-on"><i class="icon-user icon-2x"></i></span><input style="height:40px;" type="text" name="username" Placeholder="Username" required/><br>
</div>
<div class="input-prepend">
	<span style="height:30px; width:25px;" class="add-on"><i class="icon-lock icon-2x"></i></span><input type="password" style="height:40px;" name="password" Placeholder="Password" required/><br>
		</div>
		<div class="qwe">
		
		 <button class="btn btn-large btn-primary btn-block pull-right"  type="submit"><i class="icon-signin icon-large"></i> Login</button>
</div>
<div class="">
<br />
<br />

<div id="login-bottom" class="alert hide" style="margin:20px 0 0;"></div>
	</div>
	</form>


		 </div>
</div>
</div>
</div>
<script src="software/js/beedy.js" type="text/javascript"></script> 
</body>
</html>