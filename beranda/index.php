<?php
    include '../config/connection.php';
    if ((isset($_SESSION['user']) && isset($_SESSION['level'])) || (isset($_COOKIE['level']) && isset($_COOKIE['user']))) {
        $cek_login = $db->query("SELECT * FROM tb_user FROM tb_pegawai AS a INNER JOIN tb_user  AS b ON (a.kode_pegawai = b.kode_pegawai)
                            WHERE (username = '". $_SESSION['user']."' AND kode_level_akses = '".$_SESSION['level']."') OR 
                            (username = '".$_COOKIE['user']."' AND kode_level_akses = '".$_COOKIE['level']."')") or die("Query : ".mysql_error());
        /*$cek_login = mysql_query("SELECT * FROM tb_user FROM tb_pegawai AS a INNER JOIN tb_user  AS b ON (a.kode_pegawai = b.kode_pegawai)
                            WHERE (username = '". $_SESSION['user']."' AND kode_level_akses = '".$_SESSION['level']."') OR 
                            (username = '".$_COOKIE['user']."' AND kode_level_akses = '".$_COOKIE['level']."')") or die("Query : ".mysql_error());*/
        if ($cek_login == false) {
            header('Location: ../index?msg=err_1');
            exit();
        }else if($cek_login->num_rows){
            $row = $cek_login->fetch_assoc();

    include '../template/header.php'; 
?>
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                PT. QAFCO
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $row['nm_pegawai']; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $row['nm_pegawai']; ?> - Staff PT. Qafco
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <!-- Content Header (Page header) -->
                    <div class="right-side strech">
                        <div class="content-header">
                            <h1>
                                Dashboard
                                <small>Control panel</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                    <br>    
                    <div class="row">
                        <div class="col-md-3">
                            <form action="#" class="text-right">
                                <div class="input-group">                                                            
                                    <input type="text" class="form-control input-sm" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button type="submit" name="q" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>                                                     
                            </form>
                        </div>
                        <div class="col-md-9">
                            <div class="pull-right">
                                <script>
                                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                                    var date = new Date();
                                    var day = date.getDate();
                                    var month = date.getMonth();
                                    var thisDay = date.getDay(),
                                            thisDay = myDays[thisDay];
                                    var yy = date.getYear();
                                    var year = (yy < 1000) ? yy + 1900 : yy;
                                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                </script>
                                , Pukul <span id="clock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-1">
                             <?php
                                if (isset($_GET['msg'])) {
                                    if ($_GET['msg'] == 'log_in') {
                                        ?>
                                <div class="alert alert-success alert-dismissable">
                                    <i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Selamat datang,</b>
                                    <?php echo $row['nm_pegawai']; ?>
                                </div>
                                <?php }} ?>
                                <div class="col-lg-3 col-md-3 ">
                                    <!-- small box -->
                                    <div class="small-box bg-red">
                                        <div class="inner">
                                            <h3>
                                                <i class="fa fa-male"></i>
                                            </h3>
                                            <p>
                                                Data TKI
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="../biodata/index" class="small-box-footer">
                                            Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div><!-- ./col -->
                                <div class="col-lg-3 col-md-3 ">
                                        <!-- small box -->
                                        <div class="small-box bg-aqua">
                                            <div class="inner">
                                                <h3>
                                                    <i class="fa fa-money"></i>
                                                </h3>
                                                <p>
                                                    Keuangan
                                                </p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">
                                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                </div><!-- ./col -->
                                <div class="col-lg-3 col-md-3 ">
                                    <!-- small box -->
                                    <div class="small-box bg-green">
                                        <div class="inner">
                                            <h3>
                                                <i class="fa fa-bar-chart-o"></i>
                                            </h3>
                                            <p>
                                                Laporan
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">
                                            Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div><!-- ./col -->
                                <div class="col-lg-3 col-md-3 ">
                                    <!-- small box -->
                                    <div class="small-box bg-maroon">
                                        <div class="inner">
                                            <h3>
                                                <i class="fa fa-folder-open-o"></i>
                                            </h3>
                                            <p>
                                                Data Master
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-hdd-o"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">
                                            Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div><!-- ./col -->
                            </div>
                        </div><!-- /.row -->

                        <!-- top row -->
                        <div class="row">
                            <div class="col-xs-12 connectedSortable">
                            </div><!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Main row -->
                        <div class="row">

                        </div><!-- /.row (main row) -->
                    </section><!-- /.content -->
                </div>
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="box">
                        <div class="col-md-6">
                            
                            <div class="box-body">
                                <dl>
                                    <dt>Kontak</dt>
                                    <dd>A description list is perfect for defining terms.</dd>
                                    <dd>Euismod</dd>
                                    <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                                    <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                    <dd>Malesuada porta</dd>
                                    <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                </dl>
                            </div><!-- /.box-body -->
                        </div><!-- ./col-md-6 -->
                    
                        <div class="col-md-6">
                            
                            <div class="box-body">
                                <dl>
                                    <dt>Lokasi</dt>
                                    <dd>A description list is perfect for defining terms.</dd>
                                    <dd>Euismod</dd>
                                    <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                                    <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                    <dd>Malesuada porta</dd>
                                    <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                </dl>
                            </div><!-- /.box-body -->
                        </div><!-- ./col-md-6 -->
                    </div><!-- /.box -->
                </div><!-- ./col -->
            </div>
        </div><!-- ./wrapper -->
<?php 
    include '../template/footer.php';
    }
}else{
    header('Location: ../index');
    exit();
}
?>