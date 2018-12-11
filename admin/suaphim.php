<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION)) 
header('location:index.php');
include "./config.php";
$_get=$_GET['filmid'];
	$array=array(50);
	$sql="Select * from tb_film where filmid='$_get'";
	$result=mysql_query($sql) or die(mysql_error());
	$row=mysql_fetch_array($result);
?>
<div style="background: url(../css/images/body-bg.gif)">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<form name="f" action="index.php?thaotac=suaphimmoi" method="POST" enctype="multipart/form-data">

	<div class="bar">Sửa Thông Tin Phim : <?php echo $row['title']; ?></div>
<table class="table" width="100%">
    <tr >
  	    <td class="tdcon">Tên Phim</td>
	   	<td class="tdcon">
	    			<input type="text" name="tenphimmoi"  value="<?php echo $row['title']; ?>"   size="40" />   </td>
	</tr>
    <tr>
		<td class="tdcon">Hình Ảnh</td>
        <td class="tdcon"><input type="file" name="anhminhhoamoi"  value="<?php echo $row['anhminhhoa']; ?>"/></td>
    </tr>
    <tr>
		<td class="tdcon">Diễn Viên</td>
        <td class="tdcon"><input type="text" name="dienvienmoi"  value="<?php echo $row['actor']; ?>"   size="40" /></td>
    </tr>
   	<tr>
    	<td class="tdcon">Mô Tả</td>
        <td class="tdcon"> <textarea name="thongtinphimmoi" id="mota" rows="20" cols="100"><?php echo $row['info_phim']; ?></textarea>
				<script>CKEDITOR.replace('mota');</script>
        </td>
     </tr>
     <tr >
	   			<td class="tdcon">Thể Loại</td>
    			<td class="tdcon">
					<select name="theloaimoi">
								<option value="">-=Select Type =-</option>
    							<?php 								
									$sqlstr2=mysql_query("SELECT * FROM tb_category");
	   								while($row_2=mysql_fetch_array($sqlstr2)){
								?>
									<option value="<?php echo $row_2['name']; ?>"><?php echo $row_2['name']; ?></option>
								<?php
									}									
								?>		
    				</select>
                	<!-- <select name="theloaimoi">
					
    						<?php 
							/*
							$sqlstr2=mysql_query("SELECT * FROM tb_category");
	   											//static $i=0;
												
	   											while($row_2=mysql_fetch_array($sqlstr2))
												{ 
													//$array[$i]=	$row_2['theloai'];
													//$i=$i+1;	
													echo  "<option value=".$row_2['name']." ".($row_2['name']==$row['name']?'Selected':'').">".$row_2['name']."</option>";		
												}
											*/
									?>	
    				</select> -->
                </td>
      </tr>
    <tr>
		<td class="tdcon">Đạo Diễn</td>
        <td class="tdcon"><input type="text" name="daodienmoi"  value="<?php echo $row['director']; ?>"   size="40" /></td>
    </tr>
	    <tr>
		<td class="tdcon">Thời Lượng</td>
        <td class="tdcon"><input type="text" name="thoiluongphimmoi"  value="<?php echo $row['duration']; ?>"   size="40" /></td>
    </tr>
       <tr>
		<td class="tdcon">Năm Sản Xuất</td>
        <td class="tdcon"><input type="date" name="namsanxuatmoi"  value="<?php echo $row['release_time']; ?>"   size="40" /></td>
    </tr>
     <tr >
    <tr>
		<td class="tdcon">Quốc Gia</td>
        <td class="tdcon"><input type="text" name="noisanxuatmoi"  value="<?php echo $row['country']; ?>"   size="40" /></td>
    </tr>
		<td class="tdcon">Link Phim</td>
        <td class="tdcon"><input type="text" name="linkphimmoi"  value="<?php echo $row['link']; ?>"   size="40" /></td>
    </tr>
           <tr>
        	<td class="tdcon">&nbsp;</td>
                <input type="hidden" value="<?php echo $row['filmid'];?>" name="filmid"/>
        	<td class="tdcon"><input type="submit" value="Sửa Phim" name="submit" />
       			<a href="index.php?thaotac=quanlyphim"><input type="button" value="Quay Lại"/></a>
         	</td>
         </tr>
     </table> 
</form>
</div>
<div class="bar"><a href="index.php?thaotac=quanlyphim"><font color="yellow">Trở Về Trang Quản Lý Phim</font></a></div>
</div>

