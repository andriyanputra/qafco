<?php
require 'database.php';

if (!empty($_POST)) {
    // keep track validation errors
    $nama_asuransiError = null;
	
    // keep track post values
    $nama_asuransi = $_POST['nama_asuransi'];

    // validate input
    $valid = true;
    if (empty($nama_asuransi)) {
        $nama_asuransiError = 'Please enter Name';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tb_asuransi(nama_asuransi) values(?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nama_asuransi));
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
            <div class="control-group <?php echo!empty($nama_asuransiError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nama_asuransi" type="text"  placeholder="Name" value="<?php echo!empty($nama_asuransi) ? $nama_asuransi : ''; ?>">
                    <?php if (!empty($nama_asuransiError)): ?>
                        <span class="help-inline"><?php echo $nama_asuransiError; ?></span>
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