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
	mysqli_set_charset($conn, "utf8");
	$sql = "UPDATE tsubjects SET 
			subjects_id = '".$_POST["subjects_id"]."' ,
			subjects_name = '".$_POST["subjects_name"]."' ,
			subjects_credits = '".$_POST["subjects_credits"]."' ,
			subjects_cecp = '".$_POST["txtsubjects_cecp"]."' ,
			1subjects = '".$_POST["1subjects"]."',
			subjects_m = '".$_POST["subjects_m"]."'
			WHERE subjects_no = '".$_POST["subjects_no"]."' ";

	$query = mysqli_query($conn,$sql)or die ("Error Query [".$sql."]");

	if($query) {
	 echo"<script language=\"javascript\"> alert('แก้ไขเรียบร้อย'); </script>";
	 echo"<meta http-equiv='refresh' content='0;url=admin_page_open.php'>";
	}

	mysqli_close($conn);
?>
</body>
</html>