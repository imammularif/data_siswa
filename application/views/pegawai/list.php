
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
                    <a href="<?= base_url('pegawai/tambah') ?>" class="btn btn-primary dim">
                        <i class="fa fa-plus"></i> Tambah Pegawai
                    </a>
                        
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Hp</th>
                                <th>Alamat</th>
                                <th>Photo</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($pegawai as $pegawai) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $pegawai->nip ?></td>
                                <td><?= $pegawai->nama_pegawai ?></td>
                                <td><?= $pegawai->status ?></td> 
                                <td><?= $pegawai->jenis_kelamin ?></td>
                                <td><?= $pegawai->tempat_lahir ?></td>
                                <td><?= $pegawai->tanggal_lahir ?></td>
                                <td><?= $pegawai->hp ?></td>
                                <td><?= $pegawai->alamat ?></td>
                                <td><?php if ($pegawai->photo !== ""){?>
                                    <img src="<?= base_url('asset/upload/pegawai/'.$pegawai->photo)?>" class="img img-thumbnail" width="60" height="90">
                                <?php }else{ echo"Tidak Ada";}?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('pegawai/edit/'.$pegawai->nip) ?>" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a href="<?= base_url('pegawai/delete/'.$pegawai->nip) ?>" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Hapus
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


