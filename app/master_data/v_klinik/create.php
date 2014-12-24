<?php
require 'database.php';

if (!empty($_POST)) {
    // keep track validation errors
    $nama_klinikError = null;
    $alamat_klinikError = null;
    $telepon_klinikError = null;

    // keep track post values
    $nama_klinik = $_POST['nama_klinik'];
    $alamat_klinik = $_POST['alamat_klinik'];
    $telepon_klinik = $_POST['telepon_klinik'];

    // validate input
    $valid = true;
    if (empty($nama_klinik)) {
        $nama_klinikError = 'Please enter Name';
        $valid = false;
    }

    if (empty($alamat_klinik)) {
        $alamat_klinikError = 'Please enter Address';
        $valid = false;
    }

    if (empty($telepon_klinik)) {
        $telepon_klinikError = 'Please enter Mobile Number';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tb_klinik (nama_klinik,alamat_klinik,telepon_klinik) values(?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nama_klinik, $alamat_klinik, $telepon_klinik));
        Database::disconnect();
        header("Location: index.php");
    }
}
?>


<?php include '../../../template/header2.php' ?>
<div class="wrapper row-offcanvas">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
    <div class="right-side strech">
                <div class="content-header">
                    <h1>
                        Create Data
                        <small>Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i>Master Data</a></li>
                        <li class="active">Create Data</li>
                    </ol>
                </div>
            </div>
			<br>
			<!-- Main content -->
            <section class="content well" style="background-color: #fff">

        <form class="form-horizontal" action="create.php" method="post">
            <div class="control-group <?php echo!empty($nama_klinikError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nama_klinik" type="text"  placeholder="Name" value="<?php echo!empty($nama_klinik) ? $nama_klinik : ''; ?>">
                    <?php if (!empty($nama_klinikError)): ?>
                        <span class="help-inline"><?php echo $nama_klinikError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($alamat_klinikError) ? 'error' : ''; ?>">
                <label class="control-label">Address</label>
                <div class="controls">
                    <textarea name="alamat_klinik" type="text" class="form-control" rows="3" placeholder="Address..." value="<?php echo!empty($alamat_klinik) ? $alamat_klinik : ''; ?>"></textarea>	
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
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn btn-info" href="index.php">Back</a>
            </div>
        </form>
		</section>
    </div>

</div> <!-- /container -->
</div>
<?php include '../../../template/footer2.php' ?>