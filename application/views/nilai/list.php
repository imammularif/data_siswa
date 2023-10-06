<?php
if($_GET['id_kelas']==""){
    redirect(base_url('nilai/kelas'),'refresh');
}
$id_kelas = $_GET['id_kelas'];
$mapel = $this->Mapel_model->cariGuru($this->session->userdata('username'));

$nilai = $this->Nilai_model->detail2($mapel->id_pelajaran);
$siswa = $this->Siswa_model->nilaiList($id_kelas);


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
                <a href="<?= base_url('nilai/laporan_pdf/'.$id_kelas) ?>" class="btn btn-success btn-sm">
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
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Rata-Rata Nilai Tugas</th>
                                <th class="text-center">UTS</th>
                                <th class="text-center">UAS</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($siswa  as $siswa) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $siswa->nis ?></td>
                                <td><?= $siswa->nama_siswa ?></td>
                                <td><?= $siswa->kelas ?></td>
                                <?php 
                                $nilai = $this->db->get_where('nilai',['id_pelajaran'=>$mapel->id_pelajaran,
                                'nis'=>$siswa->nis])->row();
                                if(empty($nilai)){
                                    echo "<td>0</td>";
                                        echo "<td>0</td>";
                                        echo "<td>0</td>";
                                        echo "<td>0</td>";
                                }else{
                                    if($nilai->nis == $siswa->nis){
                                        echo "<td>".$nilai->tugas."</td>";
                                        echo "<td>".$nilai->uts."</td>";
                                        echo "<td>".$nilai->uas."</td>";
                                        echo "<td>".$nilai->nilai."</td>";
                                    }else{
                                        echo "<td>0</td>";
                                        echo "<td>0</td>";
                                        echo "<td>0</td>";
                                        echo "<td>0</td>";
                                    
                                    }
                                }
                                ?>
                                
                                <td class="text-center">
                                    <?php if(empty($nilai)){ ?>
                                    <button class="btn btn-primary btn-sm">
                                        Tidak bisa diedit
                                    </button>
                                    <?php }else{ ?>
                                    <a href="<?= base_url('nilai/edit/'.$nilai->id_nilai) ?>" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <?php } ?>
                                    
                                </td>
                            </tr>
                            <?php $no++; } ?>
                        </table>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>


