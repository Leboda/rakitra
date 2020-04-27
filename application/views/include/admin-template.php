<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Rakitra | <?php echo $title; ?></title>
        <!-- Favicon-->
        <link rel="icon" href="<?php echo base_url(); ?>sources/img/favicon.png" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="<?php echo base_url(); ?>adminEglise/css/css.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>adminEglise/css/icon.css" rel="stylesheet">

        <!-- Bootstrap Core Css -->
        <link href="<?php echo base_url(); ?>adminEglise/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="<?php echo base_url(); ?>adminEglise/plugins/node-waves/waves.css" rel="stylesheet" />

        <link href="<?php echo base_url(); ?>adminEglise/plugins/morrisjs/morris.css" rel="stylesheet" />
        <!-- Animation Css -->
        <link href="<?php echo base_url(); ?>adminEglise/plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="<?php echo base_url(); ?>adminEglise/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>adminEglise/css/jquery-ui.css" rel="stylesheet">

        <!-- adminEglise Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="<?php echo base_url(); ?>adminEglise/css/themes/all-themes.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>adminEglise/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    </head>

    <body class="theme-red">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Veuillez patienter...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <!-- Search Bar -->
        <div class="search-bar">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text" placeholder="QUE CHERCHEZ-VOUS...?">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </div>
        <!-- #END# Search Bar -->
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>adminEglise/index.html">ADMIN RAKITRA - <?php echo $this->session->userdata('identity'); ?></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Call Search -->
                        <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                        
                        <li class="pull-right"><a title="Déconnexion" href="<?php echo base_url(); ?>logout"><i class="material-icons">input</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->
                <div class="user-info">
                    <div class="image">
                        <img src="<?php echo base_url(); ?>adminEglise/images/user.png" width="48" height="48" alt="User" />
                    </div>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('firstname'); ?></div>
                        <div class="email"><?php echo $this->session->userdata('email'); ?></div>
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);"><i class="material-icons">person</i>Mon profil</a></li>
                                <li><a href="<? echo base_url(); ?>user-logout"><i class="material-icons">input</i>Déconnexion</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #User Info -->
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin-page">
                                <i class="material-icons">home</i>
                                <span>Tableau de bord</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>eglise-manage">
                                <i class="material-icons">home</i>
                                <span>Eglise</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>transcation-manage">
                                <i class="material-icons">attach_money</i>
                                <span>Transaction</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>api-manage">
                                <i class="material-icons">person</i>
                                <span>Api</span>
                            </a>
                        </li>
                        <!--li>
                            <a href="<?php echo base_url(); ?>user-manage">
                                <i class="material-icons">person</i>
                                <span>Utilisateur</span>
                            </a>
                        </li-->

                        <li>
                            <a href="<?php echo base_url(); ?>list-versement">
                                <i class="material-icons">attach_money</i>
                                <span>Versement</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- #Menu -->
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                         Copyright ® | 2020  <a href="https://www.univ-fianar.mg">Université de Fianarantsoa</a>
                    </div>
                </div>
                <!-- #Footer -->
            </aside>
            <!-- #END# Right Sidebar -->
        </section>

        <section class="content">
            <?php
            echo $contents;
            ?>
        </section>

        <!-- Jquery Core Js -->
        <script src="<?php echo base_url(); ?>adminEglise/plugins/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>adminEglise/plugins/jquery/jquery-ui.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="<?php echo base_url(); ?>adminEglise/plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <script src="<?php echo base_url(); ?>adminEglise/plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="<?php echo base_url(); ?>adminEglise/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo base_url(); ?>adminEglise/plugins/node-waves/waves.js"></script>


        <script src="<?php echo base_url(); ?>adminEglise/plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>adminEglise/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>adminEglise/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>adminEglise/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="<?php echo base_url(); ?>adminEglise/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>adminEglise/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>adminEglise/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>adminEglise/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>adminEglise/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

        <script src="<?php echo base_url(); ?>adminEglise/js/pages/tables/jquery-datatable.js"></script>
        <!-- Jquery CountTo Plugin Js -->
        <script src="<?php echo base_url(); ?>adminEglise/plugins/jquery-countto/jquery.countTo.js"></script>

        <!-- Morris Plugin Js -->
        <script src="<?php echo base_url(); ?>adminEglise/plugins/raphael/raphael.min.js"></script>
        <script src="<?php echo base_url(); ?>adminEglise/plugins/morrisjs/morris.js"></script>

        <!-- ChartJs -->
        <script src="<?php echo base_url(); ?>adminEglise/plugins/chartjs/Chart.bundle.js"></script>


        <!-- Sparkline Chart Plugin Js -->
        <script src="<?php echo base_url(); ?>adminEglise/plugins/jquery-sparkline/jquery.sparkline.js"></script>

        <!-- Custom Js -->
        <script src="<?php echo base_url(); ?>adminEglise/js/admin.js"></script>
        <script src="<?php echo base_url(); ?>adminEglise/js/pages/index.js"></script>

        <!-- Demo Js -->
        <script src="<?php echo base_url(); ?>adminEglise/js/demo.js"></script>
        <script src="<?php echo base_url(); ?>adminEglise/js/EgliseScript.js"></script>
    </body>

</html>