<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>Project 1</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
	<!--[if IE 6]>
		<link rel="stylesheet" href="../css/ie6.css" type="text/css" media="all" />
	<![endif]-->
        <script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="../js/jquery-func.js"></script>
</head>
<body>
<!-- Shell -->
<div id="shell">
	<!-- Header -->
	<div id="header">
            <h1 id="logo"><a href="index.php">Project 1</a></h1>

		
		<!-- Navigation -->
		<div id="navigation">
		</div>
		<!-- end Navigation -->
		
		<!-- Sub-menu -->
		<div id="sub-navigation">
			<ul>
			    <li><a href="index.php">TRANG CHỦ</a></li>
			    <li><a href="#">THỂ LOẠI</a></li>    
                <li><a href="about.php">GIỚI THIỆU</a></li>
			    <li><a href="#">YÊU CẦU PHIM</a></li>
			</ul>
			<div id="search">
				<form action="home_submit" method="get" accept-charset="utf-8">
					<label for="search-field"> </label>					
					<input type="text" name="search field" value="Nhập phim cần tìm" id="search-field" title="Nhập phim cần tìm" class="blink search-field"  />
					<input type="submit" value="TÌM KIẾM" class="search-button" />
				</form>
			</div>
		</div>
		<!-- end Sub-Menu -->
		
	</div>
	<!-- end Header -->

<?php 
error_reporting(E_ERROR | E_PARSE);
if(!isset($_SESSION)) session_start();
include "config.php";
if (isset($_POST['submit']))
{
     $query = "SELECT username, password FROM tb_user WHERE username = '" .
          $_POST['username'] . "' AND password ='". $_POST['password']
          ."';";
     $result = mysql_query($query) or die(mysql_error());

     if (mysql_num_rows($result) == 1)
     {
          $_SESSION["log_user"] = $_POST['username'];
          $_SESSION["log_password"] = $_POST['password'];
          header("Refresh: 5; URL=index.php");
          echo "Đăng nhập thành công. Bạn đang được chuyển đến trang chủ!<br>";
          echo "(Nếu thấy lâu có thể, <a href=\"index.php\">nhấn vào đây</a>)";
     }
     else
     {
?>
          Username hoặc password không hợp lệ<br>
              <form action="index.php?id=login" method="post">
          Username: <input type="text" name="username"><br>
          Password: <input type="password" name="password"><br><br>
          <input type="submit" name="submit" value="Login">
          <input type="reset" name="reset" value="Hủy">
              </form>
<?php
     }
}
else
{

?>
	<div align="center"><h1>&nbsp;&nbsp;&nbsp;&nbsp;Đăng nhập:</h1></div>
     Nhập username và Password...<br>
  
         <form action="index.php?id=login" method="post">    
     Tài Khoản: <input type="text" name="username"><br>
     Mật Khẩu: <input type="password" name="password"><br><br>
     <div align="center">
     <input type="submit" name="submit" value="Login">
     <input type="reset" name="reset" value="Hủy">
     </div>
         </form>
     <?php 
	 }
?>
        <div id="footer">
                        <p> &copy; 2017 Aprotrain-Aptech. All Rights Reserved.  Designed by <a href="https://www.facebook.com/huyparody.xdavn" target="_blank" title="The Sweetest CSS Templates WorldWide">huyparody</a></p>
                </div>
                <!-- end Footer -->
        </div>
        <!-- end Shell -->
        </body>
        </html>

