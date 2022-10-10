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
	
	if(trim($_POST["txtUsername"]) == "")
	{
		echo "<body onload=\"window.alert('กรุณาใส่ Student ID');return history.go(-1)\">";
		exit();	
	}
		
	if(trim($_POST["txtPassword"]) == "")
	{
		echo "<body onload=\"window.alert('กรุณาใส่ Password');return history.go(-1)\">";
		exit();
	}	
		
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "<body onload=\"window.alert('Password ไม่ตรงกัน');return history.go(-1)\">";
		exit();
	}
	
	if(trim($_POST["txtName"]) == "")
	{
		echo "<body onload=\"window.alert('กรุณาใส่ Name);return history.go(-1)\">";
		exit();	
	}	
	
	$strSQL = "SELECT * FROM member WHERE Username = '".trim($_POST['txtUsername'])."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if($objResult)
	{
			echo "<body onload=\"window.alert('Student ID นี้ถูกใช้งานแล้ว');return history.go(-1)\">";
	}
	else
	{	
		
		$strSQL = "INSERT INTO member (Username,Password,Name) VALUES ('".$_POST["txtUsername"]."', 
		'".$_POST["txtPassword"]."','".$_POST["txtName"]."')";
		$objQuery = mysqli_query($objCon,$strSQL);
		
		echo "<script>alert('สมัครเรียบร้อย')</script>";
		echo "<script>window.location='index.php'</script>";
		
	}

	mysqli_close($objCon);
?>
</body>
</html>