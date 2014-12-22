<?php
require 'database.php';
$kode_agen = null;
if (!empty($_GET['kode_agen'])) {
    $kode_agen = $_REQUEST['kode_agen'];
}

if (null == $kode_agen) {
    header("Location: index.php");
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_agen where kode_agen = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_agen));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}
?>

<?php include '../../template/header2.php' ?>
<div class="container">
    <div class="span10 offset1">
        <div class="row">
            <h3>Read a Agen</h3>
        </div>

        <div class="form-horizontal well" >
            <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['nama_agen']; ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Address</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['alamat_agen']; ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Mobile Number</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['telepon_agen']; ?>
                    </label>
                </div>
            </div>
            <div class="form-actions">
                <a class="btn" href="index.php">Back</a>
            </div>


        </div>
    </div>

</div> <!-- /container -->
<?php include '../../template/footer2.php' ?>