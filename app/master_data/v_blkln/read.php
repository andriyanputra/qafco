<?php
require 'database.php';
$kode_blk = null;
if (!empty($_GET['kode_blk'])) {
    $kode_blk = $_REQUEST['kode_blk'];
}

if (null == $kode_blk) {
    header("Location: index.php");
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_blkn where kode_blk = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_blk));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}
?>

<?php include '../../../template/header2.php' ?>
<div class="container">
    <div class="span10 offset1">
        <div class="row">
            <h3>Read a Balai Latihan Kerja Luar Negeri</h3>
        </div>

        <div class="form-horizontal well" >
            <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['nama_blk']; ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Address</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['alamat_blk']; ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Mobile Number</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['telp_blk']; ?>
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