<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<?php
session_start();
include "admin/config.php";
?>
<head>
	<title>Project 1</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!--[if IE 6]>
		<link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" />
	<![endif]-->
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-func.js"></script>
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
			  <!-- <li class="drop-down"><a href="#">THỂ LOẠI</a>
					<ul>
						<?php 								
									$sqlstr2=mysql_query("SELECT * FROM tb_category");
	   								while($row_2=mysql_fetch_array($sqlstr2)){
								?>
									<li><a href="#"><?php echo $row_2['name']; ?></a></li>
								<?php
									}									
								?>		
					</ul>
				</li>  -->
				<li><a href="#">LIÊN HỆ QUẢNG CÁO</a></li>  
                <li><a href="about.php">GIỚI THIỆU</a></li>
			    <li><a href="#">YÊU CẦU PHIM</a></li>
			</ul>
			<div id="search">
				<!--<form action="" method="GET" accept-charset="utf-8">
					<label for="search-field"> </label>					
					<input type="text" name="key" value="Nhập phim cần tìm" title="Nhập phim cần tìm" class="blink search-field"  />
					<input type="submit" value="TÌM KIẾM" class="search-button" />
				</form>-->
				<form method="GET" id="form-search" action="/project1/search.php">
					<div>
						<input type="text" name="tukhoa" placeholder="Tìm Kiếm Theo : Tên Phim, Đạo Diễn, Diễn Viên" value="">
						<input name="" id="searchsubmit" class="" value="Tìm kiếm" type="submit">
					</div>
					</form>
			</div>
		</div>
		<?php
			require('slide/demo.html');
		?>
		<!-- end Sub-Menu -->

		
	</div>
	<!-- end Header -->