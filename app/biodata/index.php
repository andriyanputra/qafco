<?php
    include "../../config/connection.php";
    session_start();

    if(!isset($_SESSION['user']) && $_SESSION['level']!="2"){
        header("Location: ../beranda/index?msg=err_login_1");
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
            include 'template/header.php';
            ?>
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
                                <li><a href="pilih_negara">Pilih Negara</a></li>
                                <li class="active">Timur Tengah</li>
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
                <!--<section class="content">
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-1 centered">
                        <?php if (isset($_GET['msg'])) {
                                if ($_GET['msg'] == 'err_data') {
                                    ?>
                               <div class="alert alert-danger alert-dismissable">
                                    <i class="fa fa-ban"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Alert!</b> Maaf terjadi kesalahan proses input data, mohon untuk lebih teliti dalam input data.
                                </div>
                            <?php } else if($_GET['msg'] == "err_foto01"){?>
                                <div class="alert alert-danger alert-dismissable">
                                    <i class="fa fa-ban"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Alert!</b> Mohon untuk upload foto atau gambar (jpg/jpeg/png/gif).
                                </div>
                        <?php }else if($_GET['msg'] == "err_foto02"){?>
                                <div class="alert alert-danger alert-dismissable">
                                    <i class="fa fa-ban"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Alert!</b>Ukuran foto terlalu besar.
                                </div>
                        <?php }else if($_GET['msg'] == "err_foto03"){ ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <i class="fa fa-ban"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Alert!</b>Maaf terjadi kesalahan upload file foto.
                                </div>
                        <?php
                                }
                            }?>
                            <a href="#" onclick="toggle_visibility('personal');" class="btn btn-app bg-red" data-toggle="tooltip" title="Personal Data">
                                <i class="fa fa-male"></i> Personal Data
                            </a>
                            <a href="#" onclick="toggle_visibility('bahasa');" class="btn btn-app bg-green" data-toggle="tooltip" title="Bahasa">
                                <i class="fa fa-flag"></i> Bahasa
                            </a>
                            <a href="#" onclick="toggle_visibility('kemampuan');" class="btn btn-app bg-purple" data-toggle="tooltip" title="Kemampuan">
                                <i class="fa fa-pencil-square"></i> Kemampuan
                            </a>
                            <a href="#" onclick="toggle_visibility('job');" class="btn btn-app bg-orange" data-toggle="tooltip" title="Pekerjaan Sebelumnya">
                                <i class="fa  fa-mail-reply"></i> Pekerjaan Sebelumnya
                            </a>
                            <a href="#" onclick="toggle_visibility('pengalaman');" class="btn btn-app bg-blue" data-toggle="tooltip" title="Pengalaman">
                                <i class="fa fa-globe"></i> Pengalaman
                            </a>
                            <a href="#" onclick="toggle_visibility('passport');" class="btn btn-app bg-maroon" data-toggle="tooltip" title="Passport">
                                <i class="fa fa-plane"></i> Passport
                            </a>
                            <a href="#" onclick="toggle_visibility('dokumen');" class="btn btn-app bg-navy" data-toggle="tooltip" title="Dokumen Registrasi">
                                <i class="fa fa-file-text"></i> Dokumen Registrasi
                            </a>
                        </div> 
                    </div><!--/.row (main row) -->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form role="form" onsubmit="valid()" name="myform" id="myform" action="template/pdf/timur_tengah" method="post" enctype="multipart/form-data">
                                <!--PERSONAL DATA-->
                                <div class="box box-solid box-danger" id="personal" ><!--style="display:none;"-->
                                    <div class="box-header">
                                        <h3 class="box-title ">Detail Personal Data</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Kode TKI:</label>
                                                    <input type="text" id="" name="kode" class="form-control" placeholder="Kode TKI" required>               
                                                </div>
                                           
                                                <div class="form-group">
                                                    <label>Nama Lengkap:</label>
                                                    <input type="text" id="" name="nama" class="form-control" placeholder="Nama Lengkap" required>               
                                                </div>

                                                 <div class="form-group">
                                                    <label for="">Tempat Lahir:</label>
                                                    <input type="text" id="" name="tmpt_lahir" class="form-control" placeholder="Tempat Lahir" required>                         
                                                </div>

                                                <div class="form-group">
                                                    <label>Tanggal Lahir:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" id="datemask" name="tgl_lahir" class="form-control" data-inputmask="yyyy-mm-dd" data-mask required/>
                                                    </div><!-- /.input group -->                                
                                                </div>

                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label for="preview_gambar">Foto Calon TKI:</label>
                                                    <input type="file" name="images" id="preview_gambar" class="filestyle" data-buttonName="btn-danger" required>
                                                </div>
                                                <img src="" id="gambar_nodin" width="200" alt="" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Alamat:</label>
                                                    <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat..." required></textarea>             
                                                </div>
                                            </div>

                                             <div class="col-sm-3">
                                                <?php
                                                    $wilayah = mysql_query("select * from tb_wilayah group by nm_prov");
                                                    $prov = array();
                                                ?>
                                                <div class="form-group">
                                                    <label>Provinsi:</label>
                                                    <select class="form-control" id="prov" name="prov" required>
                                                        <option value="">Pilih Provinsi...</option>
                                                        <?php while ($row = mysql_fetch_array($wilayah)): ?>
                                                            <option value="<?= $row['kode_prov']; ?>"/><?php echo $row['nm_prov']; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Kabupaten:</label>
                                                    <select class="form-control" id="kab" name="kab">
                                                        <option value="">Pilih Kabupaten...</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Kecamatan:</label>
                                                    <select class="form-control" id="kec" name="kec">
                                                        <option value="">Pilih Kecamatan...</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group"> 
                                            <label>Agama:</label><br>
                                            <label>
                                                <input type="radio" name="agama" class="flat-red" value="Islam" />
                                                Islam
                                            </label>&nbsp;&nbsp;
                                            <label>
                                                <input type="radio" name="agama" class="flat-red" value="Kristen Protestan"/>                                                    
                                                Kristen Protestan
                                            </label>&nbsp;&nbsp;
                                            <label>
                                                <input type="radio" name="agama" class="flat-red" value="Katolik"/>
                                                Katolik
                                            </label>&nbsp;&nbsp;
                                            <label>
                                                <input type="radio" name="agama" class="flat-red" value="Hindu"/>
                                                Hindu
                                            </label>&nbsp;&nbsp;
                                            <label>
                                                <input type="radio" name="agama" class="flat-red" value="Budha"/>
                                                Budha
                                            </label>&nbsp;&nbsp;
                                            <label>
                                                <input type="radio" name="agama" class="flat-red" value="Kong Hu Cu"/>
                                                Kong Hu Cu
                                            </label>                                
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Kelamin:</label><br>
                                            <label>
                                                <input type="radio" name="jenis" class="flat-red" value="laki-laki" />
                                                Laki-laki
                                            </label>&nbsp;&nbsp;
                                            <label>
                                                <input type="radio" name="jenis" class="flat-red" value="perempuan" />                                                    
                                                Perempuan
                                            </label>&nbsp;&nbsp;                   
                                        </div>
                                        
                                        <?php
                                            $pendidikan = mysql_query("SELECT * FROM tb_pendidikan") or die("Query failed: " . mysql_error());
                                        ?>                                        
                                        <div class="form-group">
                                            <label>Pendidikan Terakhir:</label>
                                            <select name="pendidikan" class="form-control" id="pendidikan" required>
                                                <option value="" />Pilih Pendidikan...
                                                <?php while ($p = mysql_fetch_array($pendidikan)): ?>
                                                    <option value="<?= $p['kode_pendidikan']; ?>"><?php echo $p['nm_pendidikan']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>No. KTP:</label>
                                            <input type="text" id="" name="no_ktp" class="form-control" placeholder="Nomor KTP" required>                              
                                        </div>

                                        <div class="form-group">
                                            <label>Tinggi Badan:</label>
                                            <input type="text" id="" name="tinggi_badan" class="form-control auto" placeholder="Tinggi Badan (CM)" data-a-sep="" required>                              
                                        </div>

                                        <div class="form-group">
                                            <label>Berat Badan:</label>
                                            <input type="text" id="" name="berat_badan" class="form-control auto" placeholder="Berat Badan (KG)" data-a-sep="" required>                               
                                        </div>

                                        <div class="form-group">
                                            <label>Status Nikah:</label>
                                            <select name="nikah" class="form-control" id="nikah" required>
                                                <option value="" />Pilih Status...
                                                <option value="Belum Nikah" />Belum Menikah
                                                <option value="Sudah Nikah" />Sudah Menikah
                                                <option value="Janda" />Janda
                                                <option value="Duda" />Duda
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah Anak:</label>
                                            <input type="text" id="" name="jml_anak" class="form-control auto" placeholder="Jumlah Anak" data-a-sep="" required>                                
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Bapak:</label>
                                            <input type="text" id="" name="bpk" class="form-control" placeholder="Nama Bapak" required>                                 
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Ibu:</label>
                                            <input type="text" id="" name="ibu" class="form-control" placeholder="Nama Ibu" required>                                
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer pull-right">
                                        <a href="#" onclick="toggle_visibility('bahasa');" class="btn btn-primary">
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div><!-- /.box -->
                                <!-- END PERSONAL DATA -->
                                
                                <!-- BAHASA -->
                                <div class="box box-solid box-success" id="bahasa" style="display:none;"><!--style="display:none;"-->
                                    <div class="box-header">
                                        <h3 class="box-title ">Pengetahuan Bahasa</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="box-header">
                                            <h3 class="box-title">English</h3>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="english" class="flat-green" value="poor" />
                                                Poor
                                            </label>
                                            <label>
                                                <input type="radio" name="english" class="flat-green" value="fair" />
                                            </label>
                                            Fair
                                            <label>
                                                <input type="radio" name="english" class="flat-green" value="fluent" />
                                                Fluent
                                            </label>
                                            <label>
                                                <input type="radio" name="english" class="flat-green" value="exc" />
                                                Exc
                                            </label>
                                        </div>  

                                        <div class="box-header">
                                            <h3 class="box-title">Arabic</h3>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="arabic" class="flat-green" value="poor" />
                                                Poor
                                            </label>
                                            <label>
                                                <input type="radio" name="arabic" class="flat-green" value="fair" />
                                            </label>
                                            Fair
                                            <label>
                                                <input type="radio" name="arabic" class="flat-green" value="fluent" />
                                                Fluent
                                            </label>
                                            <label>
                                                <input type="radio" name="arabic" class="flat-green" value="exc" />
                                                Exc
                                            </label>
                                        </div>  
                                        <div class="box-header">
                                            <h3 class="box-title">Indonesia</h3>
                                        </div> 
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="indonesia" class="flat-green" value="poor" />
                                                Poor
                                            </label>
                                            <label>
                                                <input type="radio" name="indonesia" class="flat-green" value="fair" />
                                            </label>
                                            Fair
                                            <label>
                                                <input type="radio" name="indonesia" class="flat-green" value="fluent" />
                                                Fluent
                                            </label>
                                            <label>
                                                <input type="radio" name="indonesia" class="flat-green" value="exc" />
                                                Exc
                                            </label>
                                        </div>  

                                        <div class="box-header">
                                            <h3 class="box-title">Mandarin</h3>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="mandarin" class="flat-green" value="poor" />
                                                Poor
                                            </label>
                                            <label>
                                                <input type="radio" name="mandarin" class="flat-green" value="fair" />
                                            </label>
                                            Fair
                                            <label>
                                                <input type="radio" name="mandarin" class="flat-green" value="fluent" />
                                                Fluent
                                            </label>
                                            <label>
                                                <input type="radio" name="mandarin" class="flat-green" value="exc" />
                                                Exc
                                            </label>
                                        </div>  

                                        <div class="box-header">
                                            <h3 class="box-title">Hokkian</h3>
                                        </div> 
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="hokkian" class="flat-green" value="poor" />
                                                Poor
                                            </label>
                                            <label>
                                                <input type="radio" name="hokkian" class="flat-green" value="fair" />
                                            </label>
                                            Fair
                                            <label>
                                                <input type="radio" name="hokkian" class="flat-green" value="fluent" />
                                                Fluent
                                            </label>
                                            <label>
                                                <input type="radio" name="hokkian" class="flat-green" value="exc" />
                                                Exc
                                            </label>
                                        </div>  

                                        <div class="box-header">
                                            <h3 class="box-title">Hakka</h3>
                                        </div> 
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="hakka" class="flat-green" value="poor" />
                                                Poor
                                            </label>
                                            <label>
                                                <input type="radio" name="hakka" class="flat-green" value="fair" />
                                            </label>
                                            Fair
                                            <label>
                                                <input type="radio" name="hakka" class="flat-green" value="fluent" />
                                                Fluent
                                            </label>
                                            <label>
                                                <input type="radio" name="hakka" class="flat-green" value="exc" />
                                                Exc
                                            </label>
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer pull-right">
                                        <a href="#" onclick="toggle_visibility('personal');" class="btn btn-primary ">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>&nbsp;&nbsp;
                                        <a href="#" onclick="toggle_visibility('kemampuan');" class="btn btn-primary">
                                            <i class="fa fa-arrow-right"></i>
                                        </a> 
                                    </div>
                                </div><!-- /.box -->
                                <!-- END BAHASA -->

                                <!-- KEMAMPUAN -->
                                <div class="box box-solid" id="kemampuan" style="display:none;"><!--style="display:none;"-->
                                    <div class="box-header bg-purple">
                                        <h3 class="box-title ">Kemampuan (Skill)</h3>
                                    </div>
                                    <div class="box-body">
                                         <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="skill[]" class="flat-purple" value="sewing" />
                                            Sewing
                                        </label><br>
                                        <label>
                                            <input type="checkbox" name="skill[]"  class="flat-purple" value="washing" />
                                            Washing
                                        </label><br>
                                        <label>
                                            <input type="checkbox" name="skill[]" class="flat-purple" value="cleaning" />
                                            Cleaning
                                        </label><br>
                                        <label>
                                            <input type="checkbox" name="skill[]" class="flat-purple" value="ironing" />
                                            Ironing
                                        </label><br>
                                        <label>
                                            <input type="checkbox" name="skill[]" class="flat-purple" value="cooking" />
                                            Cooking
                                        </label><br>
                                        <label>
                                            <input type="checkbox" name="skill[]" class="flat-purple" value="baby and child care" />
                                            Baby and Child Care
                                        </label><br>
                                        <label>
                                            <input type="checkbox" name="skill[]" class="flat-purple" value="old age or bedridden care" />
                                            Old Age or Bedridden Care
                                        </label>
                                    </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer pull-right">
                                        <a href="#" onclick="toggle_visibility('bahasa');" class="btn btn-primary ">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>&nbsp;&nbsp;
                                        <a href="#" onclick="toggle_visibility('job');" class="btn btn-primary">
                                            <i class="fa fa-arrow-right"></i>
                                        </a> 
                                    </div>
                                </div><!-- /.box -->
                                <!-- END KEMAMPUAN -->

                                <!-- JOB -->
                                <div class="box box-solid" id="job" style="display:none;"><!--style="display:none;"-->
                                    <div class="box-header bg-orange">
                                        <h3 class="box-title ">Pekerjaan Sebelumnya</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Negara: </label>
                                            <input type="text" id="" name="negara_sblm" class="form-control" placeholder="Negara">                                         
                                        </div>

                                        <div class="form-group">
                                            <label>Periode Waktu:</label>
                                            <input type="text" id="" name="periode" class="form-control" placeholder="Periode Waktu">                             
                                        </div>

                                        <div class="form-group">
                                            <label>Name of Employer:</label>
                                            <input type="text" id="" name="name_employer" class="form-control" placeholder="Name of Employer">               
                                        </div>

                                        <div class="form-group">
                                            <label>Pengalaman Kerja:</label>
                                            <textarea class="form-control" rows="3" name="pengalaman_kerja" placeholder="Pengalaman Kerja">
                                            </textarea>             
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer pull-right">
                                        <a href="#" onclick="toggle_visibility('kemampuan');" class="btn btn-primary ">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>&nbsp;&nbsp;
                                        <a href="#" onclick="toggle_visibility('pengalaman');" class="btn btn-primary">
                                            <i class="fa fa-arrow-right"></i>
                                        </a> 
                                    </div>
                                </div><!-- /.box -->
                                <!-- END JOB -->

                                <!-- PENGALAMAN -->
                                <div class="box box-solid" id="pengalaman" style="display:none;"><!--style="display:none;"-->
                                    <div class="box-header bg-blue">
                                        <h3 class="box-title ">Pengalaman Kerja</h3>
                                    </div>
                                    <div class="box-body">
                                        <!--<div class="form-group">
                                            <label>She/He Has Experience At:</label>
                                            <input type="text" id="" name="nama" class="form-control" placeholder="She/He Has Experience At">                             
                                        </div>

                                        <div class="form-group">
                                            <label>Periode:</label>
                                            <input type="text" id="" name="nama" class="form-control" placeholder="Periode">                             
                                        </div>

                                        <div class="form-group">
                                            <label>Name of Employer:</label>
                                            <input type="text" id="" name="nama" class="form-control" placeholder="Name of Employer">               
                                        </div>-->

                                        <div class="form-group">
                                            <label>She Can Do work As:</label><br>
                                            <label>
                                                <input type="checkbox" name="kerja_sebelum[]" class="flat-blue" value="sewing" />
                                                Sewing
                                            </label><br>
                                            <label>
                                                <input type="checkbox" name="kerja_sebelum[]" class="flat-blue" value="cleaning" />
                                                Cleaning
                                            </label><br>
                                            <label>
                                                <input type="checkbox" name="kerja_sebelum[]" class="flat-blue" value="washing" />
                                                Washing
                                            </label><br>
                                            <label>
                                                <input type="checkbox" name="kerja_sebelum[]" class="flat-blue" value="baby and child care" />
                                                Baby and Child Care
                                            </label><br>
                                            <label>
                                                <input type="checkbox" name="kerja_sebelum[]" class="flat-blue" value="ironing" />
                                                Ironing
                                            </label><br>
                                            <label>
                                                <input type="checkbox" name="kerja_sebelum[]" class="flat-blue" value="Cooking Arabian/Indonesia Food" />
                                                Cooking Arabian/Indonesia Food
                                            </label><br>
                                            <label>
                                                <input type="checkbox" name="kerja_sebelum[]" class="flat-blue" value="Old Age or Bedridden Care" />
                                                Old Age or Bedridden Care
                                            </label><br>
                                            <label>
                                                <input type="checkbox" name="kerja_sebelum[]" class="flat-blue" value="Help Cooking Arabian/Indonesia" />
                                                Help Cooking Arabian/Indonesia
                                            </label>
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer pull-right">
                                        <a href="#" onclick="toggle_visibility('job');" class="btn btn-primary ">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>&nbsp;&nbsp;
                                        <a href="#" onclick="toggle_visibility('passport');" class="btn btn-primary">
                                            <i class="fa fa-arrow-right"></i>
                                        </a> 
                                    </div>
                                </div><!-- /.box -->
                                <!-- END PENGALAMAN -->

                                <!-- PASSPORT -->
                                <div class="box box-solid" id="passport" style="display:none;"><!--style="display:none;"-->
                                    <div class="box-header bg-maroon">
                                        <h3 class="box-title ">Detail Passport</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="form-group col-md-4 pull-left">
                                                <label for="no_passport">No. Passport:</label>
                                                <input type="text" name="no_passport" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tanggal Terbit Passport:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" id="datemask1" name="date_terbit" class="form-control" data-inputmask="yyyy-mm-dd" data-mask required/>
                                                    </div><!-- /.input group -->                                
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Masa Habis Passport:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" id="datemask2" name="date_habis" class="form-control" data-inputmask="yyyy-mm-dd" data-mask required/>
                                                    </div><!-- /.input group -->                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="lokasi_terbit">Lokasi Penerbitan Passport:</label>
                                            <input type="text" name="lokasi_passport" class="form-control"  required>
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer pull-right">
                                        <a href="#" onclick="toggle_visibility('pengalaman');" class="btn btn-primary ">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>&nbsp;&nbsp;
                                        <a href="#" onclick="toggle_visibility('dokumen');" class="btn btn-primary">
                                            <i class="fa fa-arrow-right"></i>
                                        </a> 
                                    </div>
                                </div><!-- /.box -->
                                <!-- END PASSPORT -->

                                <!-- DOKUMEN -->
                                <div class="box box-solid" id="dokumen" style="display:none;"><!--style="display:none;"-->
                                    <div class="box-header bg-navy">
                                        <h3 class="box-title ">Dokumen Registrasi</h3>
                                    </div>
                                    <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-md-4 pull-left">
                                            <label for="preview_gambar">Jenis Dokumen:</label>
                                            <input type="text" name="file_" class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="preview_gambar">Upload Dokumen:</label>
                                            <input type="file" name="file_" class="filestyle" data-buttonName="bg-navy" required>
                                        </div>
                                    </div>
                                        <div class="form-group"><label></label></div>
                                        <div class="form-group"><label></label></div>
                                        <div class="form-group">
                                            <label></label>
                                            <!--<a href="#" class="btn btn-primary col-md-3 pull-right" data-toggle="tooltip" title="Cetak Keseluruhan Biodata">
                                                <i class='fa fa-print'></i>
                                            </a>
                                            <a href="javascript:void()" onclick="document.getElementById('myform').submit();" class="btn btn-primary col-md-3 pull-right" data-toggle="tooltip" title="Cetak Keseluruhan Biodata">
                                                <i class='fa fa-print'></i>
                                            </a>-->
                                            <input type="submit" value="Print" name="submit" class="btn btn-primary col-md-3 pull-right" data-toggle="tooltip" title="Cetak Keseluruhan Biodata"/>-->
                                            
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer pull-right">
                                        
                                    </div>
                                </div><!-- /.box -->
                                <!-- END DOKUMEN -->
                                
                            </form>
                        </div>
                    </div>
                    <footer>
                        <div class="row">
                            <div class="col-sm-6 col-md-offset-3 text-center">
                                Copyright © PT QAFCO - KEDIRI 2014
                            </div>
                        </div>
                    </footer>-->
                <!--</section>--><!-- /.content -->
            </div><!-- /.row -->
        </div><!-- ./wrapper -->

<?php
include 'template/footer.php';
}
}else{
    header('Location: ../../index?msg=err_login_1');
    exit();
}
?>