<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RMUTR</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>

<div class="container" style="padding-top:100x">
<center>
<form name="form1" method="post" action="check_login2.php">
  <center><img src="pic\rmutr.jpg" alt="Car" width="579" style="width:500"></center><br>
  <center><table border="0" style="width: 300px">
    <tbody>
      <tr>
        <td> &nbsp;รหัสนักศึกษา</td>
        <td>
          <input name="txtUsername" type="text" id="txtUsername">
        </td>
      </tr>
      <tr>
        <td> &nbsp;รหัสผ่าน</td>
        <td><input name="txtPassword" type="password" id="txtPassword">
        </td>
      </tr>
    </tbody>
  </table>
  </center>
  <br>
  <input type="submit" name="Submit" value="Login" onclick="this.form.action='check_login2.php'; submit()">
  &nbsp&nbsp&nbsp <input type="submit" name="Submit" value="Register" onclick="this.form.action='register.php'; submit()">
</form>
</center>
</div>
</body>
</html>