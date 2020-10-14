<ul class="list">
    <li class="header">MENU WARGA</li>
    <li class="active">
        <a href="<?php echo site_url('Home'); ?>">
            <i class="material-icons">dashboard</i>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('Warga'); ?>">
            <i class="material-icons">people</i>
            <span>Data Warga</span>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('Warga/kepalakeluarga'); ?>">
            <i class="material-icons">house</i>
            <span>Kepala Keluarga</span>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('Home/status_pengajuan/'); ?>">
            <i class="material-icons">mail</i>
            <span>Status Pengajuan Surat</span>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('Home/iuran/'); ?>">
            <i class="material-icons">money</i>
            <span>Iuran Bulanan</span>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('Warga/profil/' . $this->session->userdata('no_ktp')); ?>">
            <i class="material-icons">person</i>
            <span>Profil</span>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('Keuangan/laporan/'); ?>">
            <i class="material-icons">book</i>
            <span>Laporan Keuangan RT</span>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('Home/statistik/' . get_rt_by_ktp($this->session->userdata('no_ktp'))); ?>">
            <i class="material-icons">assessment </i>
            <span>Statistik</span>
        </a>
    </li>
    <!--  <li>
                        <a href="<?php echo site_url('RW/laporan_keuangan/'); ?>">
                            <i class="material-icons">book</i>
                            <span>Laporan Keuangan RW</span>
                        </a>
                    </li> -->
    <li>
        <a href="<?php echo site_url('Home/update_password'); ?>">
            <i class="material-icons">lock</i>
            <span>Ganti Password</span>
        </a>
    </li>
    <?php if ($this->session->userdata('role') == 'Ketua') { ?>
        <li class="header">MENU PENGURUS RT</li>
        <li>
            <a href="<?php echo site_url('Panel_rt/email_rt/' . get_rt_by_ktp($this->session->userdata('no_ktp'))); ?>">
                <i class="material-icons">email</i>
                <span>Setting Email</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('Panel_rt/rt/' . get_rt_by_ktp($this->session->userdata('no_ktp'))); ?>">
                <i class="material-icons">dashboard</i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('Panel_rt/warga_rt/' . get_rt_by_ktp($this->session->userdata('no_ktp'))); ?>">
                <i class="material-icons">people</i>
                <span>Daftar Warga</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('Panel_rt/iuran_rt/' . get_rt_by_ktp($this->session->userdata('no_ktp'))); ?>">
                <i class="material-icons">money</i>
                <span>Iuran Bulanan</span>
            </a>
        </li>
        <!-- <li>
            <a href="<?php echo site_url('Panel_rt/statistik/' . get_rt_by_ktp($this->session->userdata('no_ktp'))); ?>">
                <i class="material-icons">assessment </i>
                <span>Statistik Warga</span>
            </a>
        </li> -->
        <li>
            <a href="<?php echo site_url('Panel_rt/surat/' . get_rt_by_ktp($this->session->userdata('no_ktp'))); ?>">
                <i class="material-icons">mail</i>
                <span>Surat Warga</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('Keuangan/'); ?>">
                <i class="material-icons">money</i>
                <span>Keuangan</span>
            </a>
        </li>
    <?php } else if ($this->session->userdata('role') == 'Bendahara') { ?>
        <li class="header">MENU PENGURUS RT</li>

        <li>
            <a href="<?php echo site_url('Panel_rt/rt/' . get_rt_by_ktp($this->session->userdata('no_ktp'))); ?>">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="<?php echo site_url('Panel_rt/iuran_rt/' . get_rt_by_ktp($this->session->userdata('no_ktp'))); ?>">
                <i class="material-icons">money</i>
                <span>Iuran Bulanan</span>
            </a>
        </li>

        <li>
            <a href="<?php echo site_url('Keuangan/'); ?>">
                <i class="material-icons">money</i>
                <span>Keuangan</span>
            </a>
        </li>
    <?php } else if ($this->session->userdata('role') == 'Sekretaris') { ?>

        <li class="header">MENU PENGURUS RT</li>

        <li>
            <a href="<?php echo site_url('Panel_rt/rt/' . get_rt_by_ktp($this->session->userdata('no_ktp'))); ?>">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('Panel_rt/warga_rt/' . get_rt_by_ktp($this->session->userdata('no_ktp'))); ?>">
                <i class="material-icons">person</i>
                <span>Daftar Warga</span>
            </a>
        </li>

        <!-- <li>
            <a href="<?php echo site_url('Panel_rt/statistik/' . get_rt_by_ktp($this->session->userdata('no_ktp'))); ?>">
                <i class="material-icons">assessment </i>
                <span>Statistik Warga</span>
            </a>
        </li> -->

    <?php } else if ($this->session->userdata('role') == 'rw') { ?>

        <li class="header">MENU PENGURUS RW</li>

        <li>
            <a href="<?php echo site_url('RW'); ?>">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('RW/statistik'); ?>">
                <i class="material-icons">person</i>
                <span>Statistik Warga</span>
            </a>
        </li>

        <!--  <li>
                        <a href="<?php echo site_url('RW/keuangan'); ?>">
                            <i class="material-icons">money </i>
                            <span>Keuangan RW</span>
                        </a>
                    </li> -->

    <?php } else if ($this->session->userdata('role') == 'admin') { ?>

        <li class="header">MENU ADMIN</li>

        <li>
            <a href="<?php echo site_url('Admin'); ?>">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
            </a>
        </li>


    <?php } else {
    }; ?>

    <li><a href="<?php echo site_url('Auth/LogOut/'); ?>">
            <i class="material-icons">input</i>
            <span>Logout</span>
        </a></li>


</ul>