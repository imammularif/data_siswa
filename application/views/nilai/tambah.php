<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?= $title ?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <strong><?= $title ?></strong>
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
                            <h5>All form elements <small>With custom checbox and radion elements.</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <?php
                            $nis = $_GET['nis'];
                            $id_kelas = $_GET['id_kelas'];
                            $user = $this->session->userdata('username');
                            $guru = $this->Mapel_model->cekNilai($user);
                            $siswa = $this->Siswa_model->nilaiSiswa($id_kelas,$nis);
                            $mapel = $this->Mapel_model->data();


                            echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');
                            if(isset($error)){
                                echo '<div class="alert alert-warning">';
                                echo $error;
                                echo '</div>';
                            }

                            $atribut = array ('class' => 'form-horizontal');
                            //Open Form
                            echo form_open_multipart(base_url('nilai/tambah'),$atribut);
                            ?>
                            <input type="hidden" name="id_pelajaran" class="form-control" value="<?= $guru->id_pelajaran?>" >
                            <input type="hidden" name="nis" class="form-control" value="<?= $siswa->nis?>" >
                                <div class="form-group"><label class="col-sm-2 control-label">Mata Pelajaran</label>

                                    <div class="col-sm-4">
                                        <input type="text" name="pelajaran" class="form-control" value="<?= $guru->pelajaran?>" disabled>

                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama  Siswa</label>

                                    <div class="col-sm-4">
                                        <input type="text" name="pelajaran" class="form-control" value="<?= $siswa->nama_siswa?>" disabled>


                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Rata - Rata Nilai Tugas</label>

                                    <div class="col-sm-4">
                                        <input type="text" name="tugas" class="form-control" required>


                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nilai UTS</label>

                                    <div class="col-sm-4">
                                        <input type="text" name="uts" class="form-control" required>


                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nilai UAS</label>

                                    <div class="col-sm-4">
                                        <input type="text" name="uas" class="form-control" required>


                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2"> 
                                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                        <input type="reset" name="reset" class="btn btn-white" value="Reset">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<!-- Jasny -->
<script src="<?= base_url()?>asset/js/plugins/jasny/jasny-bootstrap.min.js"></script>

<!-- DROPZONE -->
<script src="<?= base_url()?>asset/js/plugins/dropzone/dropzone.js"></script>

<!-- CodeMirror -->
<script src="<?= base_url()?>asset/js/plugins/codemirror/codemirror.js"></script>
<script src="<?= base_url()?>asset/js/plugins/codemirror/mode/xml/xml.js"></script>


<!-- upload gambar dengan preview -->
<script>
    Dropzone.options.dropzoneForm = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br> (This is just a demo dropzone. Selected files are not actually uploaded.)"
    };

    $(document).ready(function(){

        var editor_one = CodeMirror.fromTextArea(document.getElementById("code1"), {
            lineNumbers: true,
            matchBrackets: true
        });

        var editor_two = CodeMirror.fromTextArea(document.getElementById("code2"), {
            lineNumbers: true,
            matchBrackets: true
        });

        var editor_two = CodeMirror.fromTextArea(document.getElementById("code3"), {
            lineNumbers: true,
            matchBrackets: true
        });

   });
</script>
<!-- end upload gambar dengan preview -->