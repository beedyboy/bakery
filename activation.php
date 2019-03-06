
<?php 

require_once "software/classes/db.php";
require_once "software/classes/functions.php";
require_once "software/system.php";
?>
<html>
<head>
<title>
<?php echo $GetSession->companyName; ?>
</title>
 <link rel="shortcut icon" href="software/ico/facon.png">
 		
<link href="software/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />

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
</head>
<body>
    <div class="container-fluid">
      <div class="member-fluid">
	<?php
$position=$GetSession->position;
if($position=='cashier') {
$hide = 'hide';
 
} 
$active = "Activation Window";
?> 
	 
 	<div class="span10">
	<div class="contentheader">
			<i class="icon-table"></i> Activation Window
			</div>
			 <div class="span4">
		</div>
	
</div>
<div id="act">

 
 <a rel="facebox" href="licenceKey.php">
 <Button type="submit" class="btn btn-info" style="float:left; width:230px; height:35px;" />
 <i class="icon-plus-sign icon-large"></i> Insert License Key</button></a> 
 
 <a rel="facebox" href="systemWindow.php">
 <Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" />
 <i class="icon-plus-sign icon-large"></i> Renew License</button></a><br><br>
 
 
 
 <div class="submitForm">
 <div class="row">
 <div class="col-md-10">

 <h1>SMARTSHOPPER POINT OF SALES SYSTEM</h1>
 <hr />
 <?php $systemWindow =System::loadTable('systemWindow');
while($det = $systemWindow->fetch(PDO::FETCH_ASSOC)){
$code1 = $det['code1'];
$code2 = $det['code2'];
$codeKey = $det['codekey'];
$active = $det['active']; 
}
if($codeKey !="beedy"):
 ?>
 <table class="table table-bordered">
 <tr>
 <th>Serial Number</th> <td ><span class="btn btn-danger">  <?php echo $code1; ?> </span> </td>
 </tr>
  
  <tr>
 <th>Mode</th> <td class="text-success"><span class="btn btn-success"> <?php echo $active;  ?></span></td>
 </tr>


 </table> 
<br > <br/>
<?php
endif;
?>
 <table class="table table-striped">
 <tr>
 <th>Licensed to</th> <td ><span class="badge ">  <?php print $GetSession->companyName; ?> </span> </td>
 </tr>

  <tr>
 <th>Expiry Date</th> <td class="badge">  <?php print date('l jS F (Y-m-d)', strtotime(dateTo)); ?> </td>
 </tr>

  <tr>
 <th>Day(s) Left</th> <td> <span class="badge"> <?php print bdLast;   ?></span>  </td>
 </tr>
  <tr>
 <th>Status</th> <td class="badge text-success"> <?php  if(bdLast >= 0): echo "Active"; endif;   ?> </td>
 </tr> 
 </table>
  
 </div>
  </div>
	
	</div>
 
</div>
</div>
 
<script src="software/lib/jquery.js" type="text/javascript"></script>
 <script src="software/src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'software/src/loading.gif',
      closeImage   : 'software/src/closelabel.png'
    })
  })
</script>
  
<script src="software/js/beedy.js" type="text/javascript"></script> 
<script>

function demo(){
		if(document.getElementById('trial').checked)
{
//alert('checked');
document.getElementById('dWeeks').style.display = "block";
}
else{
document.getElementById('dWeeks').style.display = "none";
}

}

		</script>

</body>
</html>
