<?php
require 'database.php';

$kode_kandep = null;
if (!empty($_GET['kode_kandep'])) {
    $kode_kandep = $_REQUEST['kode_kandep'];
}

if (null == $kode_kandep) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    // keep track valkode_agenation errors
    $nama_kandepError = null;
    $kota_wilyahError = null;

    // keep track post values
    $nama_kandep = $_POST['nama_kandep'];
    $kota_wilyah = $_POST['kota_wilyah'];

    // valkode_agenate input
    $valkode_kandep = true;
    if (empty($nama_kandep)) {
        $nama_kandepError = 'Please enter Name';
        $valkode_kandep = false;
    }

    if (empty($kota_wilyah)) {
        $kota_wilyahError = 'Please enter Address';
        $valkode_kandep = false;
    }

    // update data
    if ($valkode_kandep) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tb_kandep  set nama_kandep = ?, kota_wilyah = ? WHERE kode_kandep = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nama_kandep, $kota_wilyah, $kode_kandep));
        Database::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_kandep where kode_kandep = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_kandep));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nama_kandep = $data['nama_kandep'];
    $kota_wilyah = $data['kota_wilyah'];
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

        <form class="form-horizontal" action="update.php?kode_kandep=<?php echo $kode_kandep ?>" method="post">
            <div class="control-group <?php echo!empty($nama_kandepError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nama_kandep" type="text"  placeholder="nama_kandep" value="<?php echo!empty($nama_kandep) ? $nama_kandep : ''; ?>">
                    <?php if (!empty($nama_kandepError)): ?>
                        <span class="help-inline"><?php echo $nama_kandepError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($kota_wilyahError) ? 'error' : ''; ?>">
                <label class="control-label">Address</label>
                <div class="controls">
                    <textarea name="kota_wilyah" type="text" class="form-control" rows="3" placeholder="Address..." value=""><?php echo!empty($kota_wilyah) ? $kota_wilyah : ''; ?></textarea>	
                    <?php if (!empty($kota_wilyahError)): ?>
                        <span class="help-inline"><?php echo $kota_wilyahError; ?></span>
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