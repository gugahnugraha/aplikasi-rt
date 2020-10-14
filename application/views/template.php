<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistem Informasi Warga <?php echo get_setting('komplek');?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('assets');?>/favicon.ico" type="image/x-icon">
     <style type="text/css">
        input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
    </style>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets');?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
      <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url('assets');?>/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets');?>/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('assets');?>/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets');?>/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets');?>/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url('assets');?>/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">cari</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <?php include 'header.php';?>
            <!-- Menu -->
            <div class="menu">
                <?php include 'menu.php';?>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date('Y');?> <a href="javascript:void(0);">Gugah Nugraha</a>
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        
    </section>

    <section class="content">
        <div class="container-fluid">
            <?php $data = $this->session->flashdata('error');
if($data != ""){ ?>
<div class="alert bg-red alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?=$data ;?>
    <?php } ;?>
    <?php $data = $this->session->flashdata('sukses');
if($data != ""){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?=$data ;?>
    <?php } ;?>
</div>
            <?php include $content;?>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('assets');?>/plugins/jquery/jquery.min.js"></script>
      <!-- Jquery Validation Plugin Css -->
    <script src="<?php echo base_url('assets');?>/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="<?php echo base_url('assets');?>/plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('assets');?>/plugins/bootstrap/js/bootstrap.js"></script>
   

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url('assets');?>/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url('assets');?>/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url('assets');?>/plugins/node-waves/waves.js"></script>




 <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url('assets');?>/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>


    <!-- Custom Js -->
    <script src="<?php echo base_url('assets');?>/js/admin.js"></script>
    
    <script src="<?php echo base_url('assets');?>/js/pages/tables/jquery-datatable.js"></script>


    

    <!-- Demo Js -->
    <script src="<?php echo base_url('assets');?>/js/demo.js"></script>
    
    
</body>
    <script type="text/javascript">
        $(document).ready(function(){
            $('input[type=number]').on('mousewheel',function(e){ $(this).blur(); });
// Disable keyboard scrolling
$('input[type=number]').on('keydown',function(e) {
    var key = e.charCode || e.keyCode;
    // Disable Up and Down Arrows on Keyboard
    if(key == 38 || key == 40 ) {
    e.preventDefault();
    } else {
    return;
    }
});
        })
        
    </script>
</html>