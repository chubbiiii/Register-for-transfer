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

	if($_SESSION['Status'] != "USER" and $_SESSION['Status'] !="ADMIN")
	{
		echo "This page for User only!";
		exit();
	}	
	$Username = null;

   if(isset($_GET["Username"]))
   {
	   $Username = $_GET["Username"];
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

<div style="padding:10px 16px;height:100%;">
  	  <center><img src="pic\rmutr.jpg" alt="Car" width="579" style="width:500"></center>
</div>
<div style= "height:100;" align="center">
<form>
<a href="user.php"><input type="button" value="กลับ" class="btn"></a>
</form>
<br>
<div style= "height:100;" align="center">
  <table border="1" id="customers">
  <tr>
  	<th width="1"> <div align="center">ลำดับ</div></th>
    <th width="120"> <div align="center">หมวดวิชา</div></th>
    <th width="200"> <div align="center">กลุ่มวิชา</div></th>
    <th width="70"> <div align="center">รหัสวิชา</div></th>
    <th width="200"> <div align="center">ชื่อวิชา</div></th>
    <th width="1"> <div align="center">หน่วยกิต</div></th>
    <th width="1"> <div align="center">การประเมิน</div></th>
    <th width="100"> <div align="center">ชื่อ-นามสกุล</div></th>
    <th width="100"> <div align="center">รหัสนักศึกษา</div></th>
	<th width="100"> <div align="center">แก้ไข</div></th>
    <th width="1"> <div align="center">ลบ</div></th>
  </tr>
<?php
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "login_db";

	$objCon1 = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($objCon1, "utf8");
	$strSQL1 = "SELECT * FROM addsubjectsregisters WHERE Username = '".$Username."' ";
	$objQuery1 = mysqli_query($objCon1,$strSQL1);


?>
<?php
$i = 1;
while($result = mysqli_fetch_array($objQuery1,MYSQLI_ASSOC))
{
?>
<form action="#edit.php">
	<tr>
  	<td><div align="center"><?php echo $i;?></div></td>
    <td><?php echo $result["subjects_m"];?></td>
    <td><?php echo $result["1subjects"];?></td>
    <td><div align="center"><?php echo $result["subjects_id"];?></div></td>
    <td><?php echo $result["subjects_name"];?></td>
    <td><div align="center"><?php echo $result["subjects_credits"];?></div></td>
    <td><div align="center"><?php echo $result["subjects_cecp"];?></div></td>
    <td><?php echo $result["Name"];?></td>
    <td><?php echo $result["Username"];?></td>	
	<td align="center"><a href="editaddsubjectsregisters_user.php?subjects_no=<?php echo $result["subjects_no"];?>"><input type="button" value="แก้ไข" class="btn"></a>&nbsp;					    
	<td align="center"><a href="JavaScript:if(confirm('ลบรายวิชาเทียบโอนที่นักศึกษาลงทะเบียนไว้หรือไม่?')==true){window.location='deleteaddsubjectsregisters_user.php?subjects_no=<?php echo $result["subjects_no"];?>';}"><input type="button" value="ลบ" class="btn"></a></td>

    </tr>
    <?php
$i++;
}
?>
</form>
</table>
</div>
</body>
</html>
<?php
	mysqli_close($objCon);
?>