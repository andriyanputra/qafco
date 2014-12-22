<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PT. QAFCO</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../../assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link rel="icon" href="../../assets/img/favicon.ico" type="image/x-generic">
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="../../assets/css/iCheck/all.css" rel="stylesheet" type="text/css" />

        <style type="text/css" media="screen">
            .centered{
                float: none;
                margin: 0 auto;
            }
            .footer {
                position: relative;
                padding: 15px;
                background: #FFF;
                color: #000;
            }
            body {
                background: url('../../assets/img/blur-background04.jpg') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>
    </head>
        <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../beranda/index" class="logo">
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
                                    <img src="../../assets/img/avatar5.png" class="img-circle" alt="User Image" />
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
                                        <a href="../../config/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>