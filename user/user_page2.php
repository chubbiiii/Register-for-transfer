<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RMUTR</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<?php
	session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['Status'] != "USER" and $_SESSION['Status'] !="ADMIN")
	{
		echo "This page for User only!";
		exit();
	}	
	
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "login_db";
	

	$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($objCon, "utf8");
	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>

<body>
<div class="header">
<div class="header-right">
สวัสดี <?php echo $objResult["Name"];?>
&nbsp;&nbsp;<a href="report_user2.php"><input type="button" value="สรุปการลงทะเบียน" class="btn"></a>
<a href="\www\open_close.php"><input type="button" value="Logout" class="btn"></a>
</div>
</div>
<div style="padding:10px 16px;height:100%;">
  	  <center><img src="pic\rmutr.jpg" alt="Car" width="579" style="width:500"></center>
</div>
<div style= "height:100;" align="center">
  <table border="1" id="customers">
  <tr>
  	<th width="1"> <div align="center">ลำดับ</div></th>
    <th width="300"> <div align="center">หมวดวิชา</div></th>
    <th width="300"> <div align="center">กลุ่มวิชา</div></th>
    <th width="100"> <div align="center">รหัสวิชา</div></th>
    <th width="250"> <div align="center">ชื่อวิชา</div></th>
    <th width="1"> <div align="center">หน่วยกิต</div></th>
    <th width="100"> <div align="center">การประเมิน</div></th>

  </tr>
<?php
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "login_db";
	

	$objCon1 = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($objCon1, "utf8");
	$strSQL1 = "SELECT * FROM usersubjectsadd WHERE 1 ";
	$objQuery1 = mysqli_query($objCon1,$strSQL1);

?>
<?php
$i = 1;
while($result = mysqli_fetch_array($objQuery1,MYSQLI_ASSOC))
{
?>
	<tr>
  	<td><div align="center"><?php echo $i;?></div></td>
    <td><?php echo $result["subjects_m"];?></td>
    <td><?php echo $result["1subjects"];?></td>
    <td><?php echo $result["subjects_id"];?></td>
    <td><?php echo $result["subjects_name"];?></td>
    <td><?php echo $result["subjects_credits"];?></td>
    <td><?php echo $result["subjects_cecp"];?></td>
    
    </tr>
    <?php
$i++;
}
?>
</table>
</div>
</body>
</html>
<?php
	mysqli_close($objCon);
?>
