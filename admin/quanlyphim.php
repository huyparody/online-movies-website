<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION)) 
header('location:index.php');
include "./config.php";
?>
<div style="background: url(../css/images/body-bg.gif)">
<div class="bar"><a href="index.php?thaotac=themphim"><font color="yellow">Thêm Phim Mới Lên WebSite</font></a></div>
                  
                    <table class="table" border="1">
                    <tr align="center">
                    <td class="td">Tên Phim</td>
                    <td class="td">Đạo Diễn</td>
                    <td class="td">Diễn Viên</td>
                    <td class="td">Năm Sản Xuất</td>
                    <td class="td">Thể Loại</td>
                    <td class="td">Thời Lượng</td>
                    <td class="td">Quốc Gia</td>
                    <td class="td">Link Phim</td>
                    <td class="td">Hình Ảnh</td>
                    <!--<td class="td">Mô Tả</td>-->
                    <td class="td">Thao Tác</td>   
                    </tr>
			<?php
						//đoạn lệnh để phân trang
			$baitren_mottrang = 5;
			//lấy biến trang
			if(empty($_REQUEST['page']))
			$page = 0 ;
			else
			$page = $_REQUEST['page'];
			//Lấy tổng số hàng để chia số bài trên 1 trang sẽ ra số trang	
			$sodu_lieu = mysql_num_rows(mysql_query("SELECT * FROM tb_film") ) or die(mysql_error());
			$sotrang = $sodu_lieu/$baitren_mottrang;
			$sql="SELECT * from tb_film ORDER BY filmid DESC limit ".$page*$baitren_mottrang." , ". $baitren_mottrang;
			$result=mysql_query($sql) or die(mysql_error(2));
			while($row=mysql_fetch_array($result))
					{
					?>
                    		
                     <tr align="center">
                     <td class="tdcon"><?php echo $row['title']; ?></td>
                     <td class="tdcon"><?php echo $row['director']; ?></td>
                     <td class="tdcon"><?php echo $row['actor']; ?></td>
                     <td class="tdcon"><?php echo date('d-m-Y',strtotime($row['release_time']));?></td>
                     <td class="tdcon"><?php echo $row['category']; ?></td>
                     <td class="tdcon"><?php echo $row['duration']; ?></td>
                     <td class="tdcon"><?php echo $row['country']; ?></td>
                     <td class="tdcon"><?php echo substr($row['link'],0,30); ?>...</td>
                     <td class="tdcon"><img src="<?php echo $row['anhminhhoa']; ?>" height="150" width="150"/></td>
                     <!--<td class="tdcon"><?php echo substr($row['info_phim'],0,400); ?>...</td>-->
                     <td class="tdcon"><div align="center">
                     <a href="index.php?thaotac=suaphim&filmid=<?php echo $row['filmid'];?>">Sửa</a><br /><br />
                     <a href="xoaphim.php?title=<?php echo $row['title'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</a>	
                        	</div></td>
                            </tr>
                    <?php } ?>
                    </table>
                    <div class="table"><div class="trang">
                    <?php
						echo "Trang : ";
						for ( $page = 0; $page <= $sotrang; $page ++ )
						{
							echo " <span class='trang'><a href='index.php?thaotac=quanlyphim&page=$page'>". ($page+1) ."</a></span> ";
						}
					?>
                                                  <div class="bar">
                      <a href="index.php"><font color="yellow">Trở Về Trang Chủ</font></a></div>
                      </div>
                    </div>
                    </div>                   
                    </div>
                    </div>