<?php
    include "../../config/connection.php";
    session_start();

    if(!isset($_SESSION['user']) && $_SESSION['level']!="2"){
        header("Location: ../index?msg=err_login_1");
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
            ?>
<?php include '../template/header1.php' ?>
<div class="wrapper row-offcanvas">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- Content Header (Page header) -->
            <div class="right-side strech">
                <div class="content-header">
                    <h1>
                        Master Data
                        <small>Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                        <li class="active">Master Data</li>
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
            <div class="row">
                <div class="">
                    <div class="col-md-3 ">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>
                                    <i class="fa fa-quote-left"></i>
                                </h3>
                                <p>
                                    Agen
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="v_agen/index.php" class="small-box-footer">
                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-md-3 ">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>
                                    <i class="fa fa-plane"></i>
                                </h3>
                                <p>
                                    Air Line
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-plane"></i>
                            </div>
                            <a href="v_airline/index.php" class="small-box-footer">
                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-md-3 ">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>
                                    <i class="fa fa-bar-chart-o"></i>
                                </h3>
                                <p>
                                    Asuransi
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="v_asuransi/index.php" class="small-box-footer">
                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-md-3 ">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>
                                    <i class="fa fa-bar-chart-o"></i>
                                </h3>
                                <p>
                                    Balai Latihan Kerja Luar Negeri
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-gear-a"></i>
                            </div>
                            <a href="v_blkln/index.php" class="small-box-footer">
                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                </div>
            </div><!-- /.row -->
            <!-- top row -->
            <div class="row">
                <div class="">
                    <div class="col-md-3 ">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #143803">
                            <div class="inner">
                                <h3>
                                    <i class="fa  fa-quote-left"></i>
                                </h3>
                                <p>
                                    Jenis Dokumen
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="v_jenisdoc/index.php" class="small-box-footer">
                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-md-3 ">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #D0205C">
                            <div class="inner">
                                <h3>
                                    <i class="fa fa-money"></i>
                                </h3>
                                <p>
                                    Jenis Medis
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <a href="v_jenismedis/index.php" class="small-box-footer">
                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-md-3 ">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #8B92E4">
                            <div class="inner">
                                <h3>
                                    <i class="fa fa-bar-chart-o"></i>
                                </h3>
                                <p>
                                    Kantor Departemen
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="v_kandep/index.php" class="small-box-footer">
                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-md-3 ">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #00FF81">
                            <div class="inner">
                                <h3>
                                    <i class="fa fa-bar-chart-o"></i>
                                </h3>
                                <p>
                                    Klinik
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-gear-a"></i>
                            </div>
                            <a href="v_klinik/index.php" class="small-box-footer">
                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                </div>
            </div><!-- /.row -->
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="">
                    <div class="col-md-3 ">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #FFE800">
                            <div class="inner">
                                <h3>
                                    <i class="fa  fa-quote-left"></i>
                                </h3>
                                <p>
                                    Koordinator Sponsor
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="v_koord_sponsor/index.php" class="small-box-footer">
                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-md-3 ">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #741F1F">
                            <div class="inner">
                                <h3>
                                    <i class="fa fa-money"></i>
                                </h3>
                                <p>
                                    Majikan
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <a href="v_majikan/index.php" class="small-box-footer">
                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-md-3 ">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #C2FF76">
                            <div class="inner">
                                <h3>
                                    <i class="fa fa-bar-chart-o"></i>
                                </h3>
                                <p>
                                    Negara
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="v_negara/index.php" class="small-box-footer">
                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-md-3 ">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #F00">
                            <div class="inner">
                                <h3>
                                    <i class="fa fa-bar-chart-o"></i>
                                </h3>
                                <p>
                                    Pegawai
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-gear-a"></i>
                            </div>
                            <a href="v_pegawai/index.php" class="small-box-footer">
                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="">
                    <div class="col-md-3 ">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #FF7400">
                            <div class="inner">
                                <h3>
                                    <i class="fa  fa-quote-left"></i>
                                </h3>
                                <p>
                                    Pekerjaan
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="v_pekerjaan/index.php" class="small-box-footer">
                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-md-3 ">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #FF00F2">
                            <div class="inner">
                                <h3>
                                    <i class="fa fa-money"></i>
                                </h3>
                                <p>
                                    Skill
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <a href="v_skill/index.php" class="small-box-footer">
                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-md-3 ">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #0081FF">
                            <div class="inner">
                                <h3>
                                    <i class="fa fa-bar-chart-o"></i>
                                </h3>
                                <p>
                                    Dokumen
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="v_dokumen/index.php" class="small-box-footer">
                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-md-3 ">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #0FF">
                            <div class="inner">
                                <h3>
                                    <i class="fa fa-bar-chart-o"></i>
                                </h3>
                                <p>
                                    User
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-gear-a"></i>
                            </div>
                            <a href="v_user/index.php" class="small-box-footer">
                                Lanjutkan <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.row -->

        <!-- top row -->
        <div class="row">
            <div class="col-xs-12 connectedSortable">
            </div><!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
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
    </div>
    <footer>
        <div class="row">
            <div class="col-sm-6 col-md-offset-3 text-center">
                Copyright © PT QAFCO - KEDIRI 2014
            </div>
        </div>
    </footer>
</div>
<?php include '../template/footer1.php';
}
}else{
    header('Location: ../../index?msg=err_login_1');
    exit();
}
?>