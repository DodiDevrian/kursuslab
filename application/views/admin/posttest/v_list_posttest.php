<?php $this->session->set_userdata('halaman_soal', current_url()); ?>

<?php 
$count = 0;
foreach ($posttest as $key => $value) {
    if ($value->id_kursus == $id) {
        $count++;
    }
}
?>

<?php 
$count_kunci=0;
foreach ($kunci_list as $key => $value) {
    if ($value->id_kursus == $id) {
        $count_kunci++;
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
                            <h4>Data Soal Post Test</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kursus</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Isi Tabel Kursus -->
            <div class="card-box mb-30">
                <div class="mb-30 pd-20 d-flex justify-content-between">
                    <h4 class="text-blue h4">Soal Post Test (<?= $kursus->nama_kursus ?>)</h4>
                    <div class="count-soal">
                        <span class="mr-2">Total Soal : <?= $count; ?></span>
                        <?php if ($count<30) { ?>
                            <a href="<?= base_url('admin/posttest/add/' . $id) ?>" class="btn btn-secondary">Tambah Soal +</a>
                        <?php } ?>
                    </div>
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
                                <th>Soal</th>
                                <th>Pilihan Jawaban</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($posttest as $key => $value) { ?>
                                <?php if ($value->id_kursus == $id) { ?>
                                
                            <tr>
                                <td><?= $no++ ?></td>
                                <?php
                                    $n=0;
                                    foreach ($kunci_list as $key => $dt) {
                                        $n++;
                                        if ($count_kunci==1) {
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
                                                }elseif ($no == 12) {
                                                    $style = $kunci->kunci_11;
                                                }elseif ($no == 13) {
                                                    $style = $kunci->kunci_12;
                                                }elseif ($no == 14) {
                                                    $style = $kunci->kunci_13;
                                                }elseif ($no == 15) {
                                                    $style = $kunci->kunci_14;
                                                }elseif ($no == 16) {
                                                    $style = $kunci->kunci_15;
                                                }elseif ($no == 17) {
                                                    $style = $kunci->kunci_16;
                                                }elseif ($no == 18) {
                                                    $style = $kunci->kunci_17;
                                                }elseif ($no == 19) {
                                                    $style = $kunci->kunci_18;
                                                }elseif ($no == 20) {
                                                    $style = $kunci->kunci_19;
                                                }elseif ($no == 21) {
                                                    $style = $kunci->kunci_20;
                                                }elseif ($no == 22) {
                                                    $style = $kunci->kunci_21;
                                                }elseif ($no == 23) {
                                                    $style = $kunci->kunci_22;
                                                }elseif ($no == 24) {
                                                    $style = $kunci->kunci_23;
                                                }elseif ($no == 25) {
                                                    $style = $kunci->kunci_24;
                                                }elseif ($no == 26) {
                                                    $style = $kunci->kunci_25;
                                                }elseif ($no == 27) {
                                                    $style = $kunci->kunci_26;
                                                }elseif ($no == 28) {
                                                    $style = $kunci->kunci_27;
                                                }elseif ($no == 29) {
                                                    $style = $kunci->kunci_28;
                                                }elseif ($no == 30) {
                                                    $style = $kunci->kunci_29;
                                                }elseif ($no == 31) {
                                                    $style = $kunci->kunci_30;
                                                }else {
                                                    $style = '';
                                                }
                                            }
                                        }
                                    }
                                ?>
                                <td><?= wordwrap($value->soal,45,"<br>\n");?></td>
                                <td>
                                    <p <?php $n=0; foreach ($kunci_list as $key => $dt) { $n++; if ($count_kunci==1) { if ($n==1) { if ($style == 'A') { echo 'style="background: yellow;"'; }}}} ?> >A. <?= wordwrap($value->jawaban_a,45,"<br>\n");?><br></p>
                                    <p <?php $n=0; foreach ($kunci_list as $key => $dt) { $n++; if ($count_kunci==1) { if ($n==1) { if ($style == 'B') { echo 'style="background: yellow;"'; }}}} ?> >B. <?= wordwrap($value->jawaban_b,45,"<br>\n");?><br></p>
                                    <p <?php $n=0; foreach ($kunci_list as $key => $dt) { $n++; if ($count_kunci==1) { if ($n==1) { if ($style == 'C') { echo 'style="background: yellow;"'; }}}} ?> >C. <?= wordwrap($value->jawaban_c,45,"<br>\n");?><br></p>
                                    <p <?php $n=0; foreach ($kunci_list as $key => $dt) { $n++; if ($count_kunci==1) { if ($n==1) { if ($style == 'D') { echo 'style="background: yellow;"'; }}}} ?>>D. <?= wordwrap($value->jawaban_d,45,"<br>\n");?><br></p>
                                    <p <?php $n=0; foreach ($kunci_list as $key => $dt) { $n++; if ($count_kunci==1) { if ($n==1) { if ($style == 'E') { echo 'style="background: yellow;"'; }}}} ?>>E. <?= wordwrap($value->jawaban_e,45,"<br>\n");?><br></p>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('admin/posttest/edit/' . $value->id_posttest) ?>"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="<?= base_url('admin/posttest/delete/' . $value->id_posttest) ?>"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-box mb-30 pd-20">
                <h5 class="text-blue h5">Kunci Jawaban</h5>
                <p><?= $count_kunci ?></p>
                <?php if ($count < 30) { ?>
                    <p class="mt-3" style="color: red;">Buat 30 soal untuk menambahkan kunci jawaban</p>
                <?php } else { ?>
                    <?php $i=0; foreach ($kunci_list as $key => $value) { $i++ ?>
                        <?php if ($count_kunci < 1) { ?>
                            <?php if ($i == 1) { ?>
                                <a href="<?= base_url('admin/posttest/add_kunci/' . $id) ?>" class="btn btn-success mt-3">Buat Kunci Jawaban</a>
                            <?php } ?>
                        <?php } else { ?>
                            <?php if ($i == 1) { ?>
                                <div class="kunci_posttest d-flex">
                                    <span class="mr-5">
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
                                    </span>

                                    <span class="mr-5">
                                        <table class="mt-3">
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">11. &nbsp;</td>
                                                <td> <?= $kunci->kunci_11 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">12. &nbsp;</td>
                                                <td> <?= $kunci->kunci_12 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">13. &nbsp;</td>
                                                <td> <?= $kunci->kunci_13 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">14. &nbsp;</td>
                                                <td> <?= $kunci->kunci_14 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">15. &nbsp;</td>
                                                <td> <?= $kunci->kunci_15 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">16. &nbsp;</td>
                                                <td> <?= $kunci->kunci_16 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">17. &nbsp;</td>
                                                <td> <?= $kunci->kunci_17 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">18. &nbsp;</td>
                                                <td> <?= $kunci->kunci_18 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">19. &nbsp;</td>
                                                <td> <?= $kunci->kunci_19 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">20. &nbsp;</td>
                                                <td> <?= $kunci->kunci_20 ?></td>
                                            </tr>
                                        </table>
                                    </span>

                                    <span class="mr-5">
                                        <table class="mt-3">
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">21. &nbsp;</td>
                                                <td> <?= $kunci->kunci_21 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">22. &nbsp;</td>
                                                <td> <?= $kunci->kunci_22 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">23. &nbsp;</td>
                                                <td> <?= $kunci->kunci_23 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">24. &nbsp;</td>
                                                <td> <?= $kunci->kunci_24 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">25. &nbsp;</td>
                                                <td> <?= $kunci->kunci_25 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">26. &nbsp;</td>
                                                <td> <?= $kunci->kunci_26 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">27. &nbsp;</td>
                                                <td> <?= $kunci->kunci_27 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">28. &nbsp;</td>
                                                <td> <?= $kunci->kunci_28 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">29. &nbsp;</td>
                                                <td> <?= $kunci->kunci_29 ?></td>
                                            </tr>
                                            <tr style="height: 30px;">
                                                <td style="margin-right: 5px;">30. &nbsp;</td>
                                                <td> <?= $kunci->kunci_30 ?></td>
                                            </tr>
                                        </table>
                                    </span>
                                </div>
                                <a href="<?= base_url('admin/posttest/edit_kunci/' . $id) ?>" class="btn btn-info mt-2">Edit Kunci Jawaban</a>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>

        </div>