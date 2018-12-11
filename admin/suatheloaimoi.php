<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION)) 
header('location:index.php');
include "./config.php";
?>

<?php
     $_get=$_POST['theloaimoi'];
	 $ten=$_POST['theloai'];
	 $sql_edit="update tb_category set name='".$ten."' where name='".$_get."'";
	 mysql_query($sql_edit) or die(mysql_error());
	header("Location: index.php?thaotac=quanlytheloai");
?>
