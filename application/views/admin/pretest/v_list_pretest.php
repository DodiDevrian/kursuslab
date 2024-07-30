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
                    
                    <?php if ($sum < 5) { ?>
                        <a href="<?= base_url('admin/pretest/add/' . $materi->id_materi) ?>" class="btn btn-secondary">Tambah Soal +</a>
                    <?php } ?>
                </div>
                <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    ?>
                <div class="pb-20 row">
                    
                        <div class="col-md-8" style="padding: 35px;">
                            <h4>Soal dan Pilihan Jawaban</h4>
                            <?php $no=1; foreach ($pretest as $key => $value) {
                                        if ($value->id_materi == $id) { ?>
                            <div>
                                <div class="mt-3"><?=$no++?>. <?= $value->soal?></div>
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

                        <div class="col-md-4" style="padding: 35px;">
                            <h4>Kunci Jawaban : </h4>
                            <?php foreach ($keypretest as $key => $value) {
                                if ($value->id_materi == $id) {
                            ?>
                            <table class="mt-3">
                                <tr>
                                    <td>1. </td>
                                    <td><?= $value->jawaban_1 ?></td>
                                </tr>
                                <tr style="height: 30px;">
                                    <td>2. </td>
                                    <td><?= $value->jawaban_2 ?></td>
                                </tr>
                                <tr style="height: 30px;">
                                    <td>3. </td>
                                    <td><?= $value->jawaban_3 ?></td>
                                </tr>
                                <tr style="height: 30px;">
                                    <td>4. </td>
                                    <td><?= $value->jawaban_4 ?></td>
                                </tr>
                                <tr style="height: 30px;">
                                    <td>5. </td>
                                    <td><?= $value->jawaban_5 ?></td>
                                </tr>
                            </table>
                            <?php }} ?>

                            <div class="mt-2">
                                <button type="button" class="btn btn-info mt-2" data-toggle="modal" data-target="#exampleModal">
                                    Buat Kunci Jawaban
                                </button>
                                <button type="button" class="btn btn-secondary mt-2" data-toggle="modal" data-target="#editkey">
                                    Edit Kunci Jawaban
                                </button>
                                
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <!-- Modal Add Keypretest -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kunci Jawaban</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <div class="modal-body">

                <?php echo form_open_multipart('admin/pretest/add_keypretest/'. $materi->id_materi); ?>
                    <div class="form-group d-flex align-items-center">
                        <label style="width: 60px;">Soal 1</label>
                        <select class="form-control" name="jawaban_1">
                            <option disabled>Pilih Jawaban</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label style="width: 60px;">Soal 2</label>
                        <select class="form-control" name="jawaban_2">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label style="width: 60px;">Soal 3</label>
                        <select class="form-control" name="jawaban_3">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label style="width: 60px;">Soal 4</label>
                        <select class="form-control" name="jawaban_4">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label style="width: 60px;">Soal 5</label>
                        <select class="form-control" name="jawaban_5">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <?php echo form_close(); ?>
                </div>
            </div>
        </div>

        <!-- Modal Edit Keypretest -->
        <div class="modal fade" id="editkey" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kunci Jawaban</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <div class="modal-body">

                <?php echo form_open_multipart('admin/pretest/add_keypretest/'. $materi->id_materi); ?>
                    <div class="form-group d-flex align-items-center">
                        <label style="width: 60px;">Soal 1</label>
                        <select class="form-control" name="jawaban_1">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label style="width: 60px;">Soal 2</label>
                        <select class="form-control" name="jawaban_2">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label style="width: 60px;">Soal 3</label>
                        <select class="form-control" name="jawaban_3">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label style="width: 60px;">Soal 4</label>
                        <select class="form-control" name="jawaban_4">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label style="width: 60px;">Soal 5</label>
                        <select class="form-control" name="jawaban_5">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <?php echo form_close(); ?>
                </div>
            </div>
        </div>