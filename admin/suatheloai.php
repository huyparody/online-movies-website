<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION)) 
header('location:index.php');
include "./config.php";
?>

<?php 
	$get=$_GET['loaiphim'];
	$array=array(50);
	$sql="select * from tb_category where name='".$get."'";
	$result=mysql_query($sql) or die(mysql_error());
	$row=mysql_fetch_array($result);
?>
<div class="bar">SỬA THỂ LOẠI PHIM</div>
<div class="noidung"><br /><br />
<form name="f" action="index.php?thaotac=suatheloaimoi" method="POST">
Tên Thể Loại Phim : <input type="text" name="theloai"  value="<?php echo $row['name']?>"   size="40"> 
<br /><br />
<input type="hidden" value="<?php echo $row['name'];?>" name="theloaimoi"/>
<input type="submit" value="Sửa" name="submit" />
<a href="index.php?thaotac=quanlytheloai"><input type="button" value="Quay Lại" name="back" /></a>
</form><br /><br />
</div></div>
