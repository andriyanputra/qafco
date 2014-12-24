<?php
require 'database.php';

$kode_pekerjaan = null;
if (!empty($_GET['kode_pekerjaan'])) {
    $kode_pekerjaan = $_REQUEST['kode_pekerjaan'];
}

if (null == $kode_pekerjaan) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    // keep track valkode_pekerjaanation errors
    $nama_pekerjaanError = null;

    // keep track post values
    $nama_pekerjaan = $_POST['nama_pekerjaan'];

    // valkode_pekerjaanate input
    $valkode_pekerjaan = true;
    if (empty($nama_pekerjaan)) {
        $nama_pekerjaanError = 'Please enter Name';
        $valkode_pekerjaan = false;
    }
    // update data
    if ($valkode_pekerjaan) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tb_pekerjaan  set nama_pekerjaan = ? WHERE kode_pekerjaan = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nama_pekerjaan, $kode_pekerjaan));
        Database::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_pekerjaan where kode_pekerjaan = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_pekerjaan));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nama_airline = $data['nama_pekerjaan'];
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

        <form class="form-horizontal" action="update.php?kode_pekerjaan=<?php echo $kode_pekerjaan ?>" method="post">
            <div class="control-group <?php echo!empty($nama_pekerjaanError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nama_pekerjaan" type="text"  placeholder="nama_pekerjaan" value="<?php echo!empty($nama_pekerjaan) ? $nama_pekerjaan : ''; ?>">
                    <?php if (!empty($nama_pekerjaanError)): ?>
                        <span class="help-inline"><?php echo $nama_pekerjaanError; ?></span>
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