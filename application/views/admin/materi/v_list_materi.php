<?php $this->session->set_userdata('referred_from', current_url()); ?>

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
                                <li class="breadcrumb-item"><a href="#">Kursus</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $kursus->nama_kursus ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Isi Tabel Materi -->
            <div class="card-box mb-30">
                <div class="mb-5 pd-20 d-flex justify-content-between">
                    <div class="d-flex justify-content-start">
                        <a href="<?= base_url('admin/kursus')?>"><span class="micon dw dw-left-chevron-1"></span></a>
                        <h4 class="ml-2 text-blue h4">Data Materi</h4>
                    </div>
                    <a href="<?= base_url('admin/kursus/add_materi/' . $this->uri->segment(4)) ?>" class="btn btn-secondary">Tambah Data Materi +</a>
                </div>
                <div class="mb-20 ml-30 pl-20">
                    <table>
                        <tr>
                            <td>Dosen Pengampu</td>
                            <td>&nbsp;&nbsp;&nbsp; : <?= $kursus->nama_user ?></td>
                        </tr>
                        <tr>
                            <td>Email Dosen</td>
                            <td>&nbsp;&nbsp;&nbsp; : <?= $kursus->email ?></td>
                        </tr>
                    </table>
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
                                <th>Nama Materi</th>
                                <th>Id Youtube</th>
                                <th>File</th>
                                <th>Catatan</th>
                                <th>Status</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Mulai Foreach -->
                            <?php $no=1; foreach ($materi as $key => $value) {
                                if ($value->id_kursus == $id) { ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= wordwrap($value->nama_materi,35,"<br>\n");?></td>
                                <td><?= $value->id_yt?><br>
                                    <a class="mr-auto" type="button" data-toggle="modal" data-target="#exampleModal<?= $value->id_materi?>">
                                        <i style="font-size: 25px;" class="icon-copy fi-play-video"></i>
                                    </a>
                                </td>
                                <td><?= substr(strip_tags($value->doc_materi), 0, 30) ?>...</td>
                                <td><?= $value->note?></td>
                                <td>
                                    <?php if ($value->status == 1) { ?>
                                        <span class="badge badge-pill badge-danger">Belum Diterima Dosen</span>
                                    <?php }else { ?>
                                        <span class="badge badge-pill badge-success">Diterima Dosen</span>
                                    <?php }  ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('admin/kursus/edit_materi/' . $value->id_materi) ?>"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="<?= base_url('admin/kursus/delete_materi/' . $value->id_materi) ?>"><i class="dw dw-delete-3"></i> Delete</a>
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
        
        <?php $no=1; foreach ($materi as $key => $value) {
            if ($value->id_kursus == $id) { ?>
        <div class="modal fade" id="exampleModal<?= $value->id_materi?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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