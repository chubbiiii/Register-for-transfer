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
		
	$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($objCon, "utf8");
	
	if(trim($_POST["txtsubjects_m"]) == "")
	{
		echo "<body onload=\"window.alert('กรุณาใส่หมวดวิชา');return history.go(-1)\">";
		exit();	
	}
		
	if(trim($_POST["txtsubjects_name"]) == "")
	{
		echo "<body onload=\"window.alert('กรุณาใส่ชื่อวิชา');return history.go(-1)\">";
		exit();
	}
	if(trim($_POST["txtsubjects_id"]) == "")
	{
		echo "<body onload=\"window.alert('กรุณาใส่รหัสวิชา');return history.go(-1)\">";
		exit();
	}
	if(trim($_POST["txtsubjects_credits"]) == "")
	{
		echo "<body onload=\"window.alert('กรุณาใส่หน่วยกิต');return history.go(-1)\">";
		exit();
	}		
		
	else
	{	
		
		$strSQL = "INSERT INTO tsubjects (subjects_m,1subjects,subjects_name,subjects_id,subjects_credits,subjects_cecp) VALUES ('".$_POST["txtsubjects_m"]."','".$_POST["txt1subjects"]."','".$_POST["txtsubjects_name"]."','".$_POST["txtsubjects_id"]."','".$_POST["txtsubjects_credits"]."','".$_POST["txtsubjects_cecp"]."')";
		$objQuery = mysqli_query($objCon,$strSQL);
		
		echo "<body onload=\"window.alert('เพิ่มเข้าสู่ระบบเรียบร้อย');return history.go(-1)\">";	
	
		
		
	}

	mysqli_close($objCon);
?>
</body>
</html>