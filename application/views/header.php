<!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="col-md-2"><img src="<?php echo logo();?>" height="50px" width="50px"></div>
                <div class="col-md-10">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo site_url('Home');?>">SiRETE | Online App</a>
                </div>
                
                
            </div>
            
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h3><?php echo get_name($this->session->userdata('no_ktp'),'nama_lengkap');?></h3></div>
                    <div class="email"><h4><?php echo strtoupper(get_name($this->session->userdata('no_ktp'),'role'));?> <?php if($this->session->userdata('role') !='rw' && $this->session->userdata('role') !='admin'){echo get_name($this->session->userdata('no_ktp'),'nama_rt');} ?> </h4></div>
                   
                </div>
            </div>
            <!-- #User Info -->