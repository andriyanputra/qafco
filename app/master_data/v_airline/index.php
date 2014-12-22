<?php include '../../../template/header2.php' ?>
<div class="container">
    <div class="row">
        <h3>Air Line</h3>
    </div>
    <div class="row">
        <p>
            <a href="create.php" class="btn btn-success">Create</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'database.php';
                $pdo = Database::connect();
                $sql = 'SELECT * FROM tb_airline ORDER BY kode_airline DESC';
                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['nama_airline'] . '</td>';
                    echo '<td width=250>';
                    echo '<a class="btn" href="read.php?kode_airline=' . $row['kode_airline'] . '">Read</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-success" href="update.php?kode_airline=' . $row['kode_airline'] . '">Update</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-danger" href="delete.php?kode_airline=' . $row['kode_airline'] . '">Delete</a>';
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