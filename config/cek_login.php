<?php
    include 'connection_.php';
    $user= $_POST['user'];
    $password= $_POST['password'];
    
    $result= mysql_query("SELECT * FROM admin WHERE 					    
	USER='$user' AND PASSWORD ='$password'");
    $jml_kolom = mysql_num_rows($result);
    if ($jml_kolom == 1){
        $_SESSION['user'] = $user;
        header('location: dashboard.php');
        } else{
			echo "<center>LOGIN GAGAL! <br> 
        	Ha... ha... Kapok halamane Ilaaaaaanggg :-).<br>
			Username atau Password Anda tidak benar.<br>
        	Atau account Anda sedang diblokir.<br>";
 			echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";	
        }   
?>
        

        

        