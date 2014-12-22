<?php

include('../../config/connection.php');

$prov = $_GET['prov']; echo $prov;
$kab = "SELECT * FROM tb_wilayah WHERE kode_prov = $prov group by nm_kab";
$hasil =  mysql_query($kab) or die("Query failed: " . mysql_error());

while($w = mysql_fetch_array($hasil)) {
	echo "<option value=$w[kode_kab]>$w[nm_kab]</option>";
}

?>