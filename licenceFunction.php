
<?php 
function NewGuidR($s) { 
     $guidText = 
        substr($s,0,4) . '-' . 
        substr($s,4,4) . '-' . 
        substr($s,8,4). '-' . 
        substr($s,12,4); 
    return strtoupper($guidText);
}
function beedy($beedy) {
	 
					$chars = "BEEDYBOLADE";
					$pass= rtrim(base64_encode($beedy), "=");
					return strtoupper($pass);
				}
 function DemoGuid($y) { 
      $s = strtoupper(md5(uniqid(rand(),true))); 
    $guidText = 
        substr($s,0,4) . '-' . 
        substr($s,4,4) . '-'.$y . 
        substr($s,8,3). '-' . 
        substr($s,11,4); 
    return $guidText;
}
  function NewGuid() { 
    $s = strtoupper(md5(uniqid(rand(),true))); 
    $guidText = 
        substr($s,0,4) . 
        substr($s,4,4) . 
        substr($s,8,4).  
        substr($s,12,4); 
    return $guidText;
}
?>