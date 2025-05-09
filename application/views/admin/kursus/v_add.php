<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Praktium</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url('admin/kursus')?>">Praktikum</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $title2 ?></li>
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
							<h4 class="text-blue h4">Form Tambah Data Praktikum</h4>
						</div>
					</div>
					<?php
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                        }

                        echo form_open_multipart('admin/kursus/add');
                        ?>
						<div class="form-group">
							<label>Nama Mata Kuliah Praktikum</label>
							<input class="form-control" name="nama_kursus" type="text" placeholder="Masukkan Mata Kuliah">
                            <?= form_error('nama_kursus', '<div class="text-danger small">', '</div>') ?>
						</div>
                        <div class="form-group">
							<label>Dosen Pengampu</label>
							<select class="form-control" name="id_admin">
                                <option disabled selected>--Pilih Dosen--</option>
                                <?php foreach ($dosen as $key => $value) {
                                    if ($value->role == 2) { ?>                                    
                                    <option value="<?= $value->id_admin?>"><?= $value->nama_dosen?></option>
                                <?php } }?>
							</select>
                            <?= form_error('id_admin', '<div class="text-danger small">', '</div>') ?>
						</div>

                        <div class="form-group">
							<label>Asisten Praktikum</label>
							<select class="form-control" name="id_asprak">
                                <option disabled selected>--Pilih Asprak--</option>
                                <?php foreach ($asprak as $key => $value) { ?>                                    
                                    <option value="<?= $value->id_asprak?>"><?= $value->nama_asprak?></option>
                                <?php }?>
							</select>
                            <?= form_error('id_asprak', '<div class="text-danger small">', '</div>') ?>
						</div>

                        <div class="form-group">
							<label>Batas Kesempatan Mengerjakan Post Test</label>
							<select class="form-control" name="batas_posttest">                                   
                                    <option value="3">3</option>
							</select>
                            <?= form_error('batas_posttest', '<div class="text-danger small">', '</div>') ?>
						</div>
						
						<div class="form-group">
							<label>Upload Cover</label>
							<input type="file" class="form-control-file form-control height-auto" name="cover_kursus">
						</div>
                        
                        <div class="form-group">
                            <label>Keterangan Praktikum</label>
                            <textarea class="textarea_editor form-control border-radius-0" placeholder="Enter text ..." name="ket_kursus" style="height: 500px;"></textarea>
                            <?= form_error('ket_kursus', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Bersihkan</button>
                        </div>
            <?php echo form_close(); ?>
        </div>
        </div>