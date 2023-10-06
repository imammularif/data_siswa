              <?php if($this->session->userdata('akses_level')==="TU"){?>
              <li>
                        <a href="<?= base_url('welcome') ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li>
                        <a href="<?= base_url('pegawai') ?>"><i class="fa fa-user"></i> <span class="nav-label">Pegawai</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?= base_url('pegawai') ?>">Data Pegawai</a></li>
                            <li><a href="<?= base_url('pegawai/tambah') ?>">Tambah Data Pegawai</a></li>
                        </ul>
                </li>

                <li>
                    <a href="<?= base_url('siswa') ?>"><i class="fa fa-users"></i> <span class="nav-label">Data Siswa</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?= base_url('siswa') ?>">Data Siswa</a></li>
                        <li><a href="<?= base_url('siswa/tambah') ?>">Tambah Data siswa</a></li>
                    </ul>
                </li>

                <li>
                        <a href="<?= base_url('kelas') ?>"><i class="fa fa-send-o"></i> <span class="nav-label">Data Kelas</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?= base_url('kelas') ?>">Data Kelas</a></li>
                            <li><a href="<?= base_url('kelas/tambah') ?>">Tambah Kelas</a></li>
                        </ul>
                </li>

                 <li>
                        <a href="<?= base_url('mapel') ?>"><i class="fa fa-send-o"></i> <span class="nav-label">Mata Pelajaran</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                        <li><a href="<?= base_url('mapel') ?>">Data Mata Pelajaran</a></li>
                            <li><a href="<?= base_url('mapel/tambah') ?>">Tambah Mata Pelajaran</a></li>
                        </ul>
                </li>
                <?php }else if($this->session->userdata('akses_level')==="Guru"){ ?>
                
                <li>
                    <a href="<?= base_url('nilai') ?>"><i class="fa fa-send-o"></i> <span class="nav-label">Data Nilai Siswa</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?= base_url('nilai/kelas') ?>">Tambah Nilai Siswa</a></li>
                        <li><a href="<?= base_url('nilai') ?>">Data Nilai Siswa</a></li>
                    </ul>
                </li>
                
                <?php }else if($this->session->userdata('akses_level')==="SISWA"){ ?>

                <li>
                    <a href="<?= base_url('nilai/perorangan') ?>"><i class="fa fa-send-o"></i> <span class="nav-label">Raport</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                    <li><a href="<?= base_url('nilai/perorangan') ?>">Hasil Nilai Siswa</a></li>
                    </ul>
                </li>

                <?php }?>

            </ul>

            </div>
        </nav>


        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                
            </div>
            <ul class="nav navbar-top-links navbar-right">
                

                <li>
                    <a href="<?= base_url('login/changePassword')?>">
                        <i class="fa fa-key"></i> Ganti Password
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('login/logout')?>">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
               
            </ul>

        </nav>
    </div>
        