<?php
require 'database.php';
$kode_agen = 0;

if (!empty($_GET['kode_agen'])) {
    $kode_agen = $_REQUEST['kode_agen'];
}

if (!empty($_POST)) {
    // keep track post values
    $kode_agen = $_POST['kode_agen'];

    // delete data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM tb_agen  WHERE kode_agen = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_agen));
    Database::disconnect();
    header("Location: index.php");
}
?>

<?php include '../../template/header2.php' ?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Delete a Agen</h3>
        </div>

        <form class="form-horizontal" action="delete.php" method="post">
            <input type="hidden" name="kode_agen" value="<?php echo $kode_agen; ?>"/>
            <p class="alert alert-error">Are you sure to delete ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="index.php">No</a>
            </div>
        </form>
    </div>   
</div> <!-- /container -->
<?php include '../../template/footer2.php' ?>