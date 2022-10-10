<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RMUTR</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
<div class="container" style="padding-top:70px">
<form name="form1" method="post" action="save_register.php">
  <center><img src="pic\rmutr.jpg" alt="Car" width="579" style="width:500"></center> <br>
  <center><table width="534" border="0" style="width: 500px">
    <tbody>
      <tr>
        <td width="500"> &nbsp;รหัสนักศึกษา</td>
        <td width="210">
          <input name="txtUsername" type="text" id="txtUsername" size="35">
        </td>
      </tr>
      <tr>
        <td> &nbsp;รหัสผ่าน</td>
        <td><input name="txtPassword" type="password" id="txtPassword" size="35">
        </td>
      </tr>
      <tr>
        <td>&nbsp;ยืนยันรหัสผ่าน</td>
        <td><input name="txtConPassword" type="password" id="txtConPassword" size="35">
        </td>
      </tr>
      <tr>
        <td>&nbsp;ชื่อ-นามสกุล</td>
        <td><input name="txtName" type="text" id="txtName" size="35"></td>
      </tr>
      
      
      </tbody>
  </table></center>
  <br>
  <center><input type="submit" name="Submit" value="สมัคร"></center>
</form>
</div>
</body>
</html>