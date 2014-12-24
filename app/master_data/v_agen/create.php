<?php
require 'database.php';

if (!empty($_POST)) {
    // keep track validation errors
    $nama_agenError = null;
    $alamat_agenError = null;
    $telepon_agenError = null;

    // keep track post values
    $nama_agen = $_POST['nama_agen'];
    $alamat_agen = $_POST['alamat_agen'];
    $telepon_agen = $_POST['telepon_agen'];

    // validate input
    $valid = true;
    if (empty($nama_agen)) {
        $nama_agenError = 'Please enter Name';
        $valid = false;
    }

    if (empty($alamat_agen)) {
        $alamat_agenError = 'Please enter Address';
        $valid = false;
    }

    if (empty($telepon_agen)) {
        $telepon_agenError = 'Please enter Mobile Number';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tb_agen (nama_agen,alamat_agen,telepon_agen) values(?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nama_agen, $alamat_agen, $telepon_agen));
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
            <div class="control-group <?php echo!empty($nama_agenError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nama_agen" type="text"  placeholder="Name" value="<?php echo!empty($nama_agen) ? $nama_agen : ''; ?>">
                    <?php if (!empty($nama_agenError)): ?>
                        <span class="help-inline"><?php echo $nama_agenError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($alamat_agenError) ? 'error' : ''; ?>">
                <label class="control-label">Address</label>
                <div class="controls">
                    <textarea name="alamat_agen" type="text" class="form-control" rows="3" placeholder="Address..." value="<?php echo!empty($alamat_agen) ? $alamat_agen : ''; ?>"></textarea>	
                    <?php if (!empty($alamat_agenError)): ?>
                        <span class="help-inline"><?php echo $alamat_agenError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($telepon_agenError) ? 'error' : ''; ?>">
                <label class="control-label">Mobile Number</label>
                <div class="controls">
                    <input name="telepon_agen" type="text"  placeholder="Mobile Number" value="<?php echo!empty($telepon_agen) ? $telepon_agen : ''; ?>">
                    <?php if (!empty($telepon_agenError)): ?>
                        <span class="help-inline"><?php echo $telepon_agenError; ?></span>
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