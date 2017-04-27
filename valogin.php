<?php
include "class/crud.php";
$db = new crud();
$db->koneksi();
if($db->login($_POST['username'], $_POST['pass'])){
	header("location: admin/index.php");
}else{
	header("location: login.php");
}
?>