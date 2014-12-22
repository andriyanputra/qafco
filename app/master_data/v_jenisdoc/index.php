<?php include '../../../template/header2.php' ?>
<div class="container">
    <div class="row">
        <h3>Jenis Dokumen</h3>
    </div>
    <div class="row">
        <p>
            <a href="create.php" class="btn btn-success">Create</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Jenis Dokumen</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'database.php';
                $pdo = Database::connect();
                $sql = 'SELECT * FROM tb_jenis_dokumen ORDER BY kode_jenis_dokumen DESC';
                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['nama_asuransi'] . '</td>';
                    echo '<td width=250>';
                    echo '<a class="btn" href="read.php?kode_jenis_dokumen=' . $row['kode_jenis_dokumen'] . '">Read</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-success" href="update.php?kode_jenis_dokumen=' . $row['kode_jenis_dokumen'] . '">Update</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-danger" href="delete.php?kode_jenis_dokumen=' . $row['kode_jenis_dokumen'] . '">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                Database::disconnect();
                ?>
            </tbody>
        </table>
        <div class="form-actions">
            <a class="btn btn-success" href="../index.php">Back</a>
        </div>
    </div>
</div> <!-- /container -->
<?php include '../../../template/footer2.php' ?>