
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
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example text-center " >
                        <thead>
                            <tr>
                                <th width="15%">No</th>
                                <th>Siswa</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $id_kelas = $this->uri->segment(3);
                            $no=1; foreach ($siswa  as $siswa) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $siswa->nama_siswa ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('nilai/tambah?id_kelas='.$id_kelas.'&nis='.$siswa->nis.'') ?>" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i> Beri Nilai
                                    </a>
                                    
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


