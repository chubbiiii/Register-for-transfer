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

	if($_SESSION['Status'] != "ADMIN")
	{
		echo "This page for Admin only!";
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
<ul>
  
  <li><a class="active" href="admin_page.php">Home</a></li>
  <li><a href="admin_page_open.php">เลือก/เปิดสอบวิชาเทียบโอน</a></li>
  <li><a href="add_subjects.php">เพิ่มรายวิชา</a></li>
  <li><a href="delete_subjectsregisters.php">ลบรายวิชาที่เปิดลงทะเบียน</a></li>
  <li><a href="report.php">สรุปรายชื่อนักศึกษา</a></li>
  <li><a href="user.php">ดูข้อมูลนักศึกษา</a></li>
  <li><a href="\www\open_close.php">Logout</a></li>
</ul>
<div style="margin-left:16%;padding:10px 16px;height:1000px;">
	  <center><img src="pic\rmutr.jpg" alt="Car" width="579" style="width:500"></center>
  	  <br><p><center>สวัสดี <?php echo $objResult["Name"];?></p>
      <a href="registersadmin.php"><input type="button" value="เพิ่ม Admin" class="btn"></a>
      <a href="user/user_page.php"><input type="button" value="ดูหน้าลงทะเบียน" class="btn"></a><br><br>

 
</div>


</body>
</html>
<?php
	mysqli_close($objCon);
?>
