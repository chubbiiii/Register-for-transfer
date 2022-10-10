<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "login_db"; 
 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
mysqli_set_charset($db, "utf8");
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
}
?>
</body>
</html>
