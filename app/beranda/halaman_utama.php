<?php include "../../template/header_home.php"; ?>
<body id="page-top" class="index">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top"><img src="../../assets/img_home/qafco.png" align="absmiddle" style="margin-top:-35px; z-index: 20;">  </a><hr>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
					
					<li class="page-scroll fontsforweb_fontid_museo">
                        <a href="#about">About</a>
                    </li>
					
                    <li class="page-scroll fontsforweb_fontid_museo">
                        <a href="#portfolio">Gallery</a>
                    </li>
                    
                    <li class="page-scroll fontsforweb_fontid_museo">
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
		<!-- Heading Row -->
		<br><br><br>
        <div class="row">
            <div class="col-md-8">
                <!-- Carousel -->
				<div class="bs-example">
					<div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
						<!-- Carousel indicators -->
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
							<li data-target="#myCarousel" data-slide-to="3"></li>
						</ol>   
      
				<!-- Carousel items -->
						<div class="carousel-inner">
							<div class="active item">	
								<div>
									<img src="../../assets/images_home/demo/11_b.jpg" alt="Generic placeholder image">
								</div>
								<div class="carousel-caption">
									<h3>Making Bad</h3>
									<p>Salah satu bentuk pelatihan BLK PT. QAFCO.</p>
								</div>
							</div>

                            <div class="item">   
                                <div>
                                    <img src="../../assets/images_home/demo/12_b.jpg" alt="Generic placeholder image">
                                </div>
                                <div class="carousel-caption">
                                    <h3>First slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>

                            <div class="item">   
                                <div>
                                    <img src="../../assets/images_home/demo/2_b.jpg" alt="Generic placeholder image">
                                </div>
                                <div class="carousel-caption">
                                    <h3>First slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
           
							<div class="item">
								<div>
									<img src="../../assets/images_home/demo/4_b.jpg" alt="Generic placeholder image">
								</div>
								<div class="carousel-caption">
									<h3>Second slide label</h3>
									<p>Aliquam sit amet gravida nibh, facilisis gravida odio.</p>
								</div>
							</div>
						</div>
        
						<!-- Carousel nav -->
						<a class="carousel-control left" href="#myCarousel" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="carousel-control right" href="#myCarousel" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					</div>
				</div>
			</div>
			
            <!-- /.col-md-8 -->
            <div class="col-md-4">
				<h1 class="fontsforweb_fontid_museo">your  management business</h1>
                <p class="fontsforweb_fontid_museo">You can login here to access your business plan</p>
                <div class="panel panel-default">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-lock"></span> Login</div>
					<div class="panel-body">
                    
					<form method="post" action="../../config/check.php" autocomplete="off">
                        <?php
                            if (isset($_GET['msg'])) {
                                if ($_GET['msg'] == 'err_login') {
                                    ?>
                               <div class="alert alert-warning alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>Maaf</strong>, Email dan Password Anda salah.
                                </div>
                            <?php }else if($_GET['msg'] == 'err_login_1'){
                                ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>Maaf</strong>, Anda tidak diperkenankan mengakses halaman tersebut.
                                </div>
                                <?php
                                }
                            } 
                            ?>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Username</label>
							
							<div class="col-sm-9">
								<input type="text" class="form-control" placeholder="Username" name="user" required="require">					
							</div>
						</div>

						<div class="form-group">
							<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                        
							<div class="col-sm-9">															
								 <input type="password" class="form-control" placeholder="Password" name="pass" required="require">
							</div>
						</div>
        
                        <label></label>
						
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<input type="submit" name="submit" class="btn btn-primary btn-sm" value="Sign In"/>
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
							</div>
						</div>
                    </form>
                </div>
                
				<div class="panel-footer">
                    <span class="margin-right-10">2014 © PT QAFCO. ALL Rights Reserved.</span> </div>
				</div>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->


    <!-- About Section -->
	<br><br>
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="fontsforweb_fontid_museo">Description</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
				<div class="text-center">
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PT QAFCO adalah perusahaan jasa penempatan Tenaga Kerja Indonesia ke Luar Negeri yang berizinkan 
KEPMENNAKERTRANS No: 558 tahun 2012. Tanpa biaya awal, sitem potong gaji.
Negara - negara untuk penempatan Tenaga Kerja Indonesia adalah sebagai berikut :
- Malaysia.
- Singapore.
- Hongkong.
- Taiwan.  
                    </p>
                </div>
				</div>
				
                <!--<div class="col-lg-4">
				<div class="text-left">
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.
                    </p>
                </div>
				</div>-->
				
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="#" class="btn btn-lg btn-outline">Read more. . .</a>
                </div>
            </div>
        </div>
    </section>
	
	<!-- Portfolio Grid Section -->
        <section id="portfolio">
            <div class="container">
                <!-- Three columns of text below the carousel -->
                <div class="col-md-12">
                    <div class="row centero text-center">
                        <div class="col-md-4">
                            <div class="person">
                                <img class="img-circle" src="../../assets/images_home/demo/4_b.jpg">
                                <h3 class="fontsforweb_fontid_museo">PROFESSIONAL</h3>
                                <center><p>&nbsp;&nbsp;&nbsp;&nbsp; Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                </center>
                            </div>
                        </div><!-- /.col-lg-4 -->

                        <div class="col-md-4">
                            <div class="person">
                                <img class="img-circle" src="../../assets/images_home/demo/10_b.jpg">
                                <h3 class="fontsforweb_fontid_museo">SUITABLE</h3>
                                <center><p>&nbsp;&nbsp;&nbsp;&nbsp; Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                </center>
                            </div>
                        </div><!-- /.col-lg-4 -->

                        <div class="col-md-4">
                            <div class="person">
                                <img class="img-circle" src="../../assets/images_home/demo/1_b.jpg">
                                <h3 class="fontsforweb_fontid_museo">QUALITY</h3>
                                <center><p>&nbsp;&nbsp;&nbsp;&nbsp; Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                </center>
                            </div>
                        </div><!-- /.col-lg-4 -->
                    </div>
                </div>
				
				<div class="col-md-12">
                    <div class="col-md-12 fontsforweb_fontid_museo text-center" style=" font-size: 20px; color: black"
                         <h5 class="fontsforweb_fontid_museo">PHOTO GALLERY</h5> 
                    </div>
                    <div class="image_carousel fitcarousel">
                        <div id="foo2">
                            <img src="../../assets/images_home/demo/1_s.jpg" alt="" class="fancybox" href="../../assets/images_home/demo/1_b.jpg" data-fancybox-group="gallery" title="Ironing" />
                            <img src="../../assets/images_home/demo/2_s.jpg" alt="" class="fancybox" href="../../assets/images_home/demo/2_b.jpg" data-fancybox-group="gallery" title="Jompo" />
                            <img src="../../assets/images_home/demo/3_s.jpg" alt="" class="fancybox" href="../../assets/images_home/demo/3_b.jpg" data-fancybox-group="gallery" title="Lab. Bahasa" />
                            <img src="../../assets/images_home/demo/4_s.jpg" alt="" class="fancybox" href="../../assets/images_home/demo/4_b.jpg" data-fancybox-group="gallery" title="Making Bad" />
                            <img src="../../assets/images_home/demo/5_s.jpg" alt="" class="fancybox" href="../../assets/images_home/demo/5_b.jpg" data-fancybox-group="gallery" title="Making Bad" />
                            <img src="../../assets/images_home/demo/6_s.jpg" alt="" class="fancybox" href="../../assets/images_home/demo/6_b.jpg" data-fancybox-group="gallery" title="Peralatan Dapur" />
                            <img src="../../assets/images_home/demo/7_s.jpg" alt="" class="fancybox" href="../../assets/images_home/demo/7_b.jpg" data-fancybox-group="gallery" title="Praktik Baby" />
                            <img src="../../assets/images_home/demo/8_s.jpg" alt="" class="fancybox" href="../../assets/images_home/demo/8_b.jpg" data-fancybox-group="gallery" title="Ruang Bermain" />
                            <img src="../../assets/images_home/demo/9_s.jpg" alt="" class="fancybox" href="../../assets/images_home/demo/9_b.jpg" data-fancybox-group="gallery" title="Ruang jompo" />
                            <img src="../../assets/images_home/demo/10_s.jpg" alt="" class="fancybox" href="../../assets/images_home/demo/10_b.jpg" data-fancybox-group="gallery" title="Ruang Kelas" />
                            <img src="../../assets/images_home/demo/11_s.jpg" alt="" class="fancybox" href="../../assets/images_home/demo/11_b.jpg" data-fancybox-group="gallery" title="Ruang Setrika" />
                            <img src="../../assets/images_home/demo/12_s.jpg" alt="" class="fancybox" href="../../assets/images_home/demo/12_b.jpg" data-fancybox-group="gallery" title="Vacum Cleaner" />
                        </div>
                        <div class="clearfix">
                        </div>
                        <a class="prev" id="foo2_prev" href="#"><span>prev</span></a>
                        <a class="next" id="foo2_next" href="#"><span>next</span></a>
                    </div>
                </div>

                
            </div><!-- /.row -->
        </section>

    <!-- Contact Section -->
        <section id="contact">
            <div class="container">
               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3952.875206038845!2d112.04466400000001!3d-7.803033999999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNDgnMTAuOSJTIDExMsKwMDInNDAuOCJF!5e0!3m2!1sid!2ssg!4v1419165857145"
                        width="1150" height="450" frameborder="0" style="border:0">
                </iframe>
            </div>
        </section>

<?php include "../../template/footer_home.php"; ?>
