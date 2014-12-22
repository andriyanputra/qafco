<?php
require 'database.php';

if (!empty($_POST)) {
    // keep track validation errors
    $jenis_dokumenError = null;
	
    // keep track post values
    $jenis_dokumen = $_POST['jenis_dokumen'];

    // validate input
    $valid = true;
    if (empty($jenis_dokumen)) {
        $jenis_dokumenError = 'Please enter Name';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tb_jenis_dokumen(jenis_dokumen) values(?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($jenis_dokumen));
        Database::disconnect();
        header("Location: index.php");
    }
}
?>


<?php include '../../../template/header2.php' ?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Create a Jenis Dokumen</h3>
        </div>

        <form class="form-horizontal" action="create.php" method="post">
            <div class="control-group <?php echo!empty($jenis_dokumenError) ? 'error' : ''; ?>">
                <label class="control-label">Jenis Dokumen</label>
                <div class="controls">
                    <input name="jenis_dokumen" type="text"  placeholder="Name" value="<?php echo!empty($jenis_dokumen) ? $jenis_dokumen : ''; ?>">
                    <?php if (!empty($jenis_dokumenError)): ?>
                        <span class="help-inline"><?php echo $jenis_dokumenError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href="index.php">Back</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
<?php include '../../../template/footer2.php' ?>