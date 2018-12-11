<body>
<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION)) 
header('location:index.php');
include "./config.php";
$get=$_POST['filmid'];
$get2=$_POST['tenphimmoi'];
//
$dienvien=$_POST['dienvienmoi'];
$thongtinphim=$_POST['thongtinphimmoi'];
$theloai=$_POST['theloaimoi'];
$daodien=$_POST['daodienmoi'];	
$thoiluongphim=$_POST['thoiluongphimmoi'];
$namsanxuat=$_POST['namsanxuatmoi'];
$quocgia=$_POST['noisanxuatmoi'];
$linkphim=$_POST['linkphimmoi'];

	$anhminhhoa=$_FILES["anhminhhoamoi"]["name"];
	 
	 
		if($anhminhhoa != null && $theloai != null)
		{       //neu co hinh anh
			$allowedExts = array("jpg", "jpeg", "gif", "png"); // mang chua cac loai file co the duoc upload
			$anhminhhoa= "upload/images/".$_FILES["anhminhhoamoi"]["name"]; // lay ten file
			 $m=explode(".", $anhminhhoa); 
			 $extension=$m[sizeof($m)-1]; // tach phan duoi mo rong cua hinh anh
			
			 if ((($_FILES["anhminhhoamoi"]["type"] == "image/gif")
				|| ($_FILES["anhminhhoamoi"]["type"] == "image/jpeg")
				|| ($_FILES["anhminhhoamoi"]["type"] == "image/png")
				|| ($_FILES["anhminhhoamoi"]["type"] == "image/jpg"))
				&& in_array($extension, $allowedExts)) // kiem tra loai hinh anh va duoi mo rong duoc cho phep upload
			 {
				if ($_FILES["anhminhhoamoi"]["error"] > 0) //neu hinh bi loi
				{
					echo "Return Code: " . $_FILES["anhminhhoamoi"]["error"] . "<br />";
				}
				else if (file_exists("upload/images/" . $_FILES["anhminhhoamoi"]["name"])) //neu hinh anh da duoc upload
				{
					echo $_FILES["anhminhhoamoi"]["name"] . " da ton tai. ";
					die();
				}
				else
				{
					move_uploaded_file($_FILES["anhminhhoamoi"]["tmp_name"],"upload/images/" . $_FILES["anhminhhoamoi"]["name"]); // copy hinh anh den thu muc chua web
				}
				
			}			
			$sql_edit="update tb_film set title='".$get2."',anhminhhoa='".$anhminhhoa."', actor='".$dienvien."', info_phim='".$thongtinphim."', category = '" . $theloai . "', director='".$daodien . "', duration='".$thoiluongphim."', release_time='".$namsanxuat."', country='".$quocgia."', link='".$linkphim."' where filmid = '" . $get . "'";
			mysql_query($sql_edit) or die("Lỗi Cơ Sở Dữ Liệu !!!");
			echo "<script>alert('Sửa thành công')</script>";
			header("Location: index.php?thaotac=quanlyphim");
			
		}else if($anhminhhoa != null && $theloai == null){
			$allowedExts = array("jpg", "jpeg", "gif", "png"); // mang chua cac loai file co the duoc upload
			$anhminhhoa= "upload/images/".$_FILES["anhminhhoamoi"]["name"]; // lay ten file
			 $m=explode(".", $anhminhhoa); 
			 $extension=$m[sizeof($m)-1]; // tach phan duoi mo rong cua hinh anh
			
			 if ((($_FILES["anhminhhoamoi"]["type"] == "image/gif")
				|| ($_FILES["anhminhhoamoi"]["type"] == "image/jpeg")
				|| ($_FILES["anhminhhoamoi"]["type"] == "image/png")
				|| ($_FILES["anhminhhoamoi"]["type"] == "image/jpg"))
				&& in_array($extension, $allowedExts)) // kiem tra loai hinh anh va duoi mo rong duoc cho phep upload
			 {
				if ($_FILES["anhminhhoamoi"]["error"] > 0) //neu hinh bi loi
				{
					echo "Return Code: " . $_FILES["anhminhhoamoi"]["error"] . "<br />";
				}
				else if (file_exists("upload/images/" . $_FILES["anhminhhoamoi"]["name"])) //neu hinh anh da duoc upload
				{
					echo $_FILES["anhminhhoamoi"]["name"] . " da ton tai. ";
					die();
				}
				else
				{
					move_uploaded_file($_FILES["anhminhhoamoi"]["tmp_name"],"upload/images/" . $_FILES["anhminhhoamoi"]["name"]); // copy hinh anh den thu muc chua web
				}
				
			}			
			$sql_edit="update tb_film set title='".$get2."',anhminhhoa='".$anhminhhoa."', actor='".$dienvien."', info_phim='".$thongtinphim."', director='".$daodien . "', duration='".$thoiluongphim."', release_time='".$namsanxuat."', country='".$quocgia."', link='".$linkphim."' where filmid = '" . $get . "'";
			mysql_query($sql_edit) or die("Lỗi Cơ Sở Dữ Liệu !!!");
			echo "<script>alert('Sửa thành công')</script>";
			header("Location: index.php?thaotac=quanlyphim");
		}else if($anhminhhoa == null && $theloai != null){
			$sql_edit="update tb_film set title='".$get2."', actor='".$dienvien."', info_phim='".$thongtinphim."', category = '" . $theloai . "', director='".$daodien . "', duration='".$thoiluongphim."', release_time='".$namsanxuat."', country='".$quocgia."', link='".$linkphim."' where filmid = '" . $get . "'";
			mysql_query($sql_edit) or die("Lỗi Cơ Sở Dữ Liệu !!!");
			echo "<script>alert('Sửa thành công')</script>";
			header("Location: index.php?thaotac=quanlyphim");
		}
		else
		{
			$sql_edit="update tb_film set title='".$get2."', actor='".$dienvien."', info_phim='".$thongtinphim."', director='".$daodien . "', duration='".$thoiluongphim."', release_time='".$namsanxuat."', country='".$quocgia."', link='".$linkphim."' where filmid = '" . $get . "'";
			mysql_query($sql_edit) or die("Lỗi Cơ Sở Dữ Liệu !!!");
			echo "<script>alert('Sửa thành công')</script>";
			header("Location: index.php?thaotac=quanlyphim");
		}	

	
	 
	
	 
?>

