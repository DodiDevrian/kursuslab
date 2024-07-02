<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Data <?= $title?> ( <?= $materi->nama_materi?> )</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?=base_url('admin/pretest')?>">Pretest</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $title?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Isi Tabel Materi -->
            <div class="card-box mb-30">
                <div class="mb-30 pd-20 d-flex justify-content-between">
                    <h4 class="text-blue h4">Data <?= $title?></h4>
                    <a href="<?= base_url('admin/praktikan/add') ?>" class="btn btn-secondary">Tambah Data Soal +</a>
                </div>
                <div class="pb-20">
                <?php
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                }
                ?>
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>No</th>    
                                <th>Soal</th>
                                <th>Pilihan Jawaban</th>
                                <th>Jawaban Benar</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Mulai Foreach -->
                            <?php $no=1; foreach ($pretest as $key => $value) {
                                if ($value->id_materi == $id) { ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $value->soal?></td>
                                <td>
                                    <p>A. <?= $value->jawaban_a?></p>
                                    <p>B. <?= $value->jawaban_b?></p>
                                    <p>C. <?= $value->jawaban_c?></p>
                                    <p>D. <?= $value->jawaban_d?></p>
                                    <p>E. <?= $value->jawaban_e?></p>
                                </td>
                                <td><?= $value->jawaban_benar?></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('admin/asprak/edit/' . $value->id_pretest) ?>"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="<?= base_url('admin/asprak/delete/' . $value->id_pretest) ?>"><i class="dw dw-delete-3"></i> Delete</a>
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