<?php
    include "../../config/connection.php";
    session_start();

    if(!isset($_SESSION['user']) && $_SESSION['level']!="2"){
        header("Location: ../../index?msg=err_login_1");
        exit();
    }
    if(isset($_SESSION['level'])) {
        //echo "".$_SESSION['user']." - ".$_SESSION['level']."";
        $cek_login = mysql_query("SELECT * FROM tb_pegawai AS a INNER JOIN tb_user  AS b ON (a.kode_pegawai = b.kode_pegawai)
                            WHERE (b.username = '". $_SESSION['user']."' AND b.kode_level_akses = '".$_SESSION['level']."')") or die("Query : ".mysql_error());
        if ($cek_login == false) {
            header('Location: ../../index?msg=err_1');
            exit();
        }else if(mysql_num_rows($cek_login)){
            $row = mysql_fetch_assoc($cek_login);
    include "../template/header.php";
?>
<body class="skin-blue">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="../beranda/" class="logo">
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
                                <img src="../../assets/img/avatar5.png" class="img-circle" alt="User Image" />
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
                                    <a href="../../config/logout" class="btn btn-default btn-flat">Sign out</a>
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
                            Pilih Negara
                            <small>Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li>Dashboard</li>
                            <li class="active">Pilih Negara</li>
                        </ol>
                    </div>
                </div>
                <br>    
                <div class="row">
                    <div class="col-md-9">
                        <div class="pull-left">
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
                    <div class="col-md-3">
                        <form action="../maintenance/" class="text-right">
                            <div class="input-group">                                                            
                                <input type="text" class="form-control input-sm" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" name="q" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>                                                     
                        </form>
                    </div>
                </div>
                <br>
                <!-- Main content -->
                <!--<section class="content">-->
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                         <?php
                            if (isset($_GET['msg'])) {
                                if ($_GET['msg'] == 'log_in') {
                                    ?>
                            <div class="alert alert-success alert-dismissable">
                                <i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b>Selamat datang,</b>
                                <?php echo $row['nm_pegawai']; ?> dalam sistem informasi PJTKI dari PT. Qafco.
                            </div>
                            <?php }} ?>
                            <?php if($row['kode_level_akses'] == '1'){ ?>
                            <div class="col-lg-3 col-md-6 col-md-offset-1">
                                <!-- small box -->
                                <div class="small-box bg-yellow" data-toggle="tooltip" title="Malaysia">
                                    <div class="inner">
                                        <h3>
                                            <img src="../../assets/img/Malaysia.png" class="img-circle"/>
                                        </h3>
                                        <p>
                                            Malaysia
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-flag"></i> 
                                    </div>
                                    <a href="../maintenance/" class="small-box-footer">
                                        Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div><!-- ./col -->
                            <div class="col-lg-3 col-md-6 col-md-offset-1">
                                <!-- small box -->
                                <div class="small-box bg-red" data-toggle="tooltip" title="Singapura">
                                    <div class="inner">
                                        <h3>
                                            <img src="../../assets/img/Singapore.png" class="img-circle"/>
                                        </h3>
                                        <p>
                                            Singapura
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-flag"></i> 
                                    </div>
                                    <a href="../maintenance/" class="small-box-footer">
                                        Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div><!-- ./col -->
                            <div class="col-lg-3 col-md-6 col-md-offset-1">
                                <!-- small box -->
                                <div class="small-box bg-green" data-toggle="tooltip" title="Timur Tengah">
                                    <div class="inner">
                                        <h3>
                                            <img src="../../assets/img/timur_tengah.png" class="img-circle"/>
                                        </h3>
                                        <p>
                                            Timur Tengah
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-flag"></i>
                                    </div>
                                    <a href="index" class="small-box-footer">
                                        Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div><!-- ./col -->
                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="col-lg-3 col-md-6 col-md-offset-3">
                                <!-- small box -->
                                <div class="small-box bg-maroon" data-toggle="tooltip" title="Taiwan">
                                    <div class="inner">
                                        <h3>
                                            <img src="../../assets/img/Taiwan.png" class="img-circle"/>
                                        </h3>
                                        <p>
                                            Taiwan
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-flag"></i>
                                    </div>
                                    <a href="../maintenance/" class="small-box-footer">
                                        Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div><!-- ./col -->
                            <div class="col-lg-3 col-md-6 col-md-offset-1">
                                <!-- small box -->
                                <div class="small-box bg-navy" data-toggle="tooltip" title="Hongkong">
                                    <div class="inner">
                                        <h3>
                                            <img src="../../assets/img/Hong Kong.png" class="img-circle"/>
                                        </h3>
                                        <p>
                                            Hongkong
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-flag"></i>
                                    </div>
                                    <a href="../maintenance/" class="small-box-footer">
                                        Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div><!-- ./col -->
                            <?php }?>
                        </div>
                    </div><!-- /.row -->

                    <!-- top row -->
                    <div class="row">
                        <div class="col-xs-12 connectedSortable">
                        </div><!-- /.col -->
                    </div>
                    <!-- /.row -->
                <!--</section> /.content -->
            </div>
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="box">
                    <div class="col-md-6">
                        
                        <div class="box-body">
                            <dl>
                                <dt>Kontak</dt>
                                <dd>No. Telp: (0354)-7418094, Fax: 7418094.</dd>
                                <dd>Email: mail_qafco@qafco.com</dd>
                                <dd>Website: ptqafco.com</dd>
                            </dl>
                        </div><!-- /.box-body -->
                    </div><!-- ./col-md-6 -->
                
                    <div class="col-md-6">
                        
                        <div class="box-body">
                            <dl>
                                <dt>Lokasi</dt>
                                <dd>Jalan Puskesmas 509. Kode Pos: 64182</dd>
                                <dd>Desa Ngasem, Kec. Ngasem, Kediri</dd>
                                <dd>Jawa Timur, Indonesia</dd>
                            </dl>
                        </div><!-- /.box-body -->
                    </div><!-- ./col-md-6 -->
                </div><!-- /.box -->
            </div><!-- ./col -->
        </div>
        <footer>
            <div class="row">
                <div class="col-sm-6 col-md-offset-3 text-center">
                    Copyright © PT QAFCO - KEDIRI 2014
                </div>
            </div>
        </footer>
    </div><!-- ./wrapper -->
<?php
    include "../template/footer.php";
    }
}else{
    header('Location: ../../index?msg=err_login_1');
    exit();
}
?>