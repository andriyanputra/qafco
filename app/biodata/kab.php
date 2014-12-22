<?php

include('../../config/connection.php');

$kab = $_GET['kab'];
$kec = "SELECT * FROM tb_wilayah WHERE kode_kab = $kab group by nm_kec";
$hasil =  mysql_query($kec) or die("Query failed: " . mysql_error());

while($w = mysql_fetch_array($hasil)) {
    echo "<option value=$w[kode_kec]>$w[nm_kec]</option>";
}

?>
