<?php
error_reporting(E_ERROR | E_PARSE);
if(!isset($_SESSION)) session_start();
include "./config.php";
if (isset($_POST['submit']))
{
     $query = "SELECT username, password FROM tb_user WHERE username = '" .
          $_POST['username'] . "' AND password ='". $_POST['password']
          ."';";
     $result = mysql_query($query) or die(mysql_error());

     if (mysql_num_rows($result) == 1)
     {
          $_SESSION["loguser"] = $_POST['username'];
          $_SESSION["logpassword"] = $_POST['password'];
          header("Refresh: 5; URL=index.php");
          echo "<div class='noidung'><br /><br /><center>Đăng nhập thành công. Bạn đang được chuyển đến trang chủ!</center><br><br /><center>(Nếu thấy lâu có thể <a href=\"index.php\">nhấn vào đây</a> để về trang chủ !!!)</center><br /><br /><br /></div></div>";
     }
     else
     {
?>
          <div class='noidung'><br /><br /><br />
		  Tài khoản hoặc mật khẩu không hợp lệ<br /><br />
          <form action="index.php?id=login" method="post">
          Tài khoản: <input type="text" name="username"><br /><br />
          Mật khẩu: <input type="password" name="password"><br /><br />
          <input type="submit" name="submit" value="Đăng nhập">
          <input type="reset" name="reset" value="Hủy">
          </form><br /><br /><br /></div></div>

<?php
     }
}
else
{

?>
          <div class="noidung"><br /><br /><h1><center>Đăng Nhập Quyền Admin:</center></h1><br />
     <br /><br />
  
     <center><form action="index.php?id=login" method="post">    
     Username: <input type="text" name="username"><br /><br />
     Password: <input type="password" name="password"><br /><br />
     <div align="center">
     <input type="submit" name="submit" value="Đăng nhập">
     <input type="reset" name="reset" value="Hủy">
     </div>
         </form></center><br /><br />
	 </div>
	 </div>
     <?php 
	 }
?>

