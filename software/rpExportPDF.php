<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
			include_once('classes/functions.php');
			$conn = Database::getInstance();
			
			
include('classes/fpdf.php');
//include('fpdf.php'); 


class PDF extends FPDF
{
	protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';
function WriteHTML($html)
{
    // HTML parser
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Tag
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extract attributes
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}


function OpenTag($tag, $attr)
{
    // Opening tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Closing tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modify style and select corresponding font
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    // Put a hyperlink
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}
/*
public function loadData($d1,$d2){

$full_name= System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 1).'\t'. 
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 2).'\t'.
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 3);  
 $term = Database::getName('beedyschoolterm', 'SchoolTermId',$SchoolTermId,1); 
$batch = Database::getName('genStudentBatches', 'genStdBatchId',$genStdBatchId,1);
$head = $full_name.'\t'.'-'.$batch.'\t'.'-'.$term;
//  $filename = $head.'.pdf'; //Change File type CSV/TXT etc
 	  
$resultClass  = $GetExam->resultClass($bankId,$genStdBatchId,$SchoolTermId);
 
}
 
 */

// Colored table
function FancyTable($header, $data)
{
	// Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	// Header
	$w = array(  40, 40, 40, 40,40);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	$this->Ln();
	// Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	// Data
	$fill = false;
	$j=0;
	foreach($data as $LIST)	{
		
		
		
		 //MultiCell($w, $h, $txt, $border=0, $align='J', $fill=false)
 
//$this->Cell($w[0],6, $j,'LR',0,'C',$fill);
//$this->Cell($w[0],6, $LIST['transaction_id'],'LR',0,'C',$fill);
$this->Cell($w[0],6, $LIST['cashier'],'LR',0,'C',$fill);
$this->Cell($w[1],6,$LIST['date'],'LR',0,'C',$fill);
$this->Cell($w[2],6, $LIST['invoice_number'],'LR',0,'C',$fill);
$this->Cell($w[3],6,System::formatMoney($LIST['amount'], true),'LR',0,'C',$fill);
$this->Cell($w[3],6,System::formatMoney(System::getColById('sales', 'invoice_number', $LIST['invoice_number'], 4)),'LR',0,'C',$fill);
$this->Ln();
$fill = !$fill;
}


 
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}

} 
	 $d1=$_GET['d1'];
				$d2=$_GET['d2'];
			
	  
 $resultClass  = System::salesRpDate($d1,$d2);
 $html ='<para><h1>Sales Report between ' .$d1. ' and '. $d2.' </h1><br>';
$total = 0;
  $results = System::salesReportAmount($d1,$d2);
                for($i=0; $rows = $results->fetch(); $i++){
                $dsdsd=$rows['sum(amount)'];
                $total = System::formatMoney($dsdsd, true);
                }
 
	 ob_end_clean();
	 ob_start();

$pdf = new PDF();
// Column headings
$header = array( 'Cashier', ' Date', 'Invoice Number ', 'Amount', 'Grand Total');
// Data loading
//$data = $pdf->loadData($GetExam, $stdAddNum,$genStdBatchId,$SchoolTermId);
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->WriteHTML($html); 
$pdf->FancyTable($header,$resultClass);  
$pdf->WriteHTML("The Total sales amount is:  ".$total);

$pdf->Output();
ob_end_flush();
?>
