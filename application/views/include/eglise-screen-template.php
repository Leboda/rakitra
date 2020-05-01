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
        <style type="text/css">
            section.content{
                margin: 100px 15px 0 14px !important;
            }
        </style>
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
  
        <!-- #END# Search Bar -->
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>adminEglise/index.html"><?php echo $this->session->userdata('nom'); ?></a>
                </div>
            </div>
        </nav>
        <!-- #Top Bar -->
        <section>
            
        </section>

        <section class="content">
            <input type="hidden" name="base_url" class="base_url" value="<?php echo base_url(); ?>">
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
        <script src="<?php echo base_url(); ?>adminEglise/js/screen.js"></script>
        <script src="<?php echo base_url(); ?>adminEglise/js/pages/index.js"></script>

        <!-- Demo Js -->
        <script src="<?php echo base_url(); ?>adminEglise/js/demo.js"></script>
        <script src="<?php echo base_url(); ?>adminEglise/js/EgliseScript.js"></script>
    </body>

</html>