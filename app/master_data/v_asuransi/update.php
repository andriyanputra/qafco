<?php
require 'database.php';

$kode_asuransi = null;
if (!empty($_GET['kode_asuransi'])) {
    $kode_asuransi = $_REQUEST['kode_asuransi'];
}

if (null == $kode_asuransi) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    // keep track valnama_asuransiation errors
    $nama_asuransiError = null;

    // keep track post values
    $nama_asuransi = $_POST['nama_asuransi'];

    // valnama_asuransiate input
    $valnama_asuransi = true;
    if (empty($nama_asuransi)) {
        $nama_asuransiError = 'Please enter Name';
        $valkode_asuransi = false;
    }
    // update data
    if ($valkode_asuransi) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tb_asuransi set nama_asuransi = ? WHERE kode_asuransi = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nama_asuransi, $kode_asuransi));
        Database::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_asuransi where kode_asuransi = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_asuransi));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nama_asuransi = $data['nama_asuransi'];
    Database::disconnect();
}
?>


<?php include '../../../template/header2.php' ?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Update a Asuransi</h3>
        </div>

        <form class="form-horizontal" action="update.php?kode_asuransi=<?php echo $kode_asuransi ?>" method="post">
            <div class="control-group <?php echo!empty($nama_asuransiError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nama_asuransi" type="text"  placeholder="nama_asuransi" value="<?php echo!empty($nama_asuransi) ? $nama_asuransi : ''; ?>">
                    <?php if (!empty($nama_asuransiError)): ?>
                        <span class="help-inline"><?php echo $nama_asuransiError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn" href="index.php">Back</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
<?php include '../../../template/footer2.php' ?>