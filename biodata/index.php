<?php
    include "../config/connection.php";
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
            header('Location: ../index?msg=err_1');
            exit();
        }else if(mysql_num_rows($cek_login)){
            $row = mysql_fetch_assoc($cek_login);
            ?>
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
                                Biodata
                                <small>Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                                <li class="active">Biodata</li>
                            </ol>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
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
                </div>
                <!-- Main content -->
                <section class="content">
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <a class="btn btn-app bg-red">
                                <i class="fa fa-male"></i> Personal Data
                            </a>
                            <a class="btn btn-app bg-green">
                                <i class="fa fa-flag"></i> Pengetahuan Bahasa
                            </a>
                            <a class="btn btn-app bg-maroon">
                                <i class="fa fa-pencil-square"></i> Skill
                            </a>
                            <a class="btn btn-app bg-orange">
                                <i class="fa  fa-mail-reply"></i> Pekerjaan Sebelumnya
                            </a>
                            <a class="btn btn-app bg-navy">
                                <i class="fa fa-folder-open"></i> Pengalaman
                            </a>
                        </div> 
                    </div><!--/.row (main row) -->
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                            <form role="form">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Kode TKI:</label>
                                            <input type="text" id="" name="nama" class="form-control" placeholder="Kode TKI">               
                                        </div>
                                   
                                        <div class="form-group">
                                            <label>Nama Lengkap:</label>
                                            <input type="text" id="" name="nama" class="form-control" placeholder="Nama Lengkap">               
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat:</label>
                                            <textarea class="form-control" rows="3" placeholder="Alamat..."></textarea>             
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="preview_gambar">Foto:</label>
                                            <input type="file" name="gambar" id="preview_gambar">
                                        </div>
                                        <img src="" id="gambar_nodin" width="200" alt="" />
                                    </div>
                                </div>

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

                                <div class="form-group">
                                    <label for="">Tempat Lahir:</label>
                                    <input type="text" id="" name="tmpt_lahir" class="form-control" placeholder="Tempat Lahir">                         
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Lahir:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" id="datemask" name="tgl_lahir" class="form-control" data-inputmask="dd/mm/yyyy" data-mask/>
                                    </div><!-- /.input group -->                                
                                </div>

                                <div class="form-group">
                                    <label>Agama:</label>
                                    <div class="input-md">
                                        <select id="religion">
                                            <option value="">Pilih Agama...</option>
                                            <option value="1">Islam</option>
                                            <option value="2">Kristen Protestan</option>
                                            <option value="3">Katolik</option>
                                            <option value="4">Hindu</option>
                                            <option value="5">Buddha</option>
                                            <option value="6">Kong Hu Cu</option>
                                        </select>
                                    </div>                              
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin:</label>
                                    <div class="input-md">
                                        <select id="religion">
                                            <option value="">Pilih Jenis Kelamin...</option>
                                            <option value="1">Laki-Laki</option>
                                            <option value="1">Perempuan</option>
                                        </select>
                                    </div>                              
                                </div>

                                <div class="form-group">
                                    <label>Pendidikan:</label>
                                    <input type="text" id="" name="nama" class="form-control" placeholder="Pendidikan">                             
                                </div>

                                <div class="form-group">
                                    <label>No. KTP:</label>
                                    <input type="text" id="" name="nama" class="form-control" placeholder="Nomor KTP">                              
                                </div>

                                <div class="form-group">
                                    <label>Tinggi Badan:</label>
                                    <input type="text" id="" name="nama" class="form-control" placeholder="Tinggi Badan (CM)">                              
                                </div>

                                <div class="form-group">
                                    <label>Berat Badan:</label>
                                    <input type="text" id="" name="nama" class="form-control" placeholder="Berat Badan (KG)">                               
                                </div>

                                <div class="form-group">
                                    <label>Status Nikah:</label>
                                    <input type="text" id="" name="nama" class="form-control" placeholder="Status Nikah">                                   
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Anak:</label>
                                    <input type="text" id="" name="nama" class="form-control" placeholder="Jumlah Anak">                                
                                </div>

                                <div class="form-group">
                                    <label>Nama Bapak:</label>
                                    <input type="text" id="" name="nama" class="form-control" placeholder="Nama Bapak">                                 
                                </div>

                                <div class="form-group">
                                    <label>Nama Ibu:</label>
                                    <input type="text" id="" name="nama" class="form-control" placeholder="Nama Ibu">                               
                                </div>
                                
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Check me out
                                    </label>
                                </div>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section><!-- /.content -->
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
        <script src="../assets/js/select2.js" type="text/javascript"></script>
        <script src="../assets/js/select2.min.js" type="text/javascript"></script>
        <!--image upload-->
        <script src="../assets/js/jquery.preimage.js" type="text/javascript"></script>
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
                //image upload
                function bacaGambar(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#gambar_nodin').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#preview_gambar").change(function(){
                    bacaGambar(this);
                });
                //waktu
                // ========================Jam========================================== //
                function showTime() {
                    var a_p = "";
                    var today = new Date();
                    var curr_hour = today.getHours();
                    var curr_minute = today.getMinutes();
                    var curr_second = today.getSeconds();
                    if (curr_hour < 12) {
                        a_p = "AM";
                    } else {
                        a_p = "PM";
                    }
                    if (curr_hour == 0) {
                        curr_hour = 12;
                    }
                    if (curr_hour > 12) {
                        curr_hour = curr_hour - 12;
                    }
                    curr_hour = checkTime(curr_hour);
                    curr_minute = checkTime(curr_minute);
                    curr_second = checkTime(curr_second);
                    document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
                }

                function checkTime(i) {
                    if (i < 10) {
                        i = "0" + i;
                    }
                    return i;
                }
                setInterval(showTime, 500);
                // ========================Akhir Jam========================================== //       
            });    
        </script>
    </body>
</html>
<?php
}
}else{
    header('Location: ../index?msg=err_login_1');
    exit();
}
?>