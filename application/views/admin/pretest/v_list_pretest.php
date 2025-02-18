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
                <div class="mb-20 pd-20 d-flex justify-content-between">
                    <h4 class="text-blue h4">Data <?= $title?></h4>
                    <?php $sum=0; foreach ($pretest as $key => $value) {
                        if ($value->id_materi == $id) {
                            $sum +=1 ;
                        }
                    } ?>

                    <?php if ($sum < 10) { ?>
                        <a href="<?= base_url('admin/pretest/add/' . $materi->id_materi) ?>" class="btn btn-secondary">Tambah Soal +</a>
                    <?php } ?>
                </div>
                <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible m-3">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    ?>
                <div class="pb-20 row">
                    
                        <div class="col-md-8" style="padding: 35px;">
                            <h4>Soal dan Pilihan Jawaban</h4>
                            <?php $no=1; foreach ($pretest as $key => $value) {
                                        if ($value->id_materi == $id) {  ?> 
                            <div>
                                <div class="mt-3"><?=$no++?>. <?= $value->soal?></div>
                                <div class="pl-20 mt-3">
                                    <ul>
                                        <li class="mb-2" <?php if ($value->kunci == 'A') {echo 'style="background: yellow;"'; } ?>>A. <?= $value->jawaban_a?></li>
                                        <li class="mb-2" <?php if ($value->kunci == 'B') {echo 'style="background: yellow;"'; } ?>>B. <?= $value->jawaban_b?></li>
                                        <li class="mb-2" <?php if ($value->kunci == 'C') {echo 'style="background: yellow;"'; } ?>>C. <?= $value->jawaban_c?></li>
                                        <li class="mb-2" <?php if ($value->kunci == 'D') {echo 'style="background: yellow;"'; } ?>>D. <?= $value->jawaban_d?></li>
                                        <li class="mb-2" <?php if ($value->kunci == 'E') {echo 'style="background: yellow;"'; } ?>>E. <?= $value->jawaban_e?></li>
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

                        <div class="col-md-4" style="padding: 35px;">
                            <h4>Kunci Jawaban : </h4>
                            <table class="mt-3">
                            <?php $no=1; foreach ($pretest as $key => $value) {
                                        if ($value->id_materi == $id) { ?>
                                <tr style="height: 30px;">
                                    <td style="margin-right: 5px;"><?= $no++?>. &nbsp;</td>
                                    <td> <?= $value->kunci ?></td>
                                </tr>
                            <?php  }} ?>
                            </table>
                        </div>
                </div>
            </div>
        </div>