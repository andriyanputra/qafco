<?php
require 'database.php';

$koord_sponsor = null;
if (!empty($_GET['koord_sponsor'])) {
    $koord_sponsor = $_REQUEST['koord_sponsor'];
}

if (null == $koord_sponsor) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    // keep track valkode_agenation errors
    $nm_sponsorError = null;
    $almt_sponsorError = null;

    // keep track post values
    $nm_sponsor = $_POST['nm_sponsor'];
    $almt_sponsor = $_POST['almt_sponsor'];

    // valkode_agenate input
    $valkoord_sponsor = true;
    if (empty($nm_sponsor)) {
        $nm_sponsorError = 'Please enter Name';
        $valkoord_sponsor = false;
    }

    if (empty($almt_sponsor)) {
        $almt_sponsorError = 'Please enter Address';
        $valkoord_sponsor = false;
    }

    // update data
    if ($valkoord_sponsor) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tb_koordinator_sponsor  set nm_sponsor = ?, almt_sponsor = ? WHERE koord_sponsor = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nm_sponsor, $almt_sponsor, $koord_sponsor));
        Database::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_koordinator_sponsor where koord_sponsor = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($koord_sponsor));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nm_sponsor = $data['nm_sponsor'];
    $almt_sponsor = $data['almt_sponsor'];
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

        <form class="form-horizontal" action="update.php?koord_sponsor=<?php echo $koord_sponsor ?>" method="post">
            <div class="control-group <?php echo!empty($nm_sponsorError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nm_sponsor" type="text"  placeholder="nm_sponsor" value="<?php echo!empty($nm_sponsor) ? $nm_sponsor : ''; ?>">
                    <?php if (!empty($nm_sponsorError)): ?>
                        <span class="help-inline"><?php echo $nm_sponsorError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo!empty($almt_sponsorError) ? 'error' : ''; ?>">
                <label class="control-label">Address</label>
                <div class="controls">
                    <textarea name="almt_sponsor" type="text" class="form-control" rows="3" placeholder="Address..." value=""><?php echo!empty($almt_sponsor) ? $almt_sponsor : ''; ?></textarea>	
                    <?php if (!empty($almt_sponsorError)): ?>
                        <span class="help-inline"><?php echo $almt_sponsorError; ?></span>
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