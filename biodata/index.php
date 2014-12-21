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
                        <div class="col-xs-5 centered">
                            <a href="#"onclick="toggle_visibility('personal')" class="btn btn-app bg-red">
                                <i class="fa fa-male"></i> Personal Data
                            </a>
                            <a href="#" onclick="toggle_visibility('bahasa');" class="btn btn-app bg-green">
                                <i class="fa fa-flag"></i> Bahasa
                            </a>
                            <a href="#" onclick="toggle_visibility('kemampuan');" class="btn btn-app bg-purple">
                                <i class="fa fa-pencil-square"></i> Kemampuan
                            </a>
                            <a href="#" onclick="toggle_visibility('job');" class="btn btn-app bg-orange">
                                <i class="fa  fa-mail-reply"></i> Pekerjaan Sebelumnya
                            </a>
                            <a href="#" onclick="toggle_visibility('pengalaman');" class="btn btn-app bg-blue">
                                <i class="fa fa-globe"></i> Pengalaman
                            </a>
                        </div> 
                    </div><!--/.row (main row) -->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form role="form" onsubmit="valid()" name="myform" id="myform">
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
                                                    <input type="text" id="" name="nama" class="form-control" placeholder="Kode TKI" required>               
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
                                                        <input type="text" id="datemask" name="tgl_lahir" class="form-control" data-inputmask="dd/mm/yyyy" data-mask required/>
                                                    </div><!-- /.input group -->                                
                                                </div>

                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label for="preview_gambar">Foto Calon TKI:</label>
                                                    <input type="file" name="gambar" id="preview_gambar" class="filestyle" data-buttonName="btn-danger" required>
                                                </div>
                                                <img src="" id="gambar_nodin" width="200" alt="" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Alamat:</label>
                                                    <textarea class="form-control" rows="3" placeholder="Alamat..." required></textarea>             
                                                </div>
                                            </div>

                                             <div class="col-sm-3">
                                                <?php
                                                    $wilayah = mysql_query("select * from tb_wilayah group by nm_prov");
                                                    $prov = array();
                                                ?>
                                                <div class="form-group">
                                                    <label>Provinsi:</label>
                                                    <select class="form-control" id="prov" required>
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
                                                    <select class="form-control" id="kab" >
                                                        <option value="">Pilih Kabupaten...</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Kecamatan:</label>
                                                    <select class="form-control" id="kec" required>
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
                                                <input type="radio" name="jenis" class="flat-red"/>
                                                Laki-laki
                                            </label>&nbsp;&nbsp;
                                            <label>
                                                <input type="radio" name="agama" class="flat-red"/>                                                    
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
                                            <input type="text" id="" name="nama" class="form-control auto" placeholder="Nomor KTP" data-a-sep="" required>                              
                                        </div>

                                        <div class="form-group">
                                            <label>Tinggi Badan:</label>
                                            <input type="text" id="" name="nama" class="form-control auto" placeholder="Tinggi Badan (CM)" data-a-sep="" required>                              
                                        </div>

                                        <div class="form-group">
                                            <label>Berat Badan:</label>
                                            <input type="text" id="" name="nama" class="form-control auto" placeholder="Berat Badan (KG)" data-a-sep="" required>                               
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
                                            <input type="text" id="" name="nama" class="form-control auto" placeholder="Jumlah Anak" data-a-sep="" required>                                
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Bapak:</label>
                                            <input type="text" id="" name="nama" class="form-control" placeholder="Nama Bapak" required>                                 
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Ibu:</label>
                                            <input type="text" id="" name="nama" class="form-control" placeholder="Nama Ibu" required>                                
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
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Poor
                                            </label>
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                            </label>
                                            Fair
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Fluent
                                            </label>
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Exc
                                            </label>
                                        </div>  

                                        <div class="box-header">
                                            <h3 class="box-title">Arabic</h3>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Poor
                                            </label>
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                            </label>
                                            Fair
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Fluent
                                            </label>
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Exc
                                            </label>
                                        </div>  
                                        <div class="box-header">
                                            <h3 class="box-title">Indonesia</h3>
                                        </div> 
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Poor
                                            </label>
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                            </label>
                                            Fair
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Fluent
                                            </label>
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Exc
                                            </label>
                                        </div>  

                                        <div class="box-header">
                                            <h3 class="box-title">Mandarin</h3>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Poor
                                            </label>
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                            </label>
                                            Fair
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Fluent
                                            </label>
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Exc
                                            </label>
                                        </div>  

                                        <div class="box-header">
                                            <h3 class="box-title">Hokkian</h3>
                                        </div> 
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Poor
                                            </label>
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                            </label>
                                            Fair
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Fluent
                                            </label>
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Exc
                                            </label>
                                        </div>  

                                        <div class="box-header">
                                            <h3 class="box-title">Hakka</h3>
                                        </div> 
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Poor
                                            </label>
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                            </label>
                                            Fair
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
                                                Fluent
                                            </label>
                                            <label>
                                                <input type="radio" name="r1" class="flat-green"/>
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
                                            <input type="checkbox" class="flat-purple"/>
                                            Sewing
                                        </label><br>
                                        <label>
                                            <input type="checkbox" class="flat-purple"/>
                                            Washing
                                        </label><br>
                                        <label>
                                            <input type="checkbox" class="flat-purple"/>
                                            Cleaning
                                        </label><br>
                                        <label>
                                            <input type="checkbox" class="flat-purple"/>
                                            Ironing
                                        </label><br>
                                        <label>
                                            <input type="checkbox" class="flat-purple"/>
                                            Cooking
                                        </label><br>
                                        <label>
                                            <input type="checkbox" class="flat-purple"/>
                                            Baby and Child Care
                                        </label><br>
                                        <label>
                                            <input type="checkbox" class="flat-purple"/>
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

                            </form>
                        </div>
                    </div>
                    <footer>
                        <div class="row">
                            <div class="col-sm-6 col-md-offset-3 text-center">
                                Copyright © PT QAFCO - KEDIRI 2014
                            </div>
                        </div>
                    </footer>
                </section><!-- /.content -->
            </div><!-- /.row -->
        </div><!-- ./wrapper -->

<?php
include 'template/footer.php';
}
}else{
    header('Location: ../index?msg=err_login_1');
    exit();
}
?>