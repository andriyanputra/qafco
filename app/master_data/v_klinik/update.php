<?php
require 'database.php';

$kode_klinik = null;
if (!empty($_GET['kode_klinik'])) {
    $kode_klinik = $_REQUEST['kode_klinik'];
}

if (null == $kode_klinik) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    // keep track valkode_klinikation errors
    $nama_klinikError = null;
    $alamat_klinikError = null;
    $telepon_klinikError = null;

    // keep track post values
    $nama_klinik = $_POST['nama_klinik'];
    $alamat_klinik = $_POST['alamat_klinik'];
    $telepon_klinik = $_POST['telepon_klinik'];

    // valkode_klinikate input
    $valkode_klinik = true;
    if (empty($nama_klinik)) {
        $nama_klinikError = 'Please enter Name';
        $valkode_klinik = false;
    }

    if (empty($alamat_klinik)) {
        $alamat_klinikError = 'Please enter Address';
        $valkode_klinik = false;
    }

    if (empty($telepon_klinik)) {
        $telepon_klinikError = 'Please enter Mobile Number';
        $valkode_klinik = false;
    }

    // update data
    if ($valkode_klinik) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tb_klinik  set nama_klinik = ?, alamat_klinik = ?, telepon_klinik =? WHERE kode_klinik = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nama_klinik, $alamat_klinik, $telepon_klinik, $kode_klinik));
        Database::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_klinik where kode_klinik = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_klinik));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nama_klinik = $data['nama_klinik'];
    $alamat_klinik = $data['alamat_klinik'];
    $telepon_klinik = $data['telepon_klinik'];
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

        <form class="form-horizontal" action="update.php?kode_klinik=<?php echo $kode_klinik ?>" method="post">
            <div class="control-group <?php echo!empty($nama_klinikError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nama_klinik" type="text"  placeholder="nama_klinik" value="<?php echo!empty($nama_klinik) ? $nama_klinik : ''; ?>">
                    <?php if (!empty($nama_klinikError)): ?>
                        <span class="help-inline"><?php echo $nama_klinikError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($alamat_klinikError) ? 'error' : ''; ?>">
                <label class="control-label">Address</label>
                <div class="controls">
                    <textarea name="alamat_klinik" type="text" class="form-control" rows="3" placeholder="Address..." value=""><?php echo!empty($alamat_klinik) ? $alamat_klinik : ''; ?></textarea>	
                    <?php if (!empty($alamat_klinikError)): ?>
                        <span class="help-inline"><?php echo $alamat_klinikError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($telepon_klinikError) ? 'error' : ''; ?>">
                <label class="control-label">Mobile Number</label>
                <div class="controls">
                    <input name="telepon_klinik" type="text"  placeholder="Mobile Number" value="<?php echo!empty($telepon_klinik) ? $telepon_klinik : ''; ?>">
                    <?php if (!empty($telepon_klinikError)): ?>
                        <span class="help-inline"><?php echo $telepon_klinikError; ?></span>
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