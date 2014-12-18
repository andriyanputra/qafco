<?php include "../config/connection.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PT. QAFCO</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="../assets/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="../assets/css/select2.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link rel="icon" href="../assets/img/favicon.ico" type="image/x-generic">
    </head>
        <body class="skin-blue">
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
                                <span>Jane Doe <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="../assets/img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        Jane Doe - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
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
                                Biodata
                                <small>Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                <li class="active">Biodata</li>
                            </ol>
                        </div>
                    </div>
                    <br>
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-1">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Kode TKI:</label>
                                                <input type="text" id="" name="kd_tki" class="form-control" placeholder="Kode TKI">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <label>Nama Lengkap:</label>
                                                <input type="email" id="" name="nama" class="form-control" placeholder="Nama Lengkap">
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <label for="">Tempat Lahir:</label>
                                                <input type="text" id="" name="tmpt_lahir" class="form-control" placeholder="Tempat Lahir">
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <label>Tanggal Lahir:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" id="datemask" name="tgl_lahir" class="form-control" data-inputmask="dd/mm/yyyy" data-mask/>
                                                </div><!-- /.input group -->
                                            </div><!-- /.form group -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Alamat:</label>
                                                <textarea class="form-control" rows="3" placeholder="Alamat..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                        <?php
                                            $wilayah = mysql_query("select * from tb_wilayah group by nm_prov");
                                            $prov = array();
                                        ?>
                                            <div class="form-group">
                                                <label>Kecamatan:</label>
                                                <div class="input-md">
                                                    <select id="kec">
                                                        <option value="">Pilih Kecamatan...</option>
                                                        <?php while ($row = mysql_fetch_array($wilayah)): ?>
                                                            <option value="<?= $row['kode_prov']; ?>"/><?php echo $row['nm_prov']; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                </form>
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
        </div><!-- ./wrapper -->


            <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../assets/js/AdminLTE/demo.js" type="text/javascript"></script>
        <!--Select2-->
        <<script src="../assets/js/select2.js" type="text/javascript"></script>
        <<script src="../assets/js/select2.min.js" type="text/javascript"></script>
         <!-- InputMask -->
        <script src="../assets/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="../assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="../assets/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Select2 
                $(document).ready(function() { $("#kec").select2(); });       
            });    
        </script>
    </body>
</html>