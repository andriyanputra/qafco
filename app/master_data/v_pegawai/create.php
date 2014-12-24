<?php
require 'database.php';

if (!empty($_POST)) {
    // keep track validation errors
    $nm_pegawaiError = null;
    $alamat_pegawaiError = null;
    $telp_pegawaiError = null;
	$email_pegawaiError = null;

    // keep track post values
    $nm_pegawai = $_POST['nm_pegawai'];
    $alamat_pegawai = $_POST['alamat_pegawai'];
    $telp_pegawai = $_POST['telp_pegawai'];
	$email_pegawai = $_POST['email_pegawai'];

    // validate input
    $valid = true;
    if (empty($nm_pegawai)) {
        $nm_pegawaiError = 'Please enter Name';
        $valid = false;
    }

    if (empty($alamat_pegawai)) {
        $alamat_pegawaiError = 'Please enter Address';
        $valid = false;
    }

    if (empty($telp_pegawai)) {
        $telp_pegawaiError = 'Please enter Mobile Number';
        $valid = false;
    }
	
	if (empty($email_pegawai)) {
		$email_pegawaiError = 'Please enter Email Address';
		$valid = false;
		} else if ( !filter_var($email_pegawai,FILTER_VALIDATE_EMAIL) ) {
			$email_pegawaiError = 'Please enter a valid Email Address';
			$valid = false;
		}

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tb_pegawai (nm_pegawai,alamat_pegawai,telp_pegawai,email_pegawai) values(?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nm_pegawai, $alamat_pegawai, $telp_pegawai, $email_pegawai));
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
            <div class="control-group <?php echo!empty($nm_pegawaiError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nm_pegawai" type="text"  placeholder="Name" value="<?php echo!empty($nm_pegawai) ? $nm_pegawai : ''; ?>">
                    <?php if (!empty($nm_pegawaiError)): ?>
                        <span class="help-inline"><?php echo $nm_pegawaiError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($alamat_pegawaiError) ? 'error' : ''; ?>">
                <label class="control-label">Address</label>
                <div class="controls">
                    <textarea name="alamat_pegawai" type="text" class="form-control" rows="3" placeholder="Address..." value="<?php echo!empty($alamat_pegawai) ? $alamat_pegawai : ''; ?>"></textarea>	
                    <?php if (!empty($alamat_pegawaiError)): ?>
                        <span class="help-inline"><?php echo $alamat_pegawaiError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($telp_pegawaiError) ? 'error' : ''; ?>">
                <label class="control-label">Mobile Number</label>
                <div class="controls">
                    <input name="telp_pegawai" type="text"  placeholder="Mobile Number" value="<?php echo!empty($telp_pegawai) ? $telp_pegawai : ''; ?>">
                    <?php if (!empty($telp_pegawaiError)): ?>
                        <span class="help-inline"><?php echo $telp_pegawaiError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
			<div class="control-group <?php echo !empty($email_pegawaiError)?'error':'';?>">
					    <label class="control-label">Email Address</label>
					    <div class="controls">
					      	<input name="email_pegawai" type="text" placeholder="Email Address" value="<?php echo !empty($email_pegawai)?$email_pegawai:'';?>">
					      	<?php if (!empty($email_pegawaiError)): ?>
					      		<span class="help-inline"><?php echo $email_pegawaiError;?></span>
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