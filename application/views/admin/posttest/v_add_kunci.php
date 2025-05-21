
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Buat Kunci Jawaban Pre-Test (<?= $kursus->nama_kursus ?>)</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url('admin/posttest')?>">Post-Test</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url('admin/posttest/list_soal/' . $id)?>">Soal Pre-Test</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Buat Kunci Jawaban</li>
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
							<h4 class="text-blue h4">Form Buat Kunci Jawaban Pre-Test (<?= $kursus->nama_kursus ?>)"</h4>
						</div>
					</div>
					<?php
                if (isset($error_upload)) {
                        echo '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                    }
                    echo form_open_multipart('admin/posttest/add_kunci/' . $kursus->id_kursus);
                    ?>
                    <?php $no=1; $num=0; foreach ($posttest as $key => $value) {
                                                if ($value->id_kursus == $id) { $num++; ?> 
                    <div class="card w-100 mt-3">
                        <div class="card-body">
                            <div class="soal mb-3" style="color: black;">
                                <?=$no++?>. <?= $value->soal?>
                            </div>
                            <?= form_error('kunci_' . $num, '<div class="text-danger small mb-2" style="font-size: 15px;">', '</div>') ?>
                            <div class="jawaban ml-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kunci_<?= $num ?>" id="exampleRadios1<?= $num ?>" value="A">
                                    <label class="form-check-label" for="exampleRadios1<?= $num ?>" style="color: black;">
                                        A. <?= $value->jawaban_a?>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kunci_<?= $num ?>" id="exampleRadios2<?= $num ?>" value="B">
                                    <label class="form-check-label" for="exampleRadios2<?= $num ?>" style="color: black;">
                                        B. <?= $value->jawaban_b?>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kunci_<?= $num ?>" id="exampleRadios3<?= $num ?>" value="C">
                                    <label class="form-check-label" for="exampleRadios3<?= $num ?>" style="color: black;">
                                        C. <?= $value->jawaban_c?>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kunci_<?= $num ?>" id="exampleRadios4<?= $num ?>" value="D">
                                    <label class="form-check-label" for="exampleRadios4<?= $num ?>" style="color: black;">
                                        D. <?= $value->jawaban_d?>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kunci_<?= $num ?>" id="exampleRadios5<?= $num ?>" value="E">
                                    <label class="form-check-label" for="exampleRadios5<?= $num ?>" style="color: black;">
                                        E. <?= $value->jawaban_e?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  }} ?>
                    <div class="form-group text-center mt-3">
                        <button type="reset" class="btn btn-danger mr-2">Bersihkan</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    <?php echo form_close(); ?>
        </div>
        </div>

        