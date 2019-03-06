<?php
	require_once('auth.php');
?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<title>
<?php echo $GetSession->companyName; ?>
</title>

    <link rel="shortcut icon" href="ico/facon.png">
<!-- js -->			
<link href="dist/beedy_kaydee.css" media="screen" rel="stylesheet" type="text/css" /> 

<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script> 

<link rel="stylesheet" href="public/css/font-awesome.css" />
    <link rel="stylesheet" href="public/css/font-awesome.min.css" />
       <link rel="stylesheet" href="public/css/elegant-icons-style.css" />
	   <link rel="stylesheet" href="web-fonts-with-css/css/fontawesome-all.css" />
    <link rel="stylesheet" href="public/css/jquery-ui.css" />
	
	  <link rel="stylesheet" href="public/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/style/custom.css" />   
	
	<link href="vendors/uniform.default.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" type="text/css" href="tcal.css" />
   
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/elegant-icons-style.css">
    
 

	<!-- combosearch box-->	
	
	  <script src="vendors/jquery-1.7.2.min.js"></script> 

	
<link rel="stylesheet" href="dist/sweetalert.css">
	<script src="dist/sweetalert-dev.js"></script>
	
 

<link href="../pos.css" rel="stylesheet" type="text/css" />
</head>
<body>


 <section class="">
	
	<div class="container ">
<div class="margin-adjust ">
	
  
 <input type="hidden" name="invoice"   id="invoice" value="<?php echo System::createRandomPassword(); ?>">
  
 
 <input type="hidden" name="cashier"   id="cashier" value="<?php echo $GetSession->name; ?>">
		
		<div class="bd-12  ">
		<div class="  newsales-menu">
		 
			<a href="index.php"><i class="fas fa-tachometer-alt fa-fw"></i>Dashboard</a>
		 <a href="newsales.php" class=""><i class="fas fa-shopping-cart fa-fw"></i>Sales </a> 
			<a href="#" id="takeout" class="ord_type"><i class="fas fa-truck-moving fa-fw"></i>Take Away</a>
			<a href="#" id="takein"  class="ord_type"><i class="fas fa-utensils fa-fw"></i>Dine In</a>
				<a href="#" class="refreshInvoive"><i class="fas fa-recycle fa-fw"></i>New Order</a>
			
	 
			<a href="#" onclick="toggleFullScreen(document.body);"><i class=" fas fa-window-restore  fa-fw"></i></a>
			<a href="#"><i class="fas fa-calculator fa-fw"></i>Calculator</a>
			<a href="signout.php"><i class="fas fa-power-off fa-fw"></i>Log Out</a>
			<a href="#"><i class=" fas fa-shopping-basket fa-fw"></i>Basket</a>
			
		</div>
	 
		</div>
	 
	
	

<div class="bd-12">
	

<table  width="100%" class="table table-striped table-bordered bg-light ">
                    <thead>
                        <tr> 
                            <th  width="10%">Trans  ID </th> 
                            <th width="15%">Date</th> 
                            <th width="15%">Invoice No </th> 
                            <th width="10%">Amount</th> 
                            <th width="10%">Balance</th> 
                            <th width="15%">Hall</th> 
                            <th width="10%">Table</th> 
                            <th width="10%">Seat</th>   
                        </tr>
                    </thead>
                     <tbody>
					 <?php
 $select = '';
	$output = array();
	$d = "PENDING";
	$cash = $GetSession->name;
	
	$conn = System::getInstance();
	
 $select = " SELECT   * FROM sales WHERE status LIKE '%".$d."%' AND cashier LIKE '%".$cash."%'   ";
 $rs  = $conn->db->prepare($select); 
		$rs->execute(); 
	$total = 0;
	 
		?>
		 
		<?php
	foreach($rs as $row)
	{ 
		echo "<tr>";  
		 
		echo "<td>".  $row['transaction_id']."</td>";
	echo "<td>".   $row['date']."</td>";
	echo "<td class='viewInvoiceValue'>".    $row['invoice_number']."</td>";
	echo "<td>".     System::formatMoney($row['amount'], true)."</td>";
	//echo "<td>".   System::formatMoney($row['balance'], true)."</td>";
	echo "<td>".    $row['amount'] ."</td>";
	
	$hall_id = System::getName('hall', 'id', $row['hall'], 1);
	if($hall_id == false):
	$hall = "-";
	else:
	$hall = $hall_id;
	endif;
	
	echo "<td>".   $hall."</td>";
	
	$table_id = System::getName('htables', 'tid', $row['tid'], 2);	
	if($table_id == false):
	$htables = "-";
	else:
	$htables = $table_id;
	endif;
	
	
	echo "<td>".   $htables."</td>";
	
	$seat_id = System::getName('hseat', 'sid', $row['sid'], 2);	
	if($seat_id == false):
	$hseat = "-";
	else:
	$hseat = $seat_id;
	endif;
	
	echo "<td>".   $hseat."</td>";
	
	
	
	echo "</tr>"; 

	$total +=$row['amount'];
	}
 
	
 ?>
 
 <tr>
<td colspan="3"> </td>
<td class="alert-primary">Total: &cent;<?php echo System::formatMoney($total, true); ?></td>
 </tr>
					 
                     </tbody>
                </table>
 
</div>

</div>
	<!-- row ends up -->
	</div>
</section> 
<!-- end of section -->

 
 <?php include('footer3.php'); ?>
 
 <script>
	
	
	function toggleFullScreen(elem) {
    // ## The below if statement seems to work better
	//## if ((document.fullScreenElement && document.fullScreenElement !== null) ||
	//(document.msfullscreenElement && document.msfullscreenElement !== null) ||
	//(!document.mozFullScreen && !document.webkitIsFullScreen)) {
	
 
    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (elem.requestFullScreen) {
            elem.requestFullScreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullScreen) {
            elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }
}
	 
 </script>
</body>

</html>

     