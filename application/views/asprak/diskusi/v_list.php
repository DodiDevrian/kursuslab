<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Data Forum Diskusi</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Forum Diskusi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Isi Tabel Slider -->
            <div class="card-box mb-30">
                <div class="mb-30 pd-20 d-flex justify-content-between">
                    <h4 class="text-blue h4">Tabel Forum Diskusi</h4>
                </div>

                <div class="pb-20">
                <?php
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible m-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                }
                ?>
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>No</th>    
                                <th>Nama Pengirim</th>
                                <th>Diskusi</th>
                                <th>Jawaban</th>
                                <th>Praktikum</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Mulai Foreach -->
                            <?php $no=1; foreach ($diskusi as $key => $value) {
                                if ($value->id_asprak == $this->session->userdata('id_user')) { ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $value->nama_user?></td>
                                <td>
                                    <?= wordwrap($value->diskusi_user,45,"<br>\n");?><br>
                                    <img src="<?= base_url('upload/foto_diskusi/' . $value->foto_diskusi) ?>" alt="" width="200px">
                                </td>
                                <td>
                                    <?= wordwrap($value->diskusi_asprak,45,"<br>\n");?><br>
                                    <img src="<?= base_url('upload/foto_diskusi_asprak/' . $value->foto_diskusi_asprak) ?>" alt="" width="200px">
                                </td>
                                <td><?= $value->nama_kursus?></td>
                                <!-- <td><img src="<?= base_url() ?>upload/foto_slider/<?= $value->foto_slider?>" alt="" width="350px"></td> -->
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <!-- <a class="dropdown-item" href="<?= base_url('asisten/diskusi/edit/' . $value->id_diskusi) ?>"><i class="dw dw-chat-11"></i> Jawab</a>
                                            <a class="dropdown-item" href="<?= base_url('asisten/diskusi/delete/' . $value->id_diskusi) ?>"><i class="dw dw-delete-3"></i> Delete</a> -->
                                            <a class="dropdown-item" type="button" data-toggle="modal" data-target="#jawabDiskusi<?= $value->id_diskusi?>"><i class="dw dw-chat-11"></i> Jawab</a>
                                            <a class="dropdown-item" type="button" data-toggle="modal" data-target="#exampleModal"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php }} ?>
                            <!-- End Foreach -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

<?php foreach ($diskusi as $key => $value) { ?>
    <!-- Modal Jawab Diskusi -->
    <div class="modal fade" id="jawabDiskusi<?= $value->id_diskusi?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Jawab diskusi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="margin-bottom: 2rem;">Pengirim : <?= $value->nama_user?></p>
                <label for="">Pertanyaan : </label><br>
                <?= $value->diskusi_user?>
                <?php
                    if (isset($error_upload)) {
                        echo '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                    }
                    echo form_open_multipart('asisten/diskusi/edit/'. $value->id_diskusi);
                ?>
                <div class="form-group mt-5">
                    <label>Isi Jawaban</label>
                    <textarea class="form-control" type="text" name="diskusi_asprak" placeholder="Masukkan Jawaban"><?= $value->diskusi_asprak?></textarea>
                    <!-- <input class="form-control" name="diskusi_asprak" type="text" placeholder="Masukkan Jawaban"> -->
                    <?= form_error('diskusi_asprak', '<div class="text-danger small">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Upload Gambar <span style="color: red;">*Optional</span></label>
                    <input type="file" class="form-control-file form-control height-auto" name="foto_diskusi_asprak">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php foreach ($diskusi as $key => $value) { ?>
    <!-- Modal delete -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
<?php } ?>