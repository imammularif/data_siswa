<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#detail<?= $siswa->nis ?>"><i class="fa fa-eye"> Detail</i></button>
      <div class="modal fade" id="detail<?=$siswa->nis ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header badge-primary">
              <h4 class="modal-title">Detail Data siswa <strong><?= $siswa->nama_siswa?></strong></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered table-striped">
                <tr>
                  <th>NIS</th>
                  <td><?= $siswa->nis ?></td>
                </tr>
                <tr>
                  <th>Nama Siswa</th>
                  <td><?= $siswa->nama_siswa ?></td>
                </tr>
                <tr>
                  <th>Kelas</th>
                  <td><?= $siswa->kelas ?></td>
                </tr>
                <tr>
                  <th>Jenis Kelamin</th>
                  <td><?= $siswa->jenis_kelamin ?></td>
                </tr>
                <tr>
                  <th>Tempat Lahir</th>
                  <td><?= $siswa->tempat_lahir ?></td>
                </tr>
                <tr>
                  <th>No. HP Siswa</th>
                  <td><?= $siswa->hp_siswa ?></td>
                </tr>
                <tr>
                  <th>No. HP Orang Tua</th>
                  <td><?= $siswa->hp_ortu ?></td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td><?= $siswa->alamat ?></td>
                </tr>
                
              </table>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
