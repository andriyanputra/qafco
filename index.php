<?php
$msg = $_GET['msg'];
if($msg == 'err_login'){
	header('location:app/beranda/halaman_utama?msg=err_login');	
	exit();
}else{
	header('location:app/beranda/halaman_utama');	
}

?>