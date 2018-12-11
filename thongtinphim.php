        <?php
            //include './header.php';

        ?>
		<?php
		error_reporting(E_ERROR | E_PARSE);
		session_start();
		if(!isset($_SESSION)) 
		header('location:index.php');
        ?>
        <?php 
            require_once('./admin/config.php'); 
			//$_SESSION['idxem'] = $_GET['filmid'];
			if(isset($_REQUEST['filmid']))
			{
            $film_id = $_REQUEST['filmid'];
            $sql="select * from tb_film, tb_category where filmid=$film_id";
            $result=mysql_query($sql) or die(mysql_error());
            $row = mysql_fetch_array($result);
			mysql_query("UPDATE tb_film SET soluotxem=soluotxem+1 WHERE filmid=$film_id'");
			}
        ?>	
			<div class="infophim">
            <h1>Thông tin Phim: <?php echo $row['title']; ?></h1>                 
			      
			</div>
				
				<div class="">
				<table width="100%">
				<tr>
					<td width="250px" style="vertical-align: top">
						<img src="/project1/admin/<?php echo $row["anhminhhoa"]?>" width="200px" height="300px"/>
						<form class="xp" action="xemphim.php" method="post">
				<input type="text" name="id_xem" hidden="true" value="<?php echo $film_id; ?>">
				<input type="submit" name="submit_xem" value="Xem Phim">
					</form> 
					</td>

					<td class="text detail">
						<div class="duration">Thời lượng: <?php echo $row['duration']; ?></br></br></div>
						<div class="years">Năm sản xuất: <?php echo date('d-m-Y',strtotime($row['release_time']));?></br></br></div>
						<div class="director">Thể Loại: <?php echo $row['category']; ?></br></br></div>		
						<div class="actor">Diễn viên: <?php echo $row['actor']; ?></br></br></div>
						<div class="director">Đạo diễn: <?php echo $row['director']; ?></br></br></div>
						<div class="country">Quốc Gia: <?php echo $row['country']; ?></br></br></div>
						<div class="views">Số Lượt Xem: <?php echo $row['soluotxem']; ?></br></br></div>
						<div class="info_detail">Thông tin chi tiết phim: </br><?php echo $row['info_phim']; ?></br></br></div>
					</td>
				</tr>
				
				</table>
				</div>
			
		
                               

<!--
        <div id="footer">
                        <p> &copy; 2017 Aprotrain-Aptech. All Rights Reserved.  Designed by <a href="https://www.facebook.com/huyparody.xdavn" target="_blank" title="huyparody">huyparody</a></p>
                </div>
                 end Footer -->
        </div>
        <!-- end Shell -->
        </body>
        </html>