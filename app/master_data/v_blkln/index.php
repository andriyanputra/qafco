<?php include '../../../template/header2.php' ?>
<div class="container">
    <div class="row">
        <h3>Balai Latihan Kerja Luar Negeri</h3>
    </div>
    <div class="row">
        <p>
            <a href="create.php" class="btn btn-success">Create</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'database.php';
                $pdo = Database::connect();
                $sql = 'SELECT * FROM tb_blkn ORDER BY kode_blk DESC';
                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['nama_blk'] . '</td>';
                    echo '<td>' . $row['alamat_blk'] . '</td>';
                    echo '<td>' . $row['telp_blk'] . '</td>';
                    echo '<td width=250>';
                    echo '<a class="btn" href="read.php?kode_blk=' . $row['kode_blk'] . '">Read</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-success" href="update.php?kode_blk=' . $row['kode_blk'] . '">Update</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-danger" href="delete.php?kode_blk=' . $row['kode_blk'] . '">Delete</a>';
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