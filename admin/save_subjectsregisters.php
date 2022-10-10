<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "login_db";
$objConnect = mysqli_connect($serverName,$userName,$userPassword,$dbName);
mysqli_set_charset($objConnect, "utf8");

	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			$strSQL = "DELETE FROM usersubjectsadd ";
			$strSQL .="WHERE subjects_no = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);
		}
	}

	echo "<body onload=\"window.alert('ลบวิชาที่เปิดลงทะเบียนเรียบร้อยเเล้ว');return history.go(-1)\">";

mysqli_close($objConnect);
?>
</body>
</html>
