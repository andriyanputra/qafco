        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../../assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <!--<script src="../assets/js/AdminLTE/demo.js" type="text/javascript"></script>-->
        <script type="text/javascript" src="../../assets/js/bootstrap-filestyle.js"> </script>
        <!--image upload-->
        <script src="../../assets/js/jquery.preimage.js" type="text/javascript"></script>
         <!-- InputMask -->
        <script src="../../assets/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="../../assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="../../assets/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!--autonumeric-->
        <script src="../../assets/js/autoNumeric.js"></script>
        <!-- VALIDASI -->
        <script type="text/javascript" src="../../assets/js/validate.min.js"></script>

        <script type="text/javascript">
        //TAB
            function toggle_visibility(id) {
                var thelist = document.getElementsByClassName("box-solid");
                for (var i = 0; i < thelist.length; i++) {
                    thelist[i].style.display = 'none';
                }
                var e = document.getElementById(id);
                if(e.style.display == 'block') {
                    e.style.display = 'none';
                } else {
                    e.style.display = 'block';
                }
            }
        //-->
        </script>
        <script type="text/javascript">
            jQuery(function($) {
                $('.auto').autoNumeric('init');
            });
        </script>
        <script type="text/javascript">
            $(function() {
                //Choose file
                $(":file").filestyle({buttonName: "btn-danger"});
                //Datemask yyyy/mm/dd
                $("#datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
                $("#datemask1").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
                $("#datemask2").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
                //Select2 
                //$(document).ready(function() { $("#kec").select2(); });
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

                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });
                $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
                $('input[type="checkbox"].flat-purple, input[type="radio"].flat-purple').iCheck({
                    checkboxClass: 'icheckbox_flat-purple',
                    radioClass: 'iradio_flat-purple'
                });
                $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                    checkboxClass: 'icheckbox_flat-blue',
                    radioClass: 'iradio_flat-blue'
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
        <script type="text/javascript">
            //Dropdown Wilayah
            $(document).ready(function() {
                $("#prov").change(function() {
                    $(this).after('<span class="pull-right"><i class="fa fa-spinner fa-spin blue bigger-300" id="loader"></i></span>');
                    $.get('prov.php?prov=' + $(this).val(), function(data) {
                        $("#kab").html(data);
                        $('#loader').slideUp(200, function() {
                            $(this).remove();
                        });
                    });
                });
                $("#kab").change(function() {
                    $(this).after('<span class="pull-right"><i class="fa fa-spinner fa-spin blue bigger-300" id="loader"></i></span>');
                    $.get('kab.php?kab=' + $(this).val(), function(data) {
                        $("#kec").html(data);
                        $('#loader').slideUp(200, function() {
                            $(this).remove();
                        });
                    });
                });
            });
        </script>
        <script type="text/javascript">
            var validator = new FormValidator('myform', [{
                name: 'kode',
                display: 'required',
                rules: 'required'
            }, {
                name: 'nama',
                rules: 'alpha_numeric|required'
            }, {
                name: 'tmpt_lahir',
                rules: 'required'
            }, {
                name: 'tgl_lahir',
                rules: 'required'
            }, {
                name: 'foto',
                rules: 'is_file_type[png,jpg]|required'
            }, {
                name: 'alamat',
                rules: 'required'
            },{
                name: 'prov',
                rules: 'required'
            },{
                name: 'kab',
                rules: 'required'
            },{
                name: 'kec',
                rules: 'required'
            },{
                name: 'agama',
                rules: 'required'
            },{
                name: 'jenis',
                rules: 'required'
            },{
                name: 'pendidikan',
                rules: 'required'
            },{
                name: 'no_ktp',
                rules: 'required'
            },{
                name: 'tinggi_badan',
                rules: 'required'
            },{
                name: 'berat_badan',
                rules: 'required'
            },{
                name: 'nikah',
                rules: 'required'
            },{
                name: 'jml_anak',
                rules: 'required'
            },{
                name: 'bpk',
                rules: 'required'
            },{
                name: 'ibu',
                rules: 'required'
            }], function(errors, event) {
                if (errors.length > 0) {
                    var errorString = '';

                    for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
                        errorString += errors[i].message + '<br />';
                    }

                    el.innerHTML = errorString;
                }
            });    
        </script>
    </body>
</html>