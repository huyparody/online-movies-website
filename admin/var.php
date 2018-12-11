<?php
error_reporting(E_ERROR | E_PARSE);
if(!isset($_SESSION)) session_start();

	if(isset($_GET["thaotac"])){
	$bien=$_GET["thaotac"];
	if($bien==listuser) include ('listuser.php');
	if($bien==login) include ('userlogin.php');
	if($bien==update) include ('updateuser.php');
	if($bien==quanlytheloai) include ('quanlytheloai.php');
	if($bien==suatheloai) include ('suatheloai.php');
	if($bien==suatheloaimoi) include ('suatheloaimoi.php');	
	if($bien==themtheloai) include ('themtheloai.php');
	if($bien==themtheloaimoi) include ('themtheloaimoi.php');
	if($bien==quanlyphim) include ('quanlyphim.php');
	if($bien==themphim) include ('themphim.php');
	if($bien==themphimmoi) include ('themphimmoi.php');
	if($bien==suaphim) include ('suaphim.php');
	if($bien==suaphimmoi) include ('suaphimmoi.php');
    if($bien==xoaphim) include ('xoaphim.php');
	if($bien==adduser) include ('adduser.php');
	if($bien==addusernew) include ('addusernew.php'); 

?>

<?php
	}
	else
if (!isset($_SESSION["loguser"])  || !isset($_SESSION["logpassword"]))
include("userlogin.php");
else
include("loggeduser.php");
?>
