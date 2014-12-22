<?php
require 'database.php';
$kode_jenis_dokumen = null;
if (!empty($_GET['kode_jenis_dokumen'])) {
    $kode_jenis_dokumen = $_REQUEST['kode_jenis_dokumen'];
}

if (null == $kode_jenis_dokumen) {
    header("Location: index.php");
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_jenis_dokumen where kode_jenis_dokumen = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_jenis_dokumen));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}
?>

<?php include '../../../template/header2.php' ?>
<div class="container">
    <div class="span10 offset1">
        <div class="row">
            <h3>Read a Jenis Dokumen</h3>
        </div>

        <div class="form-horizontal well" >
            <div class="control-group">
                <label class="control-label">Jenis Dokumen</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['jenis_dokumen']; ?>
                    </label>
                </div>
            </div>
            <div class="form-actions">
                <a class="btn" href="index.php">Back</a>
            </div>


        </div>
    </div>

</div> <!-- /container -->
<?php include '../../../template/footer2.php' ?>