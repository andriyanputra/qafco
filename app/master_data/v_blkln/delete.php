<?php
require 'database.php';
$kode_blk = 0;

if (!empty($_GET['kode_blk'])) {
    $kode_blk = $_REQUEST['kode_blk'];
}

if (!empty($_POST)) {
    // keep track post values
    $kode_blk = $_POST['kode_blk'];

    // delete data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM tb_blkn  WHERE kode_blk = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_blk));
    Database::disconnect();
    header("Location: index.php");
}
?>

<?php include '../../../template/header2.php' ?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Delete a Balai Latihan Kerja Luar Negeri</h3>
        </div>

        <form class="form-horizontal" action="delete.php" method="post">
            <input type="hidden" name="kode_blk" value="<?php echo $kode_blk; ?>"/>
            <p class="alert alert-error">Are you sure to delete ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="index.php">No</a>
            </div>
        </form>
    </div>   
</div> <!-- /container -->
<?php include '../../../template/footer2.php' ?>