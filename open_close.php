<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<center><img src="pic\rmutr.jpg" alt="Car" width="579" style="width:500"></center>

<?php
echo '<center>';
echo '<br />';
$datenow = date('Y-m-d');
$datestart = '2019-10-24';
$dateend =   '2019-10-28';
echo '<br />';
echo 'วันนี้ : '.$datenow;
echo '<br />';
echo '<font color="blue">';
echo 'เริ่มลงทะเบียน  : '.$datestart;
echo '<br />';
echo 'สิ้นสุดลงทะเบียน  : '.$dateend;
echo '</font>';
echo '<br />';
echo '<br />';
if($datenow  >= $datestart && $datenow <= $dateend) {
    echo '<font color="green">';
    echo 'เปิดลงทะเบียน';
    echo '<br />';
    echo '<br />';
    echo '<a href="index.php"><input type="button" value="หน้า Login" class="button"></a>';
    echo '</font>';
}else{
    echo '<font color="red">';
    echo 'ปิดลงทะเบียน';
    echo '<br />';
    echo '<br />';
    echo '<a href="index2.php"><input type="button" value="หน้า Login" class="button"></a>';
    echo '</font>';
}
echo '</center>';
?>

</body>
</html>