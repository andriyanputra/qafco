<?php include '../../../template/header2.php' ?>
<div class="wrapper row-offcanvas">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
    <div class="right-side strech">
                <div class="content-header">
                    <h1>
                        Master Data
                        <small>Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../../index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                        <li><a href="#">Master Data</a></li>
                        <li class="active">Data Pegawai</li>
                    </ol>
                </div>
            </div>
			<br>
			<!-- Main content -->
            <section class="content well" style="background-color: #fff">
    <div class="row">
        <p>
            <a href="create.php" class="btn btn-success">Create</a>
        </p>
		<div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">PEGAWAI</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped display" >
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Mobile Number</th>
												<th>Email Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											include 'database.php';
											$pdo = Database::connect();
											$sql = 'SELECT * FROM tb_pegawai ORDER BY kode_pegawai ASC';
											foreach ($pdo->query($sql) as $row) {
												echo '<tr>';
												echo '<td>' . $row['nm_pegawai'] . '</td>';
												echo '<td>' . $row['alamat_pegawai'] . '</td>';
												echo '<td>' . $row['telp_pegawai'] . '</td>';
												echo '<td>' . $row['email_pegawai'] . '</td>';
												echo '<td width=250>';
												echo '<a class="btn" href="read.php?kode_pegawai=' . $row['kode_pegawai'] . '">Read</a>';
												echo '&nbsp;';
												echo '<a class="btn btn-success" href="update.php?kode_pegawai=' . $row['kode_pegawai'] . '">Update</a>';
												echo '&nbsp;';
												echo '<a class="btn btn-danger" href="delete.php?kode_pegawai=' . $row['kode_pegawai'] . '">Delete</a>';
												echo '</td>';
												echo '</tr>';
											}
											Database::disconnect();
											?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Mobile Number</th>
												<th>Email Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
		
		
        <div class="form-actions">
            <a class="btn btn-info" href="../index.php">Back</a>
        </div>
    </div>
	</section>
	</div>
	</div>
</div> <!-- /container -->
<?php include '../../../template/footer2.php' ?>