<?php
     include "./config.php";
	$theloai=$_GET["theloai"];
     $query_delete = "DELETE FROM tb_category WHERE name = '$theloai'";
     $result_delete = mysql_query($query_delete) or die(mysql_error()); 
	 if($result_delete)  header("location:index.php?thaotac=quanlytheloai");
	 else echo "Lỗi không xóa được !!!";
    /* header("Refresh: ; URL=listuser.php");
          echo "Bạn đang được chuyển đến trang chủ!<br>";
          echo "(Nếu trình duyệt không hỗ trợ, <a href=\"index.php?thaotac=quanlytheloai\">nhấn vào đây</a> để về trang trước !!!)";
     die();*/

?>
