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
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Create a Asuransi</h3>
        </div>

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
                <a class="btn" href="index.php">Back</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
<?php include '../../../template/footer2.php' ?>