<!-- Footer -->
    <footer class="text-center">
            <div class="footer-above">
                <div class="container">
                    <div class="row">
                        <div class="footer-col col-md-4">
                            <h3>Location</h3>
                            <p class="fontsforweb_fontid_museo"> <b>MANAGER PT QAFCO</b> 
                                <br> Jl. Achmad Yani  
                                <br> No. 19, Gresik (61219)
                                <br> <img src="../assets/img_home/tp.png"/> Telp. / Fax : (031) 8953008</p>
                        </div>
                        <div class="footer-col col-md-4">
                            <div class="hidden-xs">
                                <a class="navbar-brand sf-shadow" href="#page-top"><img src="../assets/img_home/qafco.png" style="margin-top:-50px; width:330px; height:150px;"> </a>
                            </div>
                        </div>
                        <div class="footer-col col-md-4">
							<h3>About PT QAFCO PLAN</h3>
							<p>PT QAFCO merupakan salah satu perusahaan dari.. <a href="#">qafco_gresik.com</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-below">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            Copyright &copy; PT QAFCO - GRESIK 2014
                        </div>
                    </div>
                </div>
            </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visble-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery Version 1.11.0 -->

	<script src="../assets/js_home/jquery-1.11.0.js"></script>
    <!-- Bootstrap Core JavaScript -->

	<script src="../assets/js_home/bootstrap.min.js"></script>
	
    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

	<script src="../assets/js_home/classie.js"></script>
	<script src="../assets/js_home/cbpAnimatedHeader.js') }}"></script>

    <!-- Contact Form JavaScript -->

	<script src="../assets/js_home/jqBootstrapValidation.js"></script>
	
    <!-- Custom Theme JavaScript -->

	<script src="../assets/js_home/freelancer.js"></script>
	
	<!-- Custom Theme JavaScript -->
        <script src="../assets/js_home/source/jquery.carouFredSel-6.0.5-packed.js"></script>
        <script type='text/javascript' src="../assets/js_home/source/jquery.fancybox.js?v=2.1.5"></script>
        <script type='text/javascript' src="../assets/js_home/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type='text/javascript' src="../assets/js_home/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
        <script type='text/javascript' src="../assets/js_home/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
        
        <script type="text/javascript">
    $(document).ready(function() {
        /*
         *  Simple image gallery. Uses default settings
         */

        $('.fancybox').fancybox();

        /*
         *  Different effects
         */

        // Change title type, overlay closing speed
        $(".fancybox-effects-a").fancybox({
            helpers: {
                title: {
                    type: 'outside'
                },
    overlay: {
         speedOut: 0
                }
            }
        });

         // Disable opening and closing animations, change title type
        $(".fancybox-effects-b").fancybox({
            openEffect: 'none',
        closeEffect: 'none',
            helpers: {
                title: {
                    type: 'over'
                }
                }
        });

            // Set custom style, close if clicked, change title type and overlay color
        $(".fancybox-effects-c").fancybox({
            wrapCSS: 'fancybox-custom',
        closeClick: true,
            openEffect: 'none',
            helpers: {
                title: {
                type: 'inside'
                },
                    overlay: {
            css: {
        'background': 'rgba(238,238,238,0.85)'
                    }
                }
        }
        });

            // Remove padding, set opening and closing animations, close if clicked and disable overlay
                $(".fancybox-effects-d").fancybox({             padding: 0,
                    openEffect: 'elastic',
                openSpeed: 150,
                    closeEffect: 'elastic',
                        closeSpeed: 150,
            closeClick: true,
                    helpers: {
                overlay: null
            }
        });

        /*
        *  Button helper. Disable animations, hide close button, change title type and content
         */

            $('.fancybox-buttons').fancybox({
            openEffect: 'none',
            closeEffect: 'none',
            prevEffect: 'none',             nextEffect: 'none',
            closeBtn: false,
            helpers: {
                title: {
        type: 'inside'
         },
                buttons: {}
            },
            afterLoad: function() {
            this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
            }
        });


        /*
                    *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
         */

                $('.fancybox-thumbs').fancybox({
            prevEffect: 'none',
            nextEffect: 'none',
                closeBtn: false,
            arrows: false,
            nextClick: true,
            helpers: {                 thumbs: {
        width: 50,
                     height: 50
                }
            }
        });

        /*
            *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
            */         $('.fancybox-media')
            .attr('rel', 'media-gallery')
            .fancybox({
            openEffect: 'none',
                    closeEffect: 'none',
                    prevEffect: 'none',
            nextEffect: 'none',
         arrows: false,
                    helpers: {
                        media: {},
         buttons: {}
        }
                });

        /*
         *  Open manually
                */

                    $("#fancybox-manual-a").click(function() {
                    $.fancybox.open('1_b.jpg');         });

                    $("#fancybox-manual-b").click(function() {
                    $.fancybox.open({
                    href: 'iframe.html',
                        type: 'iframe',
                        padding: 5
            });
        });

        $("#fancybox-manual-c").click(function() {
             $.fancybox.open([
             {
        href: '1_b.jpg',
            title: 'My title'
        }, {
        href: '2_b.jpg',
            title: '2nd title'
                }, {
                href: '3_b.jpg'
                }
                ], {
            helpers: {
        thumbs: {
                        width: 75,
            height: 50
                    }
                }
                    });
        });


    });
        </script>

</body>

</html>