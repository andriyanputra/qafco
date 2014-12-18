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
        $level = $c['kode_level_akses'];

        if ($remember == "1") {
            if($level == '1'){
                setcookie('user', $user, time()+7200);
                setcookie('level', $level, time()+7200);
                header("Location: ../beranda/index?msg=log_in&level=$level");
                exit();
            }else{
                setcookie('user', $user, time()+7200);
                setcookie('level', $level, time()+7200);
                header("Location: ../beranda/index?msg=log_in&level=$level");
                exit();
            }
        }else{
            if($level == '1'){
                $_SESSION['user'] = $user;
                $_SESSION['level'] = $level;
                //header("Location: wew.php");
                header("Location: ../beranda/index?msg=log_in&level=$level");
                exit();
            }else{
                $_SESSION['user'] = $user;
                $_SESSION['level'] = $level;
                //header("Location: wew.php");
                header("Location: ../beranda/index?msg=log_in&level=$level");
                exit();
            }
        }

} else {
    //echo "error";
    header("Location: ../index?msg=err_login");
    exit();
}
}
?>