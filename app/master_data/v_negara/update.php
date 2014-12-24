<?php
require 'database.php';

$kode_negara = null;
if (!empty($_GET['kode_negara'])) {
    $kode_negara = $_REQUEST['kode_negara'];
}

if (null == $kode_negara) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    // keep track valkode_negaraation errors
    $nama_negaraError = null;

    // keep track post values
    $nama_negara = $_POST['nama_negara'];

    // valkode_negaraate input
    $valkode_negara = true;
    if (empty($nama_negara)) {
        $nama_negaraError = 'Please enter Name';
        $valkode_negara = false;
    }
    // update data
    if ($valkode_negara) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tb_negara  set nama_negara = ? WHERE kode_negara = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nama_negara, $kode_negara));
        Database::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_negara where kode_negara = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_negara));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nama_negara = $data['nama_negara'];
    Database::disconnect();
}
?>


<?php include '../../../template/header2.php' ?>
<div class="wrapper row-offcanvas">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
    <div class="right-side strech">
                <div class="content-header">
                    <h1>
                        Update Data
                        <small>Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i>Master Data</a></li>
                        <li class="active">Update Data</li>
                    </ol>
                </div>
            </div>
			<br>
			<!-- Main content -->
            <section class="content well" style="background-color: #fff">

        <form class="form-horizontal" action="update.php?kode_negara=<?php echo $kode_negara ?>" method="post">
            <div class="control-group <?php echo!empty($nama_negaraError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nama_negara" type="text"  placeholder="nama_negara" value="<?php echo!empty($nama_negara) ? $nama_negara : ''; ?>">
                    <?php if (!empty($nama_negaraError)): ?>
                        <span class="help-inline"><?php echo $nama_negaraError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn btn-info" href="index.php">Back</a>
            </div>
        </form>
    </section>
    </div>
</div>
</div> <!-- /container -->
<?php include '../../../template/footer2.php' ?>