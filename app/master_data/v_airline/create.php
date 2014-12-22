<?php
require 'database.php';

if (!empty($_POST)) {
    // keep track validation errors
    $nama_airlineError = null;
	
    // keep track post values
    $nama_airline = $_POST['nama_airline'];

    // validate input
    $valid = true;
    if (empty($nama_airline)) {
        $nama_airlineError = 'Please enter Name';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tb_airline(nama_airline) values(?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nama_airline));
        Database::disconnect();
        header("Location: index.php");
    }
}
?>


<?php include '../../../template/header2.php' ?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Create a Air Line</h3>
        </div>

        <form class="form-horizontal" action="create.php" method="post">
            <div class="control-group <?php echo!empty($nama_airlineError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nama_airline" type="text"  placeholder="Name" value="<?php echo!empty($nama_airline) ? $nama_airline : ''; ?>">
                    <?php if (!empty($nama_airlineError)): ?>
                        <span class="help-inline"><?php echo $nama_airlineError; ?></span>
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