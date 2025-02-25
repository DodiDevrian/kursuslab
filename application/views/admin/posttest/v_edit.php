<?php $sumsoal=1; $sum=1; foreach ($posttest as $key => $value) {
            if ($value->id_kursus == $id) {
                $sumsoal += $sum;
            }} ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Edit Data Soal Pre-Test (<?= $detail->nama_kursus ?>)</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url('admin/pretest')?>">Pretest</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Data Soal</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Isi Tabel Kursus -->
            <div class="panel-body">
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-30">
						<div class="pull-left">
							<h4 class="text-blue h4">Form Edit Data Soal Pre-Test "Soal Nomor <?= $detail->nomor_soal ?>"</h4>
						</div>
					</div>
					<?php
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                        }
                        echo form_open_multipart('admin/posttest/edit/' . $detail->id_posttest);
                        ?>
                        <div class="form-group">
							<label>Praktikum</label>
                            <input value="<?= $detail->nomor_soal ?>" name="nomor_soal" type="hidden">
                            <input value="<?= $detail->id_posttest ?>" name="id_posttest" type="hidden">
							<select class="form-control" name="id_kursus">
								<option value="<?= $detail->id_kursus ?>"><?= $detail->nama_kursus ?></option>
							</select>
						</div>

                        <div class="form-group mt-5">
                            <label><b>Soal : </b></label>
                            <textarea class="textarea_editor form-control border-radius-0" placeholder="Enter text ..." name="soal" style="height: 500px;"><?= $detail->soal ?></textarea>
                            <?= form_error('soal', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <!-- <div class="form-group">
							<label>Jawaban Benar</label>
							<select class="form-control" name="keypretest">
                            <option value="<?= $detail->keypretest ?>"><?= $detail->keypretest ?></option>
								<option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
							</select>
                            <?= form_error('keypretest', '<div class="text-danger small">', '</div>') ?>
						</div> -->

                        <div class="form-group" style="margin-top: 70px;">
                            <label><strong>Jawaban A : </strong></label>
                            <textarea class="form-control border-radius-0" name="jawaban_a" style="height: 150px;"><?= $detail->jawaban_a ?></textarea>
                            <?= form_error('jawaban_a', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="form-group">
                            <label><strong>Jawaban B : </strong></label>
                            <textarea class="form-control border-radius-0" name="jawaban_b" style="height: 150px;"><?= $detail->jawaban_b ?></textarea>
                            <?= form_error('jawaban_b', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="form-group">
                            <label><strong>Jawaban C : </strong></label>
                            <textarea class="form-control border-radius-0" name="jawaban_c" style="height: 150px;"><?= $detail->jawaban_c ?></textarea>
                            <?= form_error('jawaban_c', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="form-group">
                            <label><strong>Jawaban D : </strong></label>
                            <textarea class="form-control border-radius-0" name="jawaban_d" style="height: 150px;"><?= $detail->jawaban_d ?></textarea>
                            <?= form_error('jawaban_d', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="form-group">
                            <label><strong>Jawaban E : </strong></label>
                            <textarea class="form-control border-radius-0" placeholder="Enter text ..." name="jawaban_e" style="height: 150px;"><?= $detail->jawaban_e ?></textarea>
                            <?= form_error('jawaban_e', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Bersihkan</button>
                        </div>
            <?php echo form_close(); ?>
        </div>
        </div>

        