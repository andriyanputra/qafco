<?php
require 'database.php';

if (!empty($_POST)) {
    // keep track validation errors
    $nama_majikaError = null;
    $telepon_majikanError = null;
    $alamat_majikanError = null;
	$pekerjaan_majikanError = null;

    // keep track post values
    $nama_majika = $_POST['nama_majika'];
    $telepon_majikan = $_POST['telepon_majikan'];
    $alamat_majikan = $_POST['alamat_majikan'];
	$pekerjaan_majikan = $_POST['pekerjaan_majikan'];

    // validate input
    $valid = true;
    if (empty($nama_majika)) {
        $nama_majikaError = 'Please enter Name';
        $valid = false;
    }

    if (empty($telepon_majikan)) {
        $telepon_majikanError = 'Please enter Mobile Number';
        $valid = false;
    }

    if (empty($alamat_majikan)) {
        $alamat_majikanError = 'Please enter Address';
        $valid = false;
    }
	
	if (empty($pekerjaan_majikan)) {
		$pekerjaan_majikanError = 'Please enter Jobs';
		$valid = false;
	} 

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tb_majikan (nama_majika,telepon_majikan,alamat_majikan,pekerjaan_majikan) values(?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nama_majika, $telepon_majikan, $alamat_majikan, $pekerjaan_majikan));
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
            <div class="control-group <?php echo!empty($nama_majikaError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nama_majika" type="text"  placeholder="Name" value="<?php echo!empty($nama_majika) ? $nama_majika : ''; ?>">
                    <?php if (!empty($nama_majikaError)): ?>
                        <span class="help-inline"><?php echo $nama_majikaError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
			<div class="control-group <?php echo!empty($telepon_majikanError) ? 'error' : ''; ?>">
                <label class="control-label">Mobile Number</label>
                <div class="controls">
                    <input name="telepon_majikan" type="text"  placeholder="Mobile Number" value="<?php echo!empty($telepon_majikan) ? $telepon_majikan : ''; ?>">
                    <?php if (!empty($telepon_majikanError)): ?>
                        <span class="help-inline"><?php echo $telepon_majikanError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($alamat_majikanError) ? 'error' : ''; ?>">
                <label class="control-label">Address</label>
                <div class="controls">
                    <textarea name="alamat_majikan" type="text" class="form-control" rows="3" placeholder="Address..." value="<?php echo!empty($alamat_majikan) ? $alamat_majikan : ''; ?>"></textarea>	
                    <?php if (!empty($alamat_majikanError)): ?>
                        <span class="help-inline"><?php echo $alamat_majikanError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            
			<div class="control-group <?php echo !empty($pekerjaan_majikanError)?'error':'';?>">
					    <label class="control-label">Employer Jobs</label>
					    <div class="controls">
					      	<input name="pekerjaan_majikan" type="text" placeholder="Employer Jobs" value="<?php echo !empty($pekerjaan_majikan)?$pekerjaan_majikan:'';?>">
					      	<?php if (!empty($pekerjaan_majikanError)): ?>
					      		<span class="help-inline"><?php echo $pekerjaan_majikanError;?></span>
					      	<?php endif;?>
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