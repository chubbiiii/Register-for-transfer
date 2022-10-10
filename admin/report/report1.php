<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>
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
	$w=array(10,17,50,15,18,54,40,44,30);
	//Header
	for($i=0;$i<count($header);$i++)
	$this->Cell($w[$i],7,iconv('UTF-8', 'TIS-620', $header[$i]),1,0,'C');
	$this->Ln();
	//Data
		$rang=1;
	foreach ($data as $eachResult) 
	{
		$this->Cell(10,6,iconv('UTF-8','TIS-620',$rang),1,0,'C');
		$this->Cell(17,6,$eachResult["subjects_id"],1,0,'C');
		$this->Cell(50,6,$eachResult["subjects_name"],1);
		$this->Cell(15,6,$eachResult["subjects_credits"],1,0,'C');
		$this->Cell(18,6,$eachResult["subjects_cecp"],1,0,'C');
		$this->Cell(54,6,$eachResult["1subjects"],1);
		$this->Cell(40,6,$eachResult["subjects_m"],1);
		$this->Cell(44,6,$eachResult["Name"],1);
		$this->Cell(30,6,$eachResult["Username"],1);
		$this->Ln();
		$rang++;
	}
	//Closure line
	$this->Cell(array_sum($w),0,'','T');

}

}

$pdf=new PDF('L' , 'mm' , 'A4');
//Column titles
$header=array('ลำดับ','รหัสวิชา','ชื่อวิชา','หน่วยกิต','การประเมิน','กลุ่มวิชา','หมวดวิชา','ชื่อ-นามสกุล','รหัสนักศึกษา');
//Data loading

//*** Load MySQL Data ***//
$objConnect = mysqli_connect('localhost','root','','login_db');
mysqli_set_charset($objConnect, "tis620");
$strSQL = "SELECT * FROM addsubjectsregisters ORDER BY Name ASC";
$objQuery = mysqli_query($objConnect,$strSQL);
$resultData = array();
for ($i=0;$i<mysqli_num_rows($objQuery);$i++) {
	$result = mysqli_fetch_array($objQuery);
	array_push($resultData,$result);
}
$pdf->AddFont('angsa','','angsa.php');
$pdf->SetFont('angsa','',14);
$pdf->AddPage();
$pdf->Image('logo.png',8,10,15);
$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','              มหาวิทยาลัยเทคโนโลยีราชมงคลรัตนโกสินทร์'),50,1,'L');
$pdf->Cell(0,1,iconv('UTF-8','TIS-620','สรุปรายชื่อนักศึกษาที่ขอเทียบโอนผลการเรียนนอกระบบและตามอัธยาศัยเข้าสู่ในระบบ'),0,1,"C");
$pdf->Cell(0,15,iconv('UTF-8','TIS-620','คณะบริหารธุรกิจ สาขาเทคโนโลยีสารสนเทศทางธุรกิจ'),0,1,"C");
$pdf->Ln(2);
$pdf->BasicTable($header,$resultData);
$pdf->Output("MyPDF/MyPDF.pdf","F");
?>

PDF Created Click <a href="MyPDF/MyPDF.pdf">here</a> to Download

</html>