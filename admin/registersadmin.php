<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RMUTR</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
<div class="container" style="padding-top:70px">
<form name="form1" method="post" action="save_registersadmin.php">
  <center><img src="pic\rmutr.jpg" alt="Car" width="579" style="width:500"></center> <br>
  <center><table width="534" border="0" style="width: 500px">
    <tbody>
      <tr>
        <td width="500"> &nbsp;Username</td>
        <td width="210">
          <input name="txtUsername1" type="text" id="txtUsername1" size="35">
        </td>
      </tr>
      <tr>
        <td> &nbsp;รหัสผ่าน</td>
        <td><input name="txtPassword1" type="password" id="txtPassword1" size="35">
        </td>
      </tr>
      <tr>
        <td>&nbsp;ยืนยันรหัสผ่าน</td>
        <td><input name="txtConPassword1" type="password" id="txtConPassword1" size="35">
        </td>
      </tr>
      <tr>
        <td>&nbsp;ชื่อ-นามสกุล</td>
        <td><input name="txtName1" type="text" id="txtName1" size="35"></td>
      </tr>
       <tr>
    <td>&nbsp;Status</td>
    <td><select name="txtStatus1" id="txtStatus1">
   			<option value="ADMIN">ADMIN</option>
            <option value="USER">USER</option>
          </select></td>
  </tr>
      </tbody>
  </table></center>
  <br>
  <center><input type="submit" name="Submit" value="เพิ่ม"></center>
</form>
</div>
</body>
</html>