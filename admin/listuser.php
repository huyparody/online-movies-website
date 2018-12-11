<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION)) 
header('location:var.php');
?>

<div class="bar"><h1>Quản Lý Admin Website</h1></div>
<div class="bar"><a href="index.php?thaotac=adduser"><font color="yellow">Thêm Admin</font></a></div>
<?php 
	require("./config.php");
	$sql="select * from tb_user order by username asc";
	$kq=mysql_query($sql)or die(mysql_error());
	if(mysql_num_rows($kq)>0)
	{
?>

<div style="background-image: url(../css/images/body-bg.gif)">
<table class="table" width="100%" border="1">
<tbody><tr> 
<td class="td">Username</td></td>
<td class="td">Họ tên</td>
<td class="td">Địa chỉ</td>
<td class="td">Ngày sinh</td>
<td class="td">Giới tính</td>
<td class="td">Điện thoại</td>
<td class="td">Email</td>
<td class="td">Sửa</td>
<td class="td">Xóa</td>
</tr>
<?php 
while ($row=mysql_fetch_array($kq))
{
echo"
 <tr><td class='tdcon'>$row[username]</td>
	 <td class='tdcon'>$row[hovaten]</td>
	 <td class='tdcon'>$row[diachi]</td>
	 <td class='tdcon'>$row[ngaysinh]</td>
	 <td class='tdcon'>$row[gioitinh]</td>
	 <td class='tdcon'>$row[dienthoai]</td>
     <td class='tdcon'>$row[email]</td>
   	 <!--<td class='tdcon'><a href=index.php?username=$row[username]&thaotac=adduser>Thêm</a></td>-->
	 <td class='tdcon'><a href=index.php?username=$row[username]&thaotac=update>Sửa</a></td>
	 <td class='tdcon'><a href=\"deleteuser.php?username=$row[username]\" onClick=\"return confirm('Bạn chắc chắn muốn xoá người dùng này?');\">Xóa</a></td>
</tr>";
}
echo"</tbody></table>";
}
?>
</div>
                      <div class="bar">
                      <a href="index.php"><font color="yellow">Trở Về Trang Chủ</font></a></div>
                      </div>
</div>
