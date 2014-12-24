<?php
require 'database.php';
$kode_negara = null;
if (!empty($_GET['kode_negara'])) {
    $kode_negara = $_REQUEST['kode_negara'];
}

if (null == $kode_negara) {
    header("Location: index.php");
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_negara where kode_negara = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_negara));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}
?>

<?php include '../../../template/header2.php' ?>
<div class="wrapper row-offcanvas">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
    <div class="right-side strech">
                <div class="content-header">
                    <h1>
                        Read Data
                        <small>Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i>Master Data</a></li>
                        <li class="active">Read Data</li>
                    </ol>
                </div>
            </div>
			<br>
			<!-- Main content -->
            <section class="content well" style="background-color: #fff">

        <div class="form-horizontal well" >
            <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['nama_negara']; ?>
                    </label>
                </div>
            </div>
            <div class="form-actions">
                <a class="btn btn-info" href="index.php">Back</a>
            </div>


        </div>
    </section>
    </div>

</div> <!-- /container -->
</div>
<?php include '../../../template/footer2.php' ?>