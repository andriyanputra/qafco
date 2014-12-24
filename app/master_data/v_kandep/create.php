<?php
require 'database.php';

if (!empty($_POST)) {
    // keep track validation errors
    $nama_kandepError = null;
    $kota_wilyahError = null;

    // keep track post values
    $nama_kandep = $_POST['nama_kandep'];
    $kota_wilyah = $_POST['kota_wilyah'];

    // validate input
    $valid = true;
    if (empty($nama_kandep)) {
        $nama_kandepError = 'Please enter Name';
        $valid = false;
    }

    if (empty($kota_wilyah)) {
        $kota_wilyahError = 'Please enter Address';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tb_kandep (nama_kandep,kota_wilyah) values(?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nama_kandep, $kota_wilyah));
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
            <div class="control-group <?php echo!empty($nama_kandepError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nama_kandep" type="text"  placeholder="Name" value="<?php echo!empty($nama_kandep) ? $nama_kandep : ''; ?>">
                    <?php if (!empty($nama_kandepError)): ?>
                        <span class="help-inline"><?php echo $nama_kandepError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($kota_wilyahError) ? 'error' : ''; ?>">
                <label class="control-label">Kota Wilayah</label>
                <div class="controls">
                    <textarea name="kota_wilyah" type="text" class="form-control" rows="3" placeholder="Address..." value="<?php echo!empty($kota_wilyah) ? $kota_wilyah : ''; ?>"></textarea>	
                    <?php if (!empty($kota_wilyahError)): ?>
                        <span class="help-inline"><?php echo $kota_wilyahError; ?></span>
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