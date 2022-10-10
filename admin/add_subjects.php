<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
<br>
<body>
<center><form action="save_subjects.php" name="frmAdd" method="post">
<table width="526" border="1" id="customers">

  <tr>
    <th width="20%">หมวดวิชา</th>
    <td><input type="text" name="txtsubjects_m" size="130" id="txtsubjects_m" value=""></td>
    </tr>
  <tr>
    <th width="10">กลุ่มวิชา</th>
    <td><input type="text" name="txt1subjects" size="130" id="1subjects" value=""></td>
    </tr>
  <tr>
    <th width="10">ชื่อวิชา</th>
    <td><input type="text" name="txtsubjects_name" size="130" id="txtsubjects_name" value=""></td>
    </tr>
  <tr>
    <th width="10">รหัสวิชา</th>
    <td><input type="text" name="txtsubjects_id" size="20" id="txtsubjects_id" value=""></td>
  </tr>
  <tr>
    <th width="10">หน่วยกิต</th>
    <td><input type="text" name="txtsubjects_credits" size="1" id="txtsubjects_credits" value=""></td>
  </tr>
  <tr>
    <th width="10">การประเมิน</th>
    <td>
    <select name="txtsubjects_cecp" id="txtsubjects_cecp">
   			<option value="None">None</option>
            <option value="CE">CE</option>
            <option value="CP">CP</option>
            <option value="CE,CP">CE,CP</option>
          </select></td>
  </tr>
</table>
<br>
  <input type="submit" name="submit" value="ยืนยัน" class="btn">
<br/>

</form>
</center>
</div>
</body>
</html>