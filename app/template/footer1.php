<!-- jQuery 2.0.2 -->
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
            <!-- Bootstrap -->
            <script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
            <!-- AdminLTE App -->
            <script src="../../assets/js/AdminLTE/app.js" type="text/javascript"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="../../assets/js/AdminLTE/demo.js" type="text/javascript"></script>
            <!--Select2-->
            <<script src="../../assets/js/select2.js" type="text/javascript"></script>
            <<script src="../../assets/js/select2.min.js" type="text/javascript"></script>
            <!-- InputMask -->
            <script src="../../assets/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
            <script src="../../assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
            <script src="../../assets/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
            <script type="text/javascript">
                $(function() {
                    //Datemask dd/mm/yyyy
                    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                    //Select2 
                    $(document).ready(function() {
                        $("#kec").select2();
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