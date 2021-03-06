<?php
require 'database.php';

if (!empty($_POST)) {
    // keep track validation errors
    $nama_blkError = null;
    $alamat_blkError = null;
    $telp_blkError = null;

    // keep track post values
    $nama_blk = $_POST['nama_blk'];
    $alamat_blk = $_POST['alamat_blk'];
    $telp_blk = $_POST['telp_blk'];

    // validate input
    $valid = true;
    if (empty($nama_blk)) {
        $nama_blkError = 'Please enter Name';
        $valid = false;
    }

    if (empty($alamat_blk)) {
        $alamat_blkError = 'Please enter Address';
        $valid = false;
    }

    if (empty($telp_blk)) {
        $telp_blkError = 'Please enter Mobile Number';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tb_blkn (nama_blk,alamat_blk,telp_blk) values(?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nama_blk, $alamat_blk, $telp_blk));
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
            <div class="control-group <?php echo!empty($nama_blkError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nama_blk" type="text"  placeholder="Name" value="<?php echo!empty($nama_blk) ? $nama_blk : ''; ?>">
                    <?php if (!empty($nama_blkError)): ?>
                        <span class="help-inline"><?php echo $nama_blkError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($alamat_blkError) ? 'error' : ''; ?>">
                <label class="control-label">Address</label>
                <div class="controls">
                    <textarea name="alamat_blk" type="text" class="form-control" rows="3" placeholder="Address..." value="<?php echo!empty($alamat_blk) ? $alamat_blk : ''; ?>"></textarea>	
                    <?php if (!empty($alamat_blkError)): ?>
                        <span class="help-inline"><?php echo $alamat_blkError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($telp_blkError) ? 'error' : ''; ?>">
                <label class="control-label">Mobile Number</label>
                <div class="controls">
                    <input name="telp_blk" type="text"  placeholder="Mobile Number" value="<?php echo!empty($telp_blk) ? $telp_blk : ''; ?>">
                    <?php if (!empty($telp_blkError)): ?>
                        <span class="help-inline"><?php echo $telp_blkError; ?></span>
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