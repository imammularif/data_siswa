
<body>
    <div id="wrapper ">
        <nav class="navbar-default navbar-static-side " role="navigation">
            <div class="sidebar-collapse ">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>

                        <?php

                        if($this->session->userdata('akses_level') == "TU"){
                            $tu = $this->session->userdata('username');
                            $user_aktif = $this->Pegawai_model->detail($tu);
                            ?>
                            <img alt="image" class="img-circle" src="<?= base_url('asset/upload/pegawai/'.$user_aktif->photo)?>" 
                            width="50px"/>
                             </span>
                             <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= $user_aktif->nama_pegawai ?></strong>
                             </span> <span class="text-muted text-xs block"><?= $this->session->userdata('akses_level') ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="<?= base_url('login/logout')?>">Logout</a></li>
                            </ul>
                        
                        <?php
                        }if($this->session->userdata('akses_level') == "Guru"){
                            $guru = $this->session->userdata('username');
                            $user_aktif = $this->Pegawai_model->detail($guru);?>
                            <img alt="image" class="img-circle" src="<?= base_url('asset/upload/pegawai/'.$user_aktif->photo)?>" 
                            width="50px"/>
                             </span>
                             <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= $user_aktif->nama_pegawai ?></strong>
                             </span> <span class="text-muted text-xs block"><?= $this->session->userdata('akses_level') ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="<?= base_url('login/logout')?>">Logout</a></li>
                            </ul>

                        <?php
                        }if($this->session->userdata('akses_level') == "SISWA"){
                            $siswa = $this->session->userdata('username');
                            $user_aktif = $this->Siswa_model->detail($siswa);?>
                            <img alt="image" class="img-circle" src="<?= base_url('asset/upload/siswa/'.$user_aktif->photo)?>" 
                            width="50px"/>
                             </span>
                             <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= $user_aktif->nama_siswa ?></strong>
                             </span> <span class="text-muted text-xs block"><?= $this->session->userdata('akses_level') ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="<?= base_url('login/logout')?>">Logout</a></li>
                            </ul>
                        <?php
                        }
                        ?>
                            
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    