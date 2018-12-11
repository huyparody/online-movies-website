<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION)) 
header('location:index.php');
include "./config.php";

   $allowedExts = array("jpg", "jpeg", "gif", "png"); // mang chua cac loai file co the duoc upload
   $anhminhhoa= "upload/images/".$_FILES["anhminhhoa"]["name"]; // lay ten file
   if($anhminhhoa !=""){       //neu co hinh anh
	 $m=explode(".", $anhminhhoa); 
     $extension=$m[sizeof($m)-1]; // tach phan duoi mo rong cua hinh anh
	
	 if ((($_FILES["anhminhhoa"]["type"] == "image/gif")
	    || ($_FILES["anhminhhoa"]["type"] == "image/jpeg")
	    || ($_FILES["anhminhhoa"]["type"] == "image/png")
	    || ($_FILES["anhminhhoa"]["type"] == "image/jpg"))
	    && in_array($extension, $allowedExts)) // kiem tra loai hinh anh va duoi mo rong duoc cho phep upload
  	 {
  		if ($_FILES["anhminhhoa"]["error"] > 0) //neu hinh bi loi
    	{
    		echo "Return Code: " . $_FILES["anhminhhoa"]["error"] . "<br />";
    	}
  		else if (file_exists("upload/images/" . $_FILES["anhminhhoa"]["name"])) //neu hinh anh da duoc upload
      	{
      		echo $_FILES["anhminhhoa"]["name"] . " da ton tai. ";
			die();
      	}
		else
		{
			move_uploaded_file($_FILES["anhminhhoa"]["tmp_name"],"upload/images/" . $_FILES["anhminhhoa"]["name"]); // copy hinh anh den thu muc chua web
		}
  	}
	}
        
$tenphim=$_POST['title'];
$dienvien=$_POST['actor'];
$thongtinphim=$_POST['info_phim'];
$theloai=$_POST['category'];
$daodien=$_POST['director'];
$thoiluongphim=$_POST['duration'];
$namsanxuat=$_POST['release_time'];
$quocgia=$_POST['country'];
$linkphim=$_POST['link'];

  

$sql="insert into tb_film(title,anhminhhoa,actor,info_phim,category,director,duration,release_time,country,link) value('".$tenphim."','".$anhminhhoa."','".$dienvien."','".$thongtinphim."','".$theloai."','".$daodien."','".$thoiluongphim."','".$namsanxuat."','".$quocgia."','".$linkphim."')";
mysql_query($sql) or die('Lỗi cơ sở dữ liệu');

	header("Refresh: 3; URL=index.php?thaotac=quanlyphim");
          echo "<div class='noidung'><br />Thêm thành công. Bạn đang được chuyển đến trang quản lý phim!<br>(Nếu trình duyệt không hỗ trợ, <a href=\"index.php?thaotac=quanlyphim\">Nhấn vào đây</a>)<br /><br /></div>";
     die();
?>
