
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
                    <a href="<?= base_url('siswa/tambah') ?>" class="btn btn-primary dim">
                        <i class="fa fa-plus"></i> Tambah Siswa
                    </a>
                        
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Jenis Kelamin</th>
                                <th>No.Hp Ortu</th>
                                <th>Alamat</th>
                                <th>Photo</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($siswa as $siswa) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $siswa->nis ?></td>
                                <td><?= $siswa->nama_siswa ?></td>
                                <td><?= $siswa->kelas ?></td> 
                                <td><?= $siswa->jenis_kelamin ?></td>
                                <td><?= $siswa->hp_ortu ?></td>
                                <td><?= $siswa->alamat ?></td>
                                <td><?php if ($siswa->photo !== ""){?>
                                    <img src="<?= base_url('asset/upload/siswa/'.$siswa->photo)?>" class="img img-thumbnail" width="60" height="90">
                                <?php }else{ echo"Tidak Ada";}?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('siswa/edit/'.$siswa->nis) ?>" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a href="<?= base_url('siswa/delete/'.$siswa->nis) ?>" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                    <?php include 'detail.php'; ?>
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


