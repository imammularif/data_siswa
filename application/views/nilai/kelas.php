
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
                                <th>Kelas</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($kelas  as $kelas) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $kelas->kelas ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('nilai/siswa/'.$kelas->id_kelas) ?>" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Pilih Kelas
                                    </a>
                                    <a href="<?= base_url('nilai?id_kelas='.$kelas->id_kelas) ?>" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i> Lihat nilai
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


