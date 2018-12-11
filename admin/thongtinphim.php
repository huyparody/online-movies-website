        <?php
            include './header.php';
        ?>
		<?php
		error_reporting(E_ERROR | E_PARSE);
		session_start();
		if(!isset($_SESSION)) 
		header('location:index.php');
        ?>
        <?php 
            require_once('config.php'); 
            $sql="select * from tb_film, tb_category where filmid ='107'";
            $result=mysql_query($sql) or die(mysql_error());
            $row = mysql_fetch_array($result);
        ?>	
        <div class="infophim">
            <h1>Thông tin Phim: <?php echo $row['title']; ?></h1>                 <a href="xemphim.php">Xem Phim</a>
            
            
            <div class="detail">
                <div class="duration">Thời lượng: <?php echo $row['duration']; ?></div>
                <div class="years">Năm sản xuất: <?php echo date('d-m-Y',strtotime($row['release_time']));?></div>
                <div class="director">Thể Loại: <?php echo $row['name']; ?></div>
                <div class="actor">Diễn viên: <?php echo $row['actor']; ?></div>
                <div class="director">Đạo diễn: <?php echo $row['director']; ?></div>
                <div class="director">Quốc Gia: <?php echo $row['country']; ?></div>
                <img src="/project1/admin/<?php echo $row["anhminhhoa"] ?>"/>
                <div class="director">Thông tin chi tiết phim: <?php echo $row['info_phim']; ?></div>
                <div class="text">    

                </div>
            </div>
                               
        </div>

        <div id="footer">
                        <p> &copy; 2017 Aprotrain-Aptech. All Rights Reserved.  Designed by <a href="https://www.facebook.com/huyparody.xdavn" target="_blank" title="huyparody">huyparody</a></p>
                </div>
                <!-- end Footer -->
        </div>
        <!-- end Shell -->
        </body>
        </html>