<?php



function nbvalue($assetAmount, $assetDate,$useMonth, $monthlyAmount) {
		
		$dat= date('Y-m-d', strtotime($assetDate. '+'. $useMonth.' months'));
$today=date('Y-m-d');
		$dateTo=strtotime($dat);
$dateFrom=strtotime($assetDate);
 $dateDiff= $dateTo-$dateFrom;
	 $date= floor($dateDiff/(60*60*24));
  $m = $date/30;
$m= (int)$m;
 
 $dateToday=strtotime($today);
  $dateDiffs= $dateToday-$dateFrom;
	 $dates= floor($dateDiffs/(60*60*24));
  $ms = $dates/30;
	$ms= (int)$ms;
	
if($ms==0):
return 0;
elseif($ms < $m):
	 $used= round(abs($ms *$monthlyAmount),2);
	return $nbv=$assetAmount-$used;
	elseif($ms >= $m):
return $assetAmount;
	

endif;
	 }
	 
	 ?>