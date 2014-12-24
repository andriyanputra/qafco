<?php
require 'database.php';

if (!empty($_POST)) {
    // keep track validation errors
    $nm_sponsorError = null;
    $almt_sponsorError = null;

    // keep track post values
    $nm_sponsor = $_POST['nm_sponsor'];
    $almt_sponsor = $_POST['almt_sponsor'];

    // validate input
    $valid = true;
    if (empty($nm_sponsor)) {
        $nm_sponsorError = 'Please enter Name';
        $valid = false;
    }

    if (empty($almt_sponsor)) {
        $almt_sponsorError = 'Please enter Address';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tb_koordinator_sponsor (nm_sponsor,almt_sponsor) values(?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nm_sponsor, $almt_sponsor));
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
            <div class="control-group <?php echo!empty($nm_sponsorError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nm_sponsor" type="text"  placeholder="Name" value="<?php echo!empty($nm_sponsor) ? $nm_sponsor : ''; ?>">
                    <?php if (!empty($nm_sponsorError)): ?>
                        <span class="help-inline"><?php echo $nm_sponsorError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($almt_sponsorError) ? 'error' : ''; ?>">
                <label class="control-label">Address</label>
                <div class="controls">
                    <textarea name="almt_sponsor" type="text" class="form-control" rows="3" placeholder="Address..." value="<?php echo!empty($almt_sponsor) ? $almt_sponsor : ''; ?>"></textarea>	
                    <?php if (!empty($almt_sponsorError)): ?>
                        <span class="help-inline"><?php echo $almt_sponsorError; ?></span>
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