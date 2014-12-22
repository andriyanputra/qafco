<?php
require 'database.php';
$kode_asuransi = null;
if (!empty($_GET['kode_asuransi'])) {
    $kode_asuransi = $_REQUEST['kode_asuransi'];
}

if (null == $kode_asuransi) {
    header("Location: index.php");
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_asuransi where kode_asuransi = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_asuransi));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}
?>

<?php include '../../../template/header2.php' ?>
<div class="container">
    <div class="span10 offset1">
        <div class="row">
            <h3>Read a Asuransi</h3>
        </div>

        <div class="form-horizontal well" >
            <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['nama_asuransi']; ?>
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