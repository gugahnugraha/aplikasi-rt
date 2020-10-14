<!DOCTYPE html>
<html lang="en">

<head>
    <title>SiRETE | Online App</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" href="<?php echo base_url('assets'); ?>/favicon.ico" type="image/x-icon">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>login/vendors/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>login/vendors/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>login/vendors/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>login/vendors/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>login/vendors/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>login/vendors/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>



    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    GTT Residence RT 005
                </span>

                <!-- <form class="login100-form validate-form p-b-33 p-t-5" method="post" action="<?= base_url('auth'); ?>"> -->
                <form class="login100-form validate-form p-b-33 p-t-5" id=" sign_in" action="<?php echo site_url('Auth/doLogin'); ?>" method="POST">
                    <div class="wrap-input100 validate-input" data-validate="Masukkan NIK">
                        <input class="input100" type="text" name="username" placeholder="Username" ">
                    <span class=" focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Masukkan password">
                        <input class="input100" type="password" id="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        <div class="container-login100-form-btn">
                            <center><?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?></center>
                        </div>
                    </div>
                    <div class="container-login100-form-btn m-t-16">
                        <small class="text-red">
                            <center><?= $this->session->flashdata('message'); ?></center>
                        </small>
                    </div>
                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>

                        <div class="container-login100-form-btn">
                            <a class="small m-r-8" href="#"> Buat Akun? </a>

                            <a class="small m-l-8 text-center" href="#" data-toggle="modal" data-target="#exampleModal">Lupa Password?</a>

                        </div>

                        <div class="row m-t-16">
                            <footer>Copyright &#169; <?= date('Y') ?> | Gugah Nugraha</footer>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forgotten Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Kesulitan login karena lupa password, silakan hubungi administrator.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>


    <!--===============================================================================================-->
    <script src="<?= base_url('assets/'); ?>login/vendors/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/'); ?>login/vendors/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/'); ?>login/vendors/bootstrap/js/popper.js"></script>
    <script src="<?= base_url('assets/'); ?>login/vendors/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/'); ?>login/vendors/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/'); ?>login/vendors/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url('assets/'); ?>login/vendors/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/'); ?>login/vendors/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/'); ?>login/js/main.js"></script>

</body>


</html>