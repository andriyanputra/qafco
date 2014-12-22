<?php
require 'database.php';
$kode_jenis_medis = null;
if (!empty($_GET['kode_jenis_medis'])) {
    $kode_jenis_medis = $_REQUEST['kode_jenis_medis'];
}

if (null == $kode_jenis_medis) {
    header("Location: index.php");
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_jenis_medis where kode_jenis_medis = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_jenis_medis));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}
?>

<?php include '../../../template/header2.php' ?>
<div class="container">
    <div class="span10 offset1">
        <div class="row">
            <h3>Read a Jenis Medis</h3>
        </div>

        <div class="form-horizontal well" >
            <div class="control-group">
                <label class="control-label">Jenis Medis</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['nm_jenis']; ?>
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