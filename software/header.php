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
    <link rel="stylesheet" href="public/css/jquery-ui.css" />
	
	   <link rel="stylesheet" href="web-fonts-with-css/css/fontawesome-all.css" />
	  <link rel="stylesheet" href="public/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/style/custom.css" />   
	
	<link href="vendors/uniform.default.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" type="text/css" href="tcal.css" />
   
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/elegant-icons-style.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

	<!-- combosearch box-->	
	
	  <script src="vendors/jquery-1.7.2.min.js"></script> 

	
<link rel="stylesheet" href="dist/sweetalert.css">
	<script src="dist/sweetalert-dev.js"></script>
	
<link href="../smartshopper.css" media="screen" rel="stylesheet" type="text/css" />
 

<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>

 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M" : " A.M"
document.clock.face.value = timeValue; 
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</script>	
</head> 
<script type="text/javascript"> 
function beedyAlert(msg){
swal({
 title: "License alert!",
 text: msg,
 timer: 8000,
 imageUrl: "images/security_f2.jpg",
 showConfirmButton: true
});
}

   
 
</script>
	<?php  

  if(active=="Trial" || active=="One-Off"):

  if(bdLast > 15 && bdLast <= 40):

    ?>
    <script type="text/javascript">

    var daysLeft= <?php echo bdLast; ?>;
 //beedyAlert("You have " + daysLeft + " days left");
 
  </script>
  <?php
  elseif(bdLast > 0 && bdLast <= 5):

      ?>
      <script type="text/javascript">

      var daysLeft= <?php echo bdLast; ?>;
    beedyAlert("You have " + daysLeft + " days left");
    //alert("You have " + daysLeft + " days left");

    </script>
    <?php
  endif;

   if(bdLast <= 0 ):
     //header("location: ../activation.php");
		 ?>
              <script>
  beedyAlert('licence has expired!!! Kindly purchase a licence key');
  //window.location='../activation.php';
   setTimeout( function() { window.location='../activation.php'; },5000);
 </script>

 <?php
 endif;
endif;
 
?>
   