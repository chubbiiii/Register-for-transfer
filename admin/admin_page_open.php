*<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<br>
<?php 
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;
	$strKeyword = isset($_POST['txtKeyword']) ? $_POST['txtKeyword'] : '';
	$strddlSelect = isset($_POST['ddlSelect']) ? $_POST['ddlSelect'] : '';
?>
<form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
    <tr>หัวข้อ 
    <select name="ddlSelect" id="ddlSelect">
          <option selected="selected">โปรดเลือก</option>
          <option value="1subjects"<?php 	  if($strddlSelect=="1subjects")
															{
															echo"selected";
															}?>>กลุ่มวิชา</option>
          <option value="subjects_id" <?php  if($strddlSelect=="subjects_id")
															{
																echo"selected";
															}?>>รหัสวิชา</option>
          <option value="subjects_name" <?php    if($strddlSelect=="subjects_name")
															{
																echo"selected";
															}?>>ชื่อวิชา</option>
        </select>
      <th>ค้นหา
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>">
      <input class="button" type="submit" value="Search">
      </th>
    </tr>
</form>
<?php

   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "login_db";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
   mysqli_set_charset($conn, "utf8");
   $sql = "SELECT * FROM tsubjects WHERE 1  ";
	
   if($strddlSelect != "" and  $strKeyword != '')
	{
	  $sql .= " AND (".$strddlSelect." LIKE '%".$strKeyword."%' ) ";
	}
    $query = mysqli_query($conn,$sql)or die ("Error Query [".$sql."]");
	
?>

<form>
<br>
<table width="900" border="1" id="customers">
  <tr>
  	<th width="1%"> <div align="center">ลำดับ</div></th>
    <th width="100"> <div align="center">หมวดวิชา</div></th>
    <th width="100"> <div align="center">กลุ่มวิชา</div></th>
    <th width="50"> <div align="center">รหัสวิชา</div></th>
    <th width="150"> <div align="center">ชื่อวิชา</div></th>
    <th width="1%"> <div align="center">หน่วยกิต</div></th>
    <th width="8%"> <div align="center">การประเมิน</div></th>
    <th width="17%"> <div align="center">แก้ไข</div></th>
    <th width="1%"> <div align="center">เลือก</div></th>
  </tr>
  <?php
$i = 1;
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
  	<td><div align="center"><?php echo $i;?></div></td>
    <td><?php echo $result["subjects_m"];?></td>
  	<td><?php echo $result["1subjects"];?></td>
    <td><div align="center"><?php echo $result["subjects_id"];?></div></td>
    <td><?php echo $result["subjects_name"];?></td>
    <td><div align="center"><?php echo $result["subjects_credits"];?></td>
    <td><div align="center"><?php echo $result["subjects_cecp"];?></div></td>
    <td align="center"><a href="editsubjects.php?subjects_no=<?php echo $result["subjects_no"];?>"><input type="button" value="Edit" class="btn"></a>&nbsp;						    <a href="JavaScript:if(confirm('ต้องการลบวิชานี้หรือไม่?')==true){window.location='delete.php?subjects_no=<?php echo $result["subjects_no"];?>';}"><input type="button" value="Delete" class="btn"></a></td>
    <td align="center"><a href="addsubjectsto.php?subjects_no=<?php echo $result["subjects_no"];?>"><input type="button" value="เปิดลงทะเบียน" class="btn"></a>
<?php
$i++;
}
?>
</table>

</form>
</div>


</body>
</html>
<?php
	mysqli_close($objCon);

?>
