<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
require('fpdf.php');

class PDF extends FPDF
{
function conv($string) {
return iconv('UTF-8', 'TIS-620', $string);
}
//Load data
function LoadData($file)
{
	//Read file lines
	$lines=file($file);
	$data=array();
	foreach($lines as $line)
		$data[]=explode(';',chop($line));
	return $data;
}

//Simple table
function BasicTable($header,$data)
{
	//Header
	$w=array(50,50,40,50);
	//Header
	for($i=0;$i<count($header);$i++)
	$this->Cell($w[$i],7,iconv('UTF-8', 'TIS-620', $header[$i]),1,0,'C');
	$this->Ln();
	//Data
	foreach ($data as $eachResult) 
	{
		$this->Cell(50,6,$eachResult["subjects_id"],1,0,'C');
		$this->Cell(50,6,$eachResult["subjects_name"],1);
		$this->Cell(40,6,$eachResult["subjects_cecp"],1,0,'C');
		$this->Cell(50,6,$eachResult["num"],1,0,'C');
		$this->Ln();
	}
	//Closure line
	$this->Cell(array_sum($w),0,'','T');
}

}

$pdf=new PDF();
//Column titles
$header=array('รหัสวิชา','ชื่อวิชา','การประเมิน','จำนวนนักศึกษาสอบ');
//Data loading

//*** Load MySQL Data ***//
$objConnect = mysqli_connect('localhost','root','','login_db');
mysqli_set_charset($objConnect, "tis620");
$strSQL = "SELECT subjects_name,subjects_id,subjects_cecp,SUM(num)AS num FROM addsubjectsregisters GROUP BY subjects_name";
$objQuery = mysqli_query($objConnect,$strSQL);
$resultData = array();
for ($i=0;$i<mysqli_num_rows($objQuery);$i++) {
	$result = mysqli_fetch_array($objQuery);
	array_push($resultData,$result);
}

$pdf->AddFont('angsa','','angsa.php');
$pdf->SetFont('angsa','',14);
$pdf->AddPage();
$pdf->Cell(0,1,iconv('UTF-8','TIS-620','รายวิชาสอบเทียบโอนนอกระบบและอัธยาศัยเข้าสู่ในระบบ คณะบริหารธุรกิจ'),0,1,"C");
$pdf->Ln(5);
$pdf->BasicTable($header,$resultData);
$pdf->Output("MyPDF/MyPDF2.pdf","F");
?>

PDF Created Click <a href="MyPDF/MyPDF2.pdf">here</a> to Download
</body>
</html>