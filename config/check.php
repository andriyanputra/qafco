<?php
require_once "connection_.php";
require_once "function.core.php";
session_start();

$user = filter($_POST['user']);
$pass = filter(md5($_POST['pass']));    // mengenkripsi password
$remember = $_POST['remember'];
//$grade = $_POST['level'];
    
if(isset($_POST['submit'])){
    //echo $user; echo "<br>"; echo $pass;

    $cek = $db->query("SELECT * FROM tb_user WHERE username='$user' AND password='$pass'");
    $k = $cek->num_rows;

    if($k==1)   {
        $c = $cek->fetch_array();
        $level_ = $c['kode_level_akses'];
        $user_ = $c['username'];
        $pass_ = $c['password'];
        //echo $user_; echo "<br>"; echo $level_;        
        $_SESSION['user'] = $c['username'];
        $_SESSION['pass'] = $c['password'];
        $_SESSION['level'] = $c['kode_level_akses'];
        setcookie('user', $_SESSION['user'], time()+7200);
       
        if($c['username']=="$user_" && $c['password']=="$pass_" && $c['kode_level_akses']=="$level_" && $c['kode_level_akses']=="1"){
            header("Location: ../app/beranda/index?msg=log_in&level=$level_"); //Halaman redirect untuk admin
            exit();   
        } else if($c['username']=="$user_" && $c['password']=="$pass_" && $c['kode_level_akses']=="$level_" && $c['kode_level_akses']=="2"){
            header("Location: ../app/beranda/index?msg=log_in&level=$level_"); //Halaman redirect untuk majikan
            exit(); 
        } 
    } else {
        header("Location: ../index?msg=err_login");
        exit();
    }
}
?>