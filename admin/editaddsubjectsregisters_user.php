<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
   $sql = "SELECT * FROM addsubjectsregisters WHERE subjects_no = '".$subjects_no."' ";
   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>
<form action="save_editaddsubjectsregisters.php" name="frmAdd" method="post">
<center><table width="284" border="1" id="customers2">
<tr>
    <th width="120">ลำดับ</th>
    <td width="238"><input type="hidden" name="subjects_no" value="<?php echo $result["subjects_no"];?>"><?php echo $result["subjects_no"];?></td>
    </tr>
 <tr>
    <th width="120">ชื่อ</th>
    <td><input type="text" name="Name" size="50" id="Name"value="<?php echo $result["Name"];?>"></td>
    </tr>
    <tr>
    <th width="120">รหัสนักศึกษา</th>
    <td><input type="text" name="Username" size="50" id="Username"value="<?php echo $result["Username"];?>"></td>
    </tr>
  <tr>
    <th width="120">หมวดวิชา</th>
    <td><select name="subjects_m" id="subjects_m">
            <option value="<?php echo $result["subjects_m"];?>"><?php echo $result["subjects_m"];?></option>
            <option value="หมวดวิชาศึกษาทั่วไป">หมวดวิชาศึกษาทั่วไป</option>
            <option value="หมวดวิชาเฉพาะ">หมวดวิชาเฉพาะ</option>
            <option value="หมวดวิชาเลือกเสรี">หมวดวิชาเลือกเสรี</option>
          </select></td>
    </tr>
  <tr>
    <th width="120">กลุ่มวิชา</th>
    <td><select name="1subjects" id="1subjects">
              <option value="<?php echo $result["1subjects"];?>"><?php echo $result["1subjects"];?></option>
            <option value="">---- หมวดวิชาศึกษาทั่วไป ----</option>
            <option value="กลุ่มวิชามนุษย์ศาสตร์">กลุ่มวิชามนุษย์ศาสตร์</option>
            <option value="กลุ่มวิชาสังคมศาสตร์">กลุ่มวิชาสังคมศาสตร์</option>
            <option value="กลุ่มวิชาภาษา">กลุ่มวิชาภาษา</option>
            <option value="กลุ่มวิชาวิทยาศาสตร์และคณิตศาสตร์">กลุ่มวิชาวิทยาศาสตร์และคณิตศาสตร์</option>
            <option value="กลุ่มวิชาพลศึกษาและนันทนาการ">กลุ่มวิชาพลศึกษาและนันทนาการ</option>
            <option value="">---- หมวดวิชาเฉพาะ ----</option>
            <option value="กลุ่มวิชาพื้นฐานวิชาชีพ/วิชาแกน">กลุ่มวิชาพื้นฐานวิชาชีพ/วิชาแกน</option>
            <option value="กลุ่มวิชาเฉพาะด้าน">กลุ่มวิชาเฉพาะด้าน</option>
            <option value="กลุ่มวิชาฝึกประสบการณ์วิชาชีพ + วิชาโครงงานหรือสหกิจศึกษา">กลุ่มวิชาฝึกประสบการณ์วิชาชีพ + วิชาโครงงานหรือสหกิจศึกษา</option>
            <option value="วิชาเอก การพัฒนาซอฟต์แวร์">วิชาเอก การพัฒนาซอฟต์แวร์</option>
            <option value="วิชาเลือก">วิชาเลือก</option>
            <option value="">---- อื่นๆ ----</option>
            <option value="None">None</option>
          </select></td>
    </tr>
  <tr>
    <th width="120">ชื่อวิชา</th>
    <td><input type="text" name="subjects_name" size="20" id="subjects_name" value="<?php echo $result["subjects_name"];?>"></td>
    </tr>
  <tr>
    <th width="120">รหัสวิชา</th>
    <td><input type="text" name="subjects_id" size="10" id="subjects_id" value="<?php echo $result["subjects_id"];?>"></td>
  </tr>
  <tr>
    <th width="120">หน่วยกิต</th>
    <td><input type="text" name="subjects_credits" size="1" id="subjects_credits" value="<?php echo $result["subjects_credits"];?>"></td>
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
  <a href=javascript:history.back(1) class="btn">ย้อนกลับ</a> 
</br>
</form></center>
<?php
mysqli_close($conn);
?>
</body>
</html>