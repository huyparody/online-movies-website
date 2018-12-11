<?php
require_once('header.php'); 
require_once('admin/config.php'); 
if(isset($_GET['tukhoa'])){
    $result = mysql_query("select count(*) from tb_film where title like '%{$_GET['tukhoa']}%' or actor like '%{$_GET['tukhoa']}%' or director like '%{$_GET['tukhoa']}%'");
}
else {
    $result = mysql_query('select count(*) from tb_film');
}
while($row=mysql_fetch_array($result))
{
	?>
<?php
}


if(isset($_GET['tukhoa'])){
$sql="select * from tb_film where title like '%{$_GET['tukhoa']}%' or actor like '%{$_GET['tukhoa']}%' or director like '%{$_GET['tukhoa']}%'";
$result = mysql_query($sql) or die("Lỗi Cơ Sở Dữ Liệu!!!");
}
else {
$sql = "select * from tb_film where title";
$result = mysql_query($sql) or die("Lỗi Cơ Sở Dữ Liệu!!!");
}
while($row = mysql_fetch_array($result))
{?>
					<div class="movie">
						<div class="movie-image">
						<a href="index.php?thaotac=thongtinphim&filmid=<?php echo $row['filmid'];?>"><?php echo $row['title']; ?><img src="admin/<?php echo $row['anhminhhoa']; ?>" alt="movie"/></a>
						</div>
					</div>


<?php
}

echo '</ul></div></div>';



