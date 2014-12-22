<?php
require 'database.php';
$kode_asuransi = 0;

if (!empty($_GET['kode_asuransi'])) {
    $kode_asuransi = $_REQUEST['kode_asuransi'];
}

if (!empty($_POST)) {
    // keep track post values
    $kode_asuransi = $_POST['kode_asuransi'];

    // delete data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM tb_asuransi  WHERE kode_asuransi = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_asuransi));
    Database::disconnect();
    header("Location: index.php");
}
?>

<?php include '../../../template/header2.php' ?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Delete a Asuransi</h3>
        </div>

        <form class="form-horizontal" action="delete.php" method="post">
            <input type="hidden" name="kode_asuransi" value="<?php echo $kode_asuransi; ?>"/>
            <p class="alert alert-error">Are you sure to delete ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="index.php">No</a>
            </div>
        </form>
    </div>   
</div> <!-- /container -->
<?php include '../../../template/footer2.php' ?>