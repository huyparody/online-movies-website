
<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION)) 
header('location:index.php');
include "./config.php";
	$ad=$_POST['admin'];
        $pass=$_POST['pass'];
	$sql="insert into tb_user(username,password) value('".$ad."', '".$pass."')";
	mysql_query($sql) or die(mysql_error());
	header("Refresh: 3; URL=index.php?thaotac=listuser");
          echo "<div class='noidung'><br />Thêm thành công. Bạn đang được chuyển đến trang quản lý admin!<br>(Nếu trình duyệt không hỗ trợ, <a href=\"index.php?thaotac=listuser\">Nhấn vào đây</a>)<br /><br /></div>";
     die();
?>
