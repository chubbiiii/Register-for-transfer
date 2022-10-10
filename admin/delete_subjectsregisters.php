<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"></head>
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
<script language="JavaScript">
	function ClickCheckAll(vol)
	{
	
		var i=1;
		for(i=1;i<=document.frmMain.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain.chkDel"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain.chkDel"+i+".checked=false");
			}
		}
	}

	function onDelete()
	{
		if(confirm('ลบรายวิชาเทียบโอนที่เปิดลงทะเบียนสอบ ?')==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>
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
<form name="frmMain" action="save_subjectsregisters.php" method="post" OnSubmit="return onDelete();">
<?php
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "login_db";
$objConnect = mysqli_connect($serverName,$userName,$userPassword,$dbName);
mysqli_set_charset($objConnect, "utf8");
$strSQL = "SELECT * FROM usersubjectsadd";
$objQuery = mysqli_query($objConnect,$strSQL);
?>
<table width="600" border="1" id="customers">
  <tr>
    <th width="91"> <div align="center">ลำดับ</div></th>
    <th width="98"> <div align="center">หมวดวิชา</div></th>
    <th width="198"> <div align="center">กลุ่มวิชา</div></th>
    <th width="97"> <div align="center">ชื่อวิชา</div></th>
    <th width="59"> <div align="center">รหัสวิชา</div></th>
    <th width="71"> <div align="center">หน่วยกิต</div></th>
    <th width="71"> <div align="center">การประเมิน</div></th>
    <th width="30"> <div align="center">
      <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
    </div></th>
  </tr>
<?php
$i = 0;
while($objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC))
{
$i++;
?>
  <tr>
    <td><div align="center"><?php echo $i;?></div></td>
    <td><?php echo $objResult["subjects_m"];?></td>
    <td><?php echo $objResult["1subjects"];?></td>
    <td><?php echo $objResult["subjects_name"];?></td>
    <td align="center"><?php echo $objResult["subjects_id"];?></td>
    <td align="center"><?php echo $objResult["subjects_credits"];?></td>
    <td align="center"><?php echo $objResult["subjects_cecp"];?></td>
    <td align="center"><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $i;?>" value="<?php echo $objResult["subjects_no"];?>"></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($objConnect);
?>
<br><center>
<input type="submit" name="btnDelete" class="btn" value="Delete">
<input type="hidden" name="hdnCount" value="<?php echo $i;?>"></center>
</form>
</body>
</html>