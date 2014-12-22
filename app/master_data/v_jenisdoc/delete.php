<?php
require 'database.php';
$kode_jenis_dokumen = 0;

if (!empty($_GET['kode_jenis_dokumen'])) {
    $kode_jenis_dokumen = $_REQUEST['kode_jenis_dokumen'];
}

if (!empty($_POST)) {
    // keep track post values
    $kode_jenis_dokumen = $_POST['kode_jenis_dokumen'];

    // delete data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM tb_jenis_dokumen WHERE kode_jenis_dokumen = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_jenis_dokumen));
    Database::disconnect();
    header("Location: index.php");
}
?>

<?php include '../../../template/header2.php' ?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Delete a Jenis Dokumen</h3>
        </div>

        <form class="form-horizontal" action="delete.php" method="post">
            <input type="hidden" name="kode_jenis_dokumen" value="<?php echo $kode_jenis_dokumen; ?>"/>
            <p class="alert alert-error">Are you sure to delete ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="index.php">No</a>
            </div>
        </form>
    </div>   
</div> <!-- /container -->
<?php include '../../../template/footer2.php' ?>