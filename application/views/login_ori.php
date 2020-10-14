<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistem Informasi Warga| <?php echo get_setting('komplek');?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('assets');?>/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets');?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets');?>/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('assets');?>/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets');?>/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo" style="width: 100%; color: white;"><center>
            <h3>SISTEM INFORMASI WARGA </h3>
            <h5><?php echo get_setting('komplek');?></h5>
            </center>
        </div>
        <div class="card">
            <div class="body">
                 <?php $data = $this->session->flashdata('error'); 
                  if ($data!=""){
                  ?>
                  <div class="card">
                    <div class="body bg-red">
                        <?=$data ;?>
                    </div>
                                           
                    </div>
                  <?php };?>
                <form id="sign_in" action="<?php echo site_url('Auth/doLogin');?>" method="POST">
                    <div class="msg">Gunakan NIK KTP anda untuk Login</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="NIK" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password Anda" required>
                        </div>
                    </div>
                    <div class="row">
                       
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-green waves-effect" type="submit">LOGIN</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <div>
        <footer>
        <center> &copy; <?php echo date('Y');?> Gugah Nugraha</center>
    </footer>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('assets');?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('assets');?>/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url('assets');?>/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url('assets');?>/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url('assets');?>/js/admin.js"></script>
    <script src="<?php echo base_url('assets');?>/js/pages/examples/sign-in.js"></script>
</body>

</html>