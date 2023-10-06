<?php
$nis = $this->session->userdata('username');
$siswa = $this->Nilai_model->detail($nis);
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?= $title; ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li class="active">
                <strong><?= $title; ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
    
            
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="<?= base_url('nilai/laporan_pdf2/'.$nis) ?>" class="btn btn-success btn-sm">
                        <i class="fa fa-print"></i> Cetak pdf
                    </a>
                        
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example text-center " >
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">NIS</th>
                                <th class="text-center">Nama Siswa</th>
                                <th class="text-center">Mata Pelajaran</th>
                                <th class="text-center">Rata-Rata Nilai Tugas</th>
                                <th class="text-center">UTS</th>
                                <th class="text-center">UAS</th>
                                <th class="text-center">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($siswa  as $siswa) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $siswa->nis ?></td>
                                <td><?= $siswa->nama_siswa ?></td>
                                <td><?= $siswa->pelajaran ?></td>
                                <td><?= $siswa->tugas ?></td>
                                <td><?= $siswa->uts ?></td>
                                <td><?= $siswa->uas ?></td>
                                <td><?= $siswa->nilai ?></td>
                                
                            </tr>
                            <?php $no++; } ?>
                        </table>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>


