<?php
require 'database.php';
$kode_jenis_medis = 0;

if (!empty($_GET['kode_jenis_medis'])) {
    $kode_jenis_medis = $_REQUEST['kode_jenis_medis'];
}

if (!empty($_POST)) {
    // keep track post values
    $kode_jenis_medis = $_POST['kode_jenis_medis'];

    // delete data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM tb_jenis_medis WHERE kode_jenis_medis = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_jenis_medis));
    Database::disconnect();
    header("Location: index.php");
}
?>

<?php include '../../../template/header2.php' ?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Delete a Jenis Medis</h3>
        </div>

        <form class="form-horizontal" action="delete.php" method="post">
            <input type="hidden" name="kode_jenis_medis" value="<?php echo $kode_jenis_medis; ?>"/>
            <p class="alert alert-error">Are you sure to delete ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="index.php">No</a>
            </div>
        </form>
    </div>   
</div> <!-- /container -->
<?php include '../../../template/footer2.php' ?>