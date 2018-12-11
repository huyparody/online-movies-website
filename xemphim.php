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

		<!-- end Sub-Menu -->

		
	</div>
	<!-- end Header -->
	
        <?php 
			//session_start();
            require_once('./admin/config.php'); 
			if(isset($_POST['submit_xem']))
			{
				$idfilm = $_POST['id_xem'];
				$sql="select link from tb_film where filmid = ".$idfilm;
				$sql2="select title from tb_film where filmid =".$idfilm;
				$result=mysql_query($sql) or die(mysql_error());
				$result2=mysql_query($sql2) or die(mysql_error());
				$row = mysql_fetch_array($result);
				$row2 = mysql_fetch_array($result2);
			}
        ?>
		
		<div class="phim_dangxem">Bạn đang xem phim: <?php echo $row2['title']; ?></div>
		
			<section class="film-wrapper not-slider">
						<div class="film-container">
							<div class="player-view">
								<div class="player-view-video">
<?php
error_reporting(0);
function viewsource($url){
    $ch      = curl_init();
    $timeout = 15;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.69 Safari/537.36");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function GetLinkAPI($curl){
    $get = viewsource('http://api.anivn.com/?url=' . $curl);
    $remove = str_replace('\/','/',$get);
    preg_match_all('#"(.+?)":"(.+?)"#',$remove,$data);
	preg_match_all('#<title>(.+?)</title>#',viewsource($curl),$title);
	$tieude = str_replace('.MP4 - Google Drive','',$title[1][0]);
	$tieude = str_replace('.mp4 - Google Drive','',$title[1][0]);
	$tieude = str_replace('.Mp4 - Google Drive','',$title[1][0]);
	foreach ($data[2] as $i => $quality) {
		if (strpos($data[1][$i], '360') !== false) {
            $video = '<video id="videoPlayer" src="'.$data[2][$i].'&amp;title=[LocPhim.Com]-'.$tieude.'-(360p)" controls playsinline preload="auto" video_id="318" class="vg-video vgplayer-skin iplayer-skin" width="676px" height="400px">';
        } if (strpos($data[1][$i], '1080') !== false) {
            $v1080p = '<source src="'.$data[2][$i].'&amp;title=[LocPhim.Com]-'.$tieude.'-(1080p)"  quality="1080p" type="video/Mp4">';
        } elseif (strpos($data[1][$i], '720') !== false) {
            $v720p = '<source src="'.$data[2][$i].'&amp;title=[LocPhim.Com]-'.$tieude.'-(720p)"  quality="720p" type="video/Mp4">';
        } elseif (strpos($data[1][$i], '480') !== false) {
            $v480p = '<source src="'.$data[2][$i].'&amp;title=[LocPhim.Com]-'.$tieude.'-(480p)" default=true quality="480p" type="video/Mp4">';
        } elseif (strpos($data[1][$i], '360') !== false) {
            $v360p = '<source src="'.$data[2][$i].'&amp;title=[LocPhim.Com]-'.$tieude.'-(360p)"  quality="360p" type="video/Mp4">';
        }
    }
    return $video.$v1080p.$v720p.$v480p.$v360p;
}
$url = $_GET['link'];
echo GetLinkAPI($row['link']);
?>
	</video>
								</div>
							</div>
						</div>
					</section>
				</div>
	<link rel="stylesheet" href="jwplayer/player.min-284b8de7f5.css">
	<script type="text/javascript" src="jwplayer/jquery.min-cd0095b52c.js"></script>
	<script type="text/javascript" src="jwplayer/vue.min-fc512ede9a.js"></script>
	<script type="text/javascript" src="jwplayer/store.min-b3dba894be.js"></script>
	<script type="text/javascript" src="jwplayer/ismobile.min-1b30678ec9.js"></script>
	<script type="text/javascript" src="jwplayer/player.min-0df67eac1c.js"></script>
	<script type="text/javascript" src="jwplayer/film-09a0d155cb.js"></script>
	
        <div id="footer">
                        <p> &copy; 2017 Aprotrain-Aptech. All Rights Reserved.  Designed by <a href="https://www.facebook.com/huyparody.xdavn" target="_blank" title="The Sweetest CSS Templates WorldWide">huyparody</a></p>
                </div>
                <!-- end Footer -->
        </div>
        <!-- end Shell -->
        </body>
        </html>