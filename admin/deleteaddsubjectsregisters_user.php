<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "login_db";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$strCustomerID = $_GET["subjects_no"];
	$sql = "DELETE FROM addsubjectsregisters
			WHERE subjects_no = '".$strCustomerID."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
	echo"<script language=\"javascript\"> alert('ลบรายวิชาเทียบโอนที่นักศึกษาลงทะเบียนเรียบร้อย');window.location='javascript:history.back()'; </script>";
	}

	mysqli_close($conn);
?>
</body>
</html>