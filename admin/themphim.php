<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION)) 
header('location:index.php');
include "./config.php";
?>
<div class="td"><center>Thêm Bộ Phim Mới Cho WebSite</center></div>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<div style="background: url(../css/images/body-bg.gif)">
<form name="f" action="index.php?thaotac=themphimmoi" method="post" enctype="multipart/form-data">
<table class="table" width="100%">
    <tr width="100%">
		<td class="tdcon">Tên Phim:</td>
        <td class="tdcon"><input type="text" name="title"/></td>
    </tr>
    <tr width="100%">
		<td class="tdcon">Hình Ảnh:</td>
        <td class="tdcon"><input type="file" name="anhminhhoa" /></td>
    </tr>
    <tr width="100%">
		<td class="tdcon">Diễn Viên:</td>
        <td class="tdcon"><input type="text" name="actor" /></td>
    </tr>
    <tr width="100%">
    	<td class="tdcon">Mô Tả:</td>
        <td class="tdcon"><textarea name="info_phim" id="mota" rows="20" cols="95"></textarea>
		<script>CKEDITOR.replace('mota');</script>
        </td>
     </tr>
     <tr width="100%">
    	<td class="tdcon">Thể Loại</td>
        <td class="tdcon">
					<!-- <select name="category" size="1" onChange="replace(this.options.selectedIndex)"> -->
					<select name="category">
    							<?php 								
									$sqlstr2=mysql_query("SELECT * FROM tb_category");
	   								while($row_2=mysql_fetch_array($sqlstr2)){
								?>
									<option value="<?php echo $row_2['name']; ?>"><?php echo $row_2['name']; ?></option>
								<?php
									}									
								?>		
    				</select>
        </td>
    </tr>
    <tr width="100%">
		<td class="tdcon">Đạo Diễn:</td>
        <td class="tdcon"><input type="text" name="director" /></td>
    </tr>
    
    <tr width="100%">
		<td class="tdcon">Thời Lượng:</td>
        <td class="tdcon"><input type="text" name="duration" /></td>
    </tr>
    <tr width="100%">
		<td class="tdcon">Năm Sản Xuất:</td>
        <td class="tdcon"><input type="date" name="release_time" /></td>
    </tr>
    <tr width="100%">
		<td class="tdcon">Quốc Gia:</td>
        <td class="tdcon"><input type="text" name="country" /></td>
    </tr>
    </tr>
    <tr width="100%">
		<td class="tdcon">Link Phim:</td>
        <td class="tdcon"><input type="text" name="link" /></td>
    </tr>
</table><br />
    <input type="submit" name="submit" value="Thêm" />
 			<a href="index.php?thaotac=quanlyphim"><input type="button" value="Quay Lại"/></a>	
 
 </form>
</div>
<div class="bar"><a href="index.php?thaotac=quanlyphim"><font color="yellow">Trở Về Trang Quản Lý Phim</font></a></div>
</div>
