<?php $this->session->set_userdata('dosen_materi', current_url()); ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4><?= $kursus->nama_kursus ?></h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('dosen/kursus') ?>">Kursus</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $kursus->nama_kursus ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Isi Tabel Materi -->
            <div class="card-box mb-30">
                <div class="mb-30 pd-20 d-flex justify-content-between">
                    <h4 class="text-blue h4">Data Materi</h4>
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
                                <th>Nama Materi</th>
                                <th>Id Youtube</th>
                                <th>File</th>
                                <th>Catatan</th>
                                <th class="datatable-nosort">Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Mulai Foreach -->
                            <?php foreach ($materi as $key => $value) {
                                if ($value->id_kursus == $id) { ?>
                            <tr>
                                <td><?= $value->nama_materi?></td>
                                <td><a class="dropdown-item" type="button" data-toggle="modal" data-target="#viewVideo<?= $value->id_materi?>"><i class="icon-copy dw dw-video-player"></i> Lihat Video Materi</a></td>
                                <td><a class="dropdown-item" type="button" data-toggle="modal" data-target="#viewMateri<?= $value->id_materi?>"><i class="icon-copy dw dw-file"></i> Lihat Modul</a></td>
                                <td>
                                    <?php if ($value->note != '') { ?>
                                        <?= wordwrap($value->note,35,"<br>\n");?>
                                    <?php } ?>
                                </td>
                                <td class="status">
                                    <div>
                                        <?php if ($value->status == 1) { ?>
                                            <span class="badge badge-pill badge-danger">Belum Diterima</span>
                                        <?php }else { ?>
                                            <span class="badge badge-pill badge-success">Diterima</span>
                                        <?php }  ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" type="button" data-toggle="modal" data-target="#exampleModal<?= $value->id_materi?>"><i class="dw dw-edit2"></i> Edit Status dan Catatan</a>
                                            <a class="dropdown-item" href="<?= base_url('dosen/pretest/soal/' . $value->id_materi) ?>"><i class="dw dw-eye"></i> Lihat Soal Pretest</a>
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

        <!-- Modal -->
        <?php foreach ($materi as $key => $value) { ?>
        <div class="modal fade" id="exampleModal<?= $value->id_materi?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Status Materi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('dosen/kursus/edit_status/'. $value->id_materi); ?>
                        <div class="form-group">
							<label>Catatan</label>
							<input class="form-control" value="<?= $value->note ?>" name="note" type="text" placeholder="Masukkan Catatan" required>
                            <?php echo form_error('note', '<div class="text-danger small">', '</div>') ?>
						</div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" <?php if ($value->status == 1) { ?> checked <?php } ?>>
                            <label class="form-check-label" for="exampleRadios1">
                                Belum Diterima
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="2" <?php if ($value->status == 2) { ?> checked <?php } ?>>
                            <label class="form-check-label" for="exampleRadios2">
                                Diterima
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

    <div class="modal fade" id="viewMateri<?= $value->id_materi?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modul <?= $value->nama_materi?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="<?= base_url('upload/doc_materi/' . $value->doc_materi)?>" width="100%" height="750"></iframe>
                </div>
            </div>
        </div>
    </div>
        <?php } ?>

        <?php $no=1; foreach ($materi as $key => $value) {
            if ($value->id_kursus == $id) { ?>
        <div class="modal fade" id="viewVideo<?= $value->id_materi?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe style="aspect-ratio: 16/9; width: 100%;" src="https://www.youtube.com/embed/<?= $value -> id_yt ?>" title="<?= $value -> nama_materi ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
        <?php }} ?>

