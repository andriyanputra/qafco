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
                            <a href="#" onclick="toggle_visibility('personal');" class="btn btn-app bg-red">
                                <i class="fa fa-male"></i> Personal Data
                            </a>
                            <a href="#" onclick="toggle_visibility('bahasa');" class="btn btn-app bg-green">
                                <i class="fa fa-flag"></i> Bahasa
                            </a>
                            <a href="#" onclick="toggle_visibility('kemampuan');" class="btn btn-app bg-maroon">
                                <i class="fa fa-pencil-square"></i> Kemampuan
                            </a>
                            <a href="#" onclick="toggle_visibility('job');" class="btn btn-app bg-orange">
                                <i class="fa  fa-mail-reply"></i> Pekerjaan Sebelumnya
                            </a>
                            <a href="#" onclick="toggle_visibility('pengalaman');" class="btn btn-app bg-navy">
                                <i class="fa fa-globe"></i> Pengalaman
                            </a>
                        </div> 
                    </div><!--/.row (main row) -->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form role="form">
                                <!--PERSONAL DATA-->
                                <div class="box box-solid box-danger" id="personal"><!--style="display:none;"-->
                                    <div class="box-header">
                                        <h3 class="box-title ">Detail Personal Data</h3>
                                    </div>
                                    <div class="box-body">
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

                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label for="preview_gambar">Foto Calon TKI:</label>
                                                    <input type="file" name="gambar" id="preview_gambar" class="filestyle" data-buttonName="btn-danger">
                                                </div>
                                                <img src="" id="gambar_nodin" width="200" alt="" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Alamat:</label>
                                                    <textarea class="form-control" rows="3" placeholder="Alamat..."></textarea>             
                                                </div>
                                            </div>

                                             <div class="col-sm-3">
                                                <?php
                                                    $wilayah = mysql_query("select * from tb_wilayah group by nm_prov");
                                                    $prov = array();
                                                ?>
                                                <div class="form-group">
                                                    <label>Provinsi:</label>
                                                    <select class="form-control" id="prov">
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
                                                    <select class="form-control" id="kab">
                                                        <option value="">Pilih Kabupaten...</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Kecamatan:</label>
                                                    <select class="form-control" id="kec">
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
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                                <!-- END PERSONAL DATA -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
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