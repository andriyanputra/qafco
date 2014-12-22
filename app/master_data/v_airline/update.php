<?php
require 'database.php';

$kode_airline = null;
if (!empty($_GET['kode_airline'])) {
    $kode_airline = $_REQUEST['kode_airline'];
}

if (null == $kode_airline) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    // keep track valkode_airlineation errors
    $nama_airlineError = null;

    // keep track post values
    $nama_airline = $_POST['nama_airline'];

    // valkode_airlineate input
    $valkode_airline = true;
    if (empty($nama_airline)) {
        $nama_airlineError = 'Please enter Name';
        $valkode_airline = false;
    }
    // update data
    if ($valkode_airline) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tb_airline  set nama_airline = ? WHERE kode_airline = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nama_airline, $kode_airline));
        Database::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_airline where kode_airline = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_airline));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nama_airline = $data['nama_airline'];
    Database::disconnect();
}
?>


<?php include '../../../template/header2.php' ?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Update a Airline</h3>
        </div>

        <form class="form-horizontal" action="update.php?kode_airline=<?php echo $kode_airline ?>" method="post">
            <div class="control-group <?php echo!empty($nama_airlineError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nama_airline" type="text"  placeholder="nama_airline" value="<?php echo!empty($nama_airline) ? $nama_airline : ''; ?>">
                    <?php if (!empty($nama_airlineError)): ?>
                        <span class="help-inline"><?php echo $nama_airlineError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn" href="index.php">Back</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
<?php include '../../../template/footer2.php' ?>