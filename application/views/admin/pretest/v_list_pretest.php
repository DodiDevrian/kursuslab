<?php $this->session->set_userdata('halaman_soal', current_url()); ?>

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
                    <a href="<?= base_url('admin/pretest/add/' . $materi->id_materi) ?>" class="btn btn-secondary">Tambah Soal +</a>
                </div>
                <div class="pb-20 row">
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    ?>
                        <div class="pd-20 col-md-8">
                            <h4>Soal dan Pilihan Jawaban</h4>
                            <?php $no=1; foreach ($pretest as $key => $value) {
                                        if ($value->id_materi == $id) { ?>
                            <div>
                                <div><?=$no++?>. <?= $value->soal?></div>
                                <div class="pl-20 mt-3">
                                    <ul>
                                        <li class="mb-2">A. <?= $value->jawaban_a?></li>
                                        <li class="mb-2">B. <?= $value->jawaban_b?></li>
                                        <li class="mb-2">C. <?= $value->jawaban_c?></li>
                                        <li class="mb-2">D. <?= $value->jawaban_d?></li>
                                        <li class="mb-2">E. <?= $value->jawaban_e?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mt-3 col-sm-9">
                                    <a href="<?= base_url('admin/pretest/edit/' . $value->id_pretest) ?>" class="ml-5 btn btn-secondary"><i class="dw dw-edit2"></i> Edit</a>
                                    <a href="<?= base_url('admin/pretest/delete/' . $value->id_pretest) ?>" class="btn btn-danger"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                            <hr>
                            <?php  }} ?>
                        </div>

                        <div class="col-md-4 pd-20">
                            <h4>Kunci Jawaban : </h4>
                            <table class="mt-3">
                                <tr>
                                    <td>1. </td>
                                    <td>A</td>
                                </tr>
                                <tr style="height: 30px;">
                                    <td>2. </td>
                                    <td>A</td>
                                </tr>
                                <tr style="height: 30px;">
                                    <td>3. </td>
                                    <td>A</td>
                                </tr>
                                <tr style="height: 30px;">
                                    <td>4. </td>
                                    <td>A</td>
                                </tr>
                                <tr style="height: 30px;">
                                    <td>5. </td>
                                    <td>A</td>
                                </tr>
                            </table>
                            <div class="mt-3">
                                <a class="btn btn-info" href="">Buat Kunci Jawaban</a>
                            </div>
                        </div>
                </div>
            </div>
            
        </div>