<body>
<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION)) 
header('location:index.php');
include "./config.php";
?>
<div class="bar">THÊM THỂ LOẠI PHIM</div>
<div class="noidung"><br /><br />
<form name="f" action="index.php?thaotac=themtheloaimoi" method="POST"> 
Tên Thể Loại: <input type="text" name="theloai" />
<br /><br /><input type="submit" name="submit"  value="Thêm"/>
 <a href="index.php?thaotac=quanlytheloai"><input type="button" value="Quay Lại" name="back" /></a>
</form>
<br /><br />
</div></div>
