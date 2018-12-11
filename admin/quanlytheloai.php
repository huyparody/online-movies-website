<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION)) 
header('location:var.php');
include "./config.php";
?>
<div class="bar"><h1>Quản Lý Thể Loại Phim</h1></div>
<div style="background: url(../css/images/body-bg.gif);">
<table class="table" width="100%" border="1">
                    <tr><td colspan="10"><br />
                    <form>
                    	<a href="index.php?thaotac=themtheloai"><input type="button" value="Thêm Thể Lọai Phim"/></a>
                    </form><br />
                    </td></tr>
					<tr>
                         <td class="td"><center>Tên Danh Mục</center></td>
                        <td class="td"><center>Thao Tác</center></div></td>
                    </tr>
                    <?php	
                    	$sql="select * from tb_category";
						$result=mysql_query($sql) or die(mysql_error());
						while($row=mysql_fetch_array($result))
					{
					?>
								<tr>
                           			<td class="tdcon"><center><?php echo $row['name']; ?></center></td>
                                    <td class="tdcon"><center>
					 				<a href="index.php?loaiphim=<?php echo $row['name'];?>&thaotac=suatheloai">Sửa</a> | 
                                    <a href="xoatheloai.php?theloai=<?php echo $row['name'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</a>	
                        </center>
                            		</td>
                                </tr>
                      <?php } ?>
					  </table>
                      <div class="bar">
                      <a href="index.php"><font color="yellow">Trở Về Trang Chủ</font></a></div>
                      </div>
                      </div>
