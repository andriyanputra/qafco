<?php
require 'database.php';

$kode_jenis_medis = null;
if (!empty($_GET['kode_jenis_medis'])) {
    $kode_jenis_medis = $_REQUEST['kode_jenis_medis'];
}

if (null == $kode_jenis_medis) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    // keep track valnm_jenisation errors
    $nm_jenisError = null;

    // keep track post values
    $nm_jenis = $_POST['nm_jenis'];

    // valnm_jenisate input
    $valnm_jenis = true;
    if (empty($nm_jenis)) {
        $nm_jenisError = 'Please enter Name';
        $valkode_jenis_medis = false;
    }
    // update data
    if ($valkode_jenis_medis) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tb_jenis_medis set nm_jenis = ? WHERE kode_jenis_medis = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nm_jenis, $kode_jenis_medis));
        Database::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_jenis_medis where kode_jenis_medis = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_jenis_medis));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nm_jenis = $data['nm_jenis'];
    Database::disconnect();
}
?>


<?php include '../../../template/header2.php' ?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Update a Jenis Medis</h3>
        </div>

        <form class="form-horizontal" action="update.php?kode_jenis_medis=<?php echo $kode_jenis_medis ?>" method="post">
            <div class="control-group <?php echo!empty($nm_jenisError) ? 'error' : ''; ?>">
                <label class="control-label">Jenis Medis</label>
                <div class="controls">
                    <input name="nm_jenis" type="text"  placeholder="nm_jenis" value="<?php echo!empty($nm_jenis) ? $nm_jenis : ''; ?>">
                    <?php if (!empty($nm_jenisError)): ?>
                        <span class="help-inline"><?php echo $nm_jenisError; ?></span>
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