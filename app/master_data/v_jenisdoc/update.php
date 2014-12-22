<?php
require 'database.php';

$kode_jenis_dokumen = null;
if (!empty($_GET['kode_jenis_dokumen'])) {
    $kode_jenis_dokumen = $_REQUEST['kode_jenis_dokumen'];
}

if (null == $kode_jenis_dokumen) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    // keep track valjenis_dokumenation errors
    $jenis_dokumenError = null;

    // keep track post values
    $jenis_dokumen = $_POST['jenis_dokumen'];

    // valjenis_dokumenate input
    $valjenis_dokumen = true;
    if (empty($jenis_dokumen)) {
        $jenis_dokumenError = 'Please enter Name';
        $valkode_jenis_dokumen = false;
    }
    // update data
    if ($valkode_jenis_dokumen) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tb_jenis_dokumen set jenis_dokumen = ? WHERE kode_jenis_dokumen = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($jenis_dokumen, $kode_jenis_dokumen));
        Database::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_jenis_dokumen where kode_jenis_dokumen = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_jenis_dokumen));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $jenis_dokumen = $data['jenis_dokumen'];
    Database::disconnect();
}
?>


<?php include '../../../template/header2.php' ?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Update a Jenis Dokumen</h3>
        </div>

        <form class="form-horizontal" action="update.php?kode_jenis_dokumen=<?php echo $kode_jenis_dokumen ?>" method="post">
            <div class="control-group <?php echo!empty($jenis_dokumenError) ? 'error' : ''; ?>">
                <label class="control-label">Jenis Dokumen</label>
                <div class="controls">
                    <input name="jenis_dokumen" type="text"  placeholder="jenis_dokumen" value="<?php echo!empty($jenis_dokumen) ? $jenis_dokumen : ''; ?>">
                    <?php if (!empty($jenis_dokumenError)): ?>
                        <span class="help-inline"><?php echo $jenis_dokumenError; ?></span>
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