<div class="col-xl-12 col-md-6 mb-4">
    <p><a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success">
        <i class="fa fa-plus"></i>Tambah</a></p>

<?php
if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Username - Level</th>
            <th>Gambar</th>
            <th>Keterangan</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($user as $user){ ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $user->nama ?></td>
            <td><?php echo $user->email ?></td>
            <td><?php echo $user->username ?> - <?php echo $user->akses_level ?></td>
            <td>
                <?php if ($user->photo != "") { ?>
                    <img src="<?= base_url('gambar/upload/imguser/'.$user->photo) ?>" class="img img-thumbnail" width="60" height="90">
                    <?php }else{echo "Tidak Ada"; } ?></td>
        
        <td><?php echo $user->keterangan ?></td>
        <td>
            <a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>
                <?php include ('delete.php'); ?>
            </td>
        </tr>
        <?php $i ++;} ?>
    </tbody>
</table>
</div>