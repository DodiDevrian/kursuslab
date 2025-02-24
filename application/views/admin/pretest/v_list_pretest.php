<?php $this->session->set_userdata('halaman_soal', current_url()); ?>

<?php 
$count=0;
foreach ($kunci_list as $key => $value) {
    if ($value->id_materi == $id) {
        $count++;
    }
}
?>

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
                                <li class="breadcrumb-item active" aria-current="page"><?= $title?> <?=$count?></li>
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
                                if ($value->id_materi == $id) {?> 
                            <div>
                                <div class="mt-3"><?=$no++?>. <?= $value->soal?></div>
                                <?php
                                    $n=0;
                                    foreach ($kunci_list as $key => $dt) {
                                        $n++;
                                        if ($count==1) {
                                            if ($n==1) {
                                                if ($no == 2) {
                                                    $style = $kunci->kunci_1;
                                                }elseif ($no == 3) {
                                                    $style = $kunci->kunci_2;
                                                }elseif ($no == 4) {
                                                    $style = $kunci->kunci_3;
                                                }elseif ($no == 5) {
                                                    $style = $kunci->kunci_4;
                                                }elseif ($no == 6) {
                                                    $style = $kunci->kunci_5;
                                                }elseif ($no == 7) {
                                                    $style = $kunci->kunci_6;
                                                }elseif ($no == 8) {
                                                    $style = $kunci->kunci_7;
                                                }elseif ($no == 9) {
                                                    $style = $kunci->kunci_8;
                                                }elseif ($no == 10) {
                                                    $style = $kunci->kunci_9;
                                                }elseif ($no == 11) {
                                                    $style = $kunci->kunci_10;
                                                }else {
                                                    $style = '';
                                                }
                                            }
                                        }
                                    }
                                ?>
                                <div class="pl-20 mt-3">
                                    <ul>
                                        <li class="mb-2" <?php $n=0; foreach ($kunci_list as $key => $dt) { $n++; if ($count==1) { if ($n==1) { if ($style == 'A') { echo 'style="background: yellow;"'; }}}} ?> >A. <?= $value->jawaban_a?></li>
                                        <li class="mb-2" <?php $n=0; foreach ($kunci_list as $key => $dt) { $n++; if ($count==1) { if ($n==1) { if ($style == 'B') { echo 'style="background: yellow;"'; }}}} ?> >B. <?= $value->jawaban_b?></li>
                                        <li class="mb-2" <?php $n=0; foreach ($kunci_list as $key => $dt) { $n++; if ($count==1) { if ($n==1) { if ($style == 'C') { echo 'style="background: yellow;"'; }}}} ?> >C. <?= $value->jawaban_c?></li>
                                        <li class="mb-2" <?php $n=0; foreach ($kunci_list as $key => $dt) { $n++; if ($count==1) { if ($n==1) { if ($style == 'D') { echo 'style="background: yellow;"'; }}}} ?> >D. <?= $value->jawaban_d?></li>
                                        <li class="mb-2" <?php $n=0; foreach ($kunci_list as $key => $dt) { $n++; if ($count==1) { if ($n==1) { if ($style == 'E') { echo 'style="background: yellow;"'; }}}} ?> >E. <?= $value->jawaban_e?></li>
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
                        <?php $cek=0 ; foreach ($kunci_list as $key => $value) {
                            $number = $value->id_materi ;
                            if ($value->id_materi == $id) {
                                $cek = $number ;
                            }
                        } ?>
                        <div class="col-md-4" style="padding: 35px;">
                            <h4>Kunci Jawaban : </h4>
                            <?php if ($sum < 10) { ?>
                                <p class="mt-3" style="color: red;">Buat 10 soal untuk menambahkan kunci jawaban</p>
                            <?php }else { ?>
                                <?php $i=0; foreach ($kunci_list as $key => $value) { $i++;
                                    if ($count < 1) { if ($i == 1) { ?>
                                        <a href="<?= base_url('admin/pretest/add_kunci/' . $id) ?>" class="btn btn-success mt-3">Buat Kunci Jawaban</a>
                                    <?php } ?>
                                    
                                    <?php }else {
                                        if ($i == 1) { ?>
                                        <table class="mt-3">
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">1. &nbsp;</td>
                                                <td> <?= $kunci->kunci_1 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">2. &nbsp;</td>
                                                <td> <?= $kunci->kunci_2 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">3. &nbsp;</td>
                                                <td> <?= $kunci->kunci_3 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">4. &nbsp;</td>
                                                <td> <?= $kunci->kunci_4 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">5. &nbsp;</td>
                                                <td> <?= $kunci->kunci_5 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">6. &nbsp;</td>
                                                <td> <?= $kunci->kunci_6 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">7. &nbsp;</td>
                                                <td> <?= $kunci->kunci_7 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">8. &nbsp;</td>
                                                <td> <?= $kunci->kunci_8 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">9. &nbsp;</td>
                                                <td> <?= $kunci->kunci_9 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">10. &nbsp;</td>
                                                <td> <?= $kunci->kunci_10 ?></td>
                                            </tr>
                                        </table>
                                        <a href="<?= base_url('admin/pretest/edit_kunci/' . $id) ?>" class="btn btn-info mt-2">Edit Kunci Jawaban</a>
                                    <?php }}} ?>
                            <?php } ?>
                        </div>
                </div>
            </div>
        </div>