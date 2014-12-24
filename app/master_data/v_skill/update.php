<?php
require 'database.php';

$kode_airline = null;
if (!empty($_GET['kode_skill'])) {
    $kode_skill = $_REQUEST['kode_skill'];
}

if (null == $kode_skill) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    // keep track valkode_airlineation errors
    $nama_skillError = null;

    // keep track post values
    $nama_skill = $_POST['nama_skill'];

    // valkode_airlineate input
    $valkode_skill = true;
    if (empty($nama_skill)) {
        $nama_skillError = 'Please enter Name';
        $valkode_skill = false;
    }
    // update data
    if ($valkode_skill) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tb_skill  set nama_skill = ? WHERE kode_skill = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nama_skill, $kode_skill));
        Database::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_skill where kode_skill = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($kode_skill));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nama_skill = $data['nama_skill'];
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
                        Update Data
                        <small>Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i>Master Data</a></li>
                        <li class="active">Update Data</li>
                    </ol>
                </div>
            </div>
			<br>
			<!-- Main content -->
            <section class="content well" style="background-color: #fff">

        <form class="form-horizontal" action="update.php?kode_skill=<?php echo $kode_skill ?>" method="post">
            <div class="control-group <?php echo!empty($nama_skillError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input name="nama_skill" type="text"  placeholder="nama_skill" value="<?php echo!empty($nama_skill) ? $nama_skill : ''; ?>">
                    <?php if (!empty($nama_skillError)): ?>
                        <span class="help-inline"><?php echo $nama_skillError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn btn-info" href="index.php">Back</a>
            </div>
        </form>
    </section>
    </div>
</div>
</div> <!-- /container -->
<?php include '../../../template/footer2.php' ?>