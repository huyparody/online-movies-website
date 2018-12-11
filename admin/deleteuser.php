<?php
     include "./config.php";
	$u=$_GET["username"];
     $query_delete = "DELETE FROM tb_user WHERE username = '$u'";
     $result_delete = mysql_query($query_delete) or die(mysql_error()); 
	 if($result_delete)  header("location:index.php?thaotac=listuser");
	 else echo "loi";
    /* header("Refresh: 2; URL=listuser.php");
          echo "Bạn đang được chuyển đến trang chủ!<br>";
          echo "(Nếu trình duyệt không hỗ trợ, <a href=\"index.php?thaotac=listuser\">kích vào đây</a> để đến Trang Chủ !)";
     die();*/

?>
