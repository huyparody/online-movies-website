<!-- Box -->
			<div class="box">
				<div class="head">
					<h2>PHIM MỚI</h2>
					<p class="text-right"><a href="#">Xem tất cả</a></p>
				</div>

				<?php
				$baitren_mottrang = 12;
				//lấy biến trang
				if(empty($_REQUEST['page']))
				$page = 0 ;
				else
				$page = $_REQUEST['page'];
				//Lấy tổng số hàng để chia số bài trên 1 trang sẽ ra số trang	
				$sodu_lieu = mysql_num_rows(mysql_query("select * from tb_film") ) or die(mysql_error());
				$sotrang = $sodu_lieu/$baitren_mottrang;
				//$sql="select * from tb_film limit "//
				$sql="select filmid, title, anhminhhoa from tb_film order by filmid desc limit ".$page*$baitren_mottrang." , ". $baitren_mottrang;
				$result=mysql_query($sql) or die(mysql_error(2));
				while($row=mysql_fetch_array($result))
					{
					?>
					<div class="movie">
						<div class="movie-image">
						<a href="index.php?thaotac=thongtinphim&filmid=<?php echo $row['filmid'];?>"><?php echo $row['title']; ?><img src="admin/<?php echo $row['anhminhhoa']; ?>" alt="movie"/></a>
						</div>
                    </div>	                 
                    <?php } ?>  

	
                
				<!-- end Movie -->
				<div class="cl">&nbsp;</div>
			</div>
			<!-- end Box -->
			
							<div class="table">
					<div class="trang">
                    <?php
									echo "Trang : ";
						for ( $page = 0; $page <= $sotrang; $page ++ )
						{
							echo " <span class='trang'><a href='index.php?page=$page&thaotac=listphim'>". ($page+1) ."</a></span> ";
						}
					?>
                    </div>
				</div>		