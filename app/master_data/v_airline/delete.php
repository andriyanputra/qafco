<?php
require 'database.php';
$kode_airline = 0;

if (!empty($_GET['kode_airline'])) {
    $kode_airline = $_REQUEST['kode_airline'];
}

if (!empty($_POST)) {
    // keep track post values
    $kode_airline = $_POST['kode_airline'];

    // delete data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM tb_airline  WHERE kode_airline = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_airline));
    Database::disconnect();
    header("Location: index.php");
}
?>

<?php include '../../../template/header2.php' ?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Delete a Agen</h3>
        </div>

        <form class="form-horizontal" action="delete.php" method="post">
            <input type="hidden" name="kode_airline" value="<?php echo $kode_airline; ?>"/>
            <p class="alert alert-error">Are you sure to delete ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="index.php">No</a>
            </div>
        </form>
    </div>   
</div> <!-- /container -->
<?php include '../../../template/footer2.php' ?>