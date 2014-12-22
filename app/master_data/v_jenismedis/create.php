<?php
require 'database.php';

if (!empty($_POST)) {
    // keep track validation errors
    $nm_jenisError = null;
	
    // keep track post values
    $nm_jenis = $_POST['nm_jenis'];

    // validate input
    $valid = true;
    if (empty($nm_jenis)) {
        $nm_jenisError = 'Please enter Name';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tb_jenis_medis(nm_jenis) values(?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nm_jenis));
        Database::disconnect();
        header("Location: index.php");
    }
}
?>


<?php include '../../../template/header2.php' ?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Create a Jenis Medis</h3>
        </div>

        <form class="form-horizontal" action="create.php" method="post">
            <div class="control-group <?php echo!empty($nm_jenisError) ? 'error' : ''; ?>">
                <label class="control-label">Jenis Medis</label>
                <div class="controls">
                    <input name="nm_jenis" type="text"  placeholder="Name" value="<?php echo!empty($nm_jenis) ? $nm_jenis : ''; ?>">
                    <?php if (!empty($nm_jenisError)): ?>
                        <span class="help-inline"><?php echo $nm_jenisError; ?></span>
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