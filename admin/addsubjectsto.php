<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
<?php
   ini_set('display_errors', 1);
   error_reporting(~0);

   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "login_db";

   $subjects_no = null;

   if(isset($_GET["subjects_no"]))
   {
	   $subjects_no = $_GET["subjects_no"];
   }
  
   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "login_db";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
   mysqli_set_charset($conn, "utf8");
   $sql = "SELECT * FROM tsubjects WHERE subjects_no = '".$subjects_no."' ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>
<form action="save_addsubjectsto.php" name="frmAdd" method="post">
<center><table width="284" border="1" id="customers2">
<tr>
    <th width="120">ลำดับ</th>
    <td width="238"><input type="hidden" name="subjects_no" value="<?php echo $result["subjects_no"];?>"><?php echo $result["subjects_no"];?></td>
    </tr>
  <tr>
  <th width="120">หมวดวิชา</th>
    <td><input type="hidden" name="subjects_m" size="50" id="subjects_m" value="<?php echo $result["subjects_m"];?>"><?php echo $result["subjects_m"];?></td>
    </tr>
  <tr>
    <th width="120">กลุ่มวิชา</th>
    <td><input type="hidden" name="1subjects" size="50" id="1subjects" value="<?php echo $result["1subjects"];?>"><?php echo $result["1subjects"];?></td>
    </tr>
  <tr>
    <th width="120">ชื่อวิชา</th>
    <td><input type="hidden" name="subjects_name" size="50" id="subjects_name" value="<?php echo $result["subjects_name"];?>"><?php echo $result["subjects_name"];?></td>
    </tr>
  <tr>
    <th width="120">รหัสวิชา</th>
    <td><input type="hidden" name="subjects_id" size="20" id="subjects_id" value="<?php echo $result["subjects_id"];?>"><?php echo $result["subjects_id"];?></td>
    </tr>
  <tr>
    <th width="10">การประเมิน</th>
    <td><input type="hidden" name="subjects_cecp" size="20" id="subjects_cecp" value="<?php echo $result["subjects_cecp"];?>"><?php echo $result["subjects_cecp"];?></td>
  </tr>
  <tr>
    <th width="120">หน่วยกิต</th>
    <td><input type="hidden" name="subjects_credits" size="1" id="subjects_credits" value="<?php echo $result["subjects_credits"];?>"><?php echo $result["subjects_credits"];?></td>
  </tr>
</table>
<br>
  <a href="JavaScript:if(confirm('ต้องการเปิดลงทะเบียนวิชานี้หรือไม่?')==true){window.location='save_addsubjectsto.php?subjects_no=<?php echo $result["subjects_no"];?>';}"><input type="submit" name="submit" value="เปิดลงทะเบียน" class="btn"></a>
</form></center>
<?php
mysqli_close($conn);
?>
</body>
</html>