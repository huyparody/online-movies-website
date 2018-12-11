<body>
<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION)) 
header('location:index.php');
include "./config.php";
?>
    <div class="bar"><h1>THÊM ADMIN</h1></div>
<div class="noidung"><br /><br />
<form name="f" action="index.php?thaotac=addusernew" method="POST"> 
Tên đăng nhập: <input type="text" name="admin" />
Mật khẩu: <input type="password" name="pass" />
<br /><br /><input type="submit" name="submit"  value="Thêm"/>
 <a href="index.php?thaotac=listuser"><input type="button" value="Quay Lại" name="back" /></a>
</form>
<br /><br />
</div></div>
