<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Biodata</title>

        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
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

        <style type="text/css">	
            body{
                background-color: #fff;
            }
            .centered-form{
                margin-top: 50px;
            }

            .centered-form .panel{
                background: rgba(255, 255, 255, 0.8);
                box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
            }
        </style>

    </head>

    <body class="skin-blue">
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
        <!--        <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                         Brand and toggle get grouped for better mobile display 
                        <div class="navbar-header page-scroll">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href=""><h1>PT QAFCO</h1></a>
                        </div>
        
                         Collect the nav links, forms, and other content for toggling 
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="hidden">
                                    <a href="#page-top"></a>
                                </li>
        
                                <li>
                                    <a href="/"><h2>Back To Home</h2></a>
                                </li>
                            </ul>
                        </div>
                         /.navbar-collapse 
                    </div>
                     /.container-fluid 
                </nav>-->

        <div class="container">
            <br><br>

            <div class="row">
                <div class="col-md-2">
                    <br><br>
                    <div class="container">
                        <img class="img" src="../img/Clipboard.png" alt="Generic placeholder image">
                    </div>
                </div>

                <!-- /.col-md-8 -->
                <div class="col-md-10">

                    <div class="row centered-form">
                        <div class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-xs-8 col-xs-offset-1 col-sm-8 col-sm-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Personal Data</h3>
                                </div>
                                <div class="panel-body">

                                    <!--                                    {{ Form::open(array('url' => route('guest.register'), 'class' => 'uk-form uk-form-horizontal')) }}
                                                                        {{ Form::hidden('uid', Str::random(20, 'numeric')) }}
                                                                        <input type="hidden" name="pid" value="PR00<?php echo date('y') ?>-<?php echo date('m-d') ?>-<?php echo date('i') ?>">		-->
                                    <div class="text-left">
                                        <h2>BIODATA</h2>
                                        <hr>
                                    </div>

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
                                            <select id="kec">
                                                <option value="">Pilih Agama...</option>
                                                <?php while ($row = mysql_fetch_array($wilayah)): ?>
                                                    <option value="<?= $row['kode_prov']; ?>"/><?php echo $row['nm_prov']; ?></option>
                                                <?php endwhile; ?>
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

                                    <div class="form-group">
                                        <label>Foto:</label>
                                        <input type="file" id="" name="foto" class="form-control" >								
                                    </div>

                                    <div class="text-left">
                                        <h2>Riwayat Pekerjaan Sebelumnya</h2>
                                        <hr>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::text('namaperusahaan', null, array(
									'class'       => 'form-control input-sm',
									'placeholder' => 'Masukkan nama perusahaan...',
									'id'          => 'namaperusahaan',
									'maxlength'   => '50'
									)) 
                                        }}	
                                    </div>

                                    <div class="form-group">
                                        {{ Form::text('alamat', null, array(
									'class'       => 'form-control input-sm',
									'placeholder' => 'Masukkan nama alamat...',
									'id'          => 'alamat',
									'maxlength'   => '50'
									)) 
                                        }}									
                                    </div>

                                    <div class="form-group">
                                        {{ Form::text('kota2', null, array(
									'class'       => 'form-control input-sm',
									'placeholder' => 'Masukkan nama kota...',
									'id'          => 'kota2',
									'maxlength'   => '50'
									)) 
                                        }}									
                                    </div>

                                    <div class="form-group">
                                        {{ Form::text('propinsi2', null, array(
									'class'       => 'form-control input-sm',
									'placeholder' => 'Masukkan nama propinsi...',
									'id'          => 'propinsi2',
									'maxlength'   => '50'
									)) 
                                        }}								
                                    </div>

                                    <div class="form-group">
                                        {{ Form::text('kode_pos2', null, array(
									'class'       => 'form-control input-sm',
									'placeholder' => 'Masukkan nomer kode pos...',
									'id'          => 'kode_pos2',
									'maxlength'   => '50'
									)) 
                                        }}								
                                    </div>

                                    <div class="form-group">
                                        {{ Form::text('handphone2', null, array(
									'class'       => 'form-control input-sm',
									'placeholder' => 'Masukkan nomer handphone...',
									'id'          => 'handphone2',
									'maxlength'   => '50'
									)) 
                                        }}								
                                    </div>

                                    <div class="form-group">
                                        {{ Form::text('telephone2', null, array(
									'class'       => 'form-control input-sm',
									'placeholder' => 'Masukkan nomer telephone...',
									'id'          => 'telephone2',
									'maxlength'   => '50'
									)) 
                                        }}								
                                    </div>

                                    <div class="form-group">
                                        {{ Form::text('fax', null, array(
									'class'       => 'form-control input-sm',
									'placeholder' => 'Masukkan nomer fax...',
									'id'          => 'fax',
									'maxlength'   => '50'
									)) 
                                        }}								
                                    </div>

                                    <div class="form-group">
                                        {{ Form::text('email_perusahaan', null, array(
									'class'       => 'form-control input-sm',
									'placeholder' => 'Masukkan email perusahaan...',
									'id'          => 'email_perusahaan',
									'maxlength'   => '50'
									)) 
                                        }}									
                                    </div>

                                    {{ Form::hidden('status', 'pending') }}
                                    {{ Form::hidden('tanggal_daftar', date('Y-m-d')) }}

                                    <div class="form-group">
                                        <center>{{ Form::captcha() }}</center>
                                    </div>							

                                    <input type="submit" value="Submit" class="btn btn-info btn-block">

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="../js/bootstrap.min.js"></script>

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
        $(document).ready(function() {
            $("#kec").select2();
        });
    });
            </script>
    </body>
</html>