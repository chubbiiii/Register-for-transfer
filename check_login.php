<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RMUTR</title>
</head>

<body>
<?php
	session_start();
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "login_db";
	

	$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($objCon, "utf8");
	$strSQL = "SELECT * FROM member WHERE Username = '".mysqli_real_escape_string($objCon,$_POST['txtUsername'])."' 
	and Password = '".mysqli_real_escape_string($objCon,$_POST['txtPassword'])."'and Activate = 'YES'" ;
		$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if(!$objResult)
	{
			
			echo "<body onload=\"window.alert('กรุณาตรวจสอบข้อมูล');return history.go(-1)\">";
			exit;
	}
	else
	{
			$_SESSION["UserID"] = $objResult["UserID"];
			$_SESSION["Status"] = $objResult["Status"];

			session_write_close();
			zxc
			if($objResult["Status"] == "ADMIN")
			{
				header("location:admin/admin_page.php");
			}
			else
			{
				header("location:user/edit_profile.php");
			}
			
	}
	
	mysqli_close($objCon);
?>
</body>
</html>
