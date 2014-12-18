<?php
$msg = $_GET['msg'];
if($msg == 'err_login'){
	header('location:beranda/halaman_utama?msg=err_login');	
	exit();
}else{
	header('location:beranda/halaman_utama');	
}

?>