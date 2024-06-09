<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Tambah Data Materi</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                                <li class="breadcrumb-item">Kursus</li>
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
							<h4 class="text-blue h4">Form Tambah Data Materi</h4>
						</div>
					</div>
					<?php
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                        }

                        echo form_open_multipart('admin/asprak/add');
                        ?>
						<div class="form-group">
							<label>Nama Asprak</label>
							<input class="form-control" name="nama_asprak" type="text" placeholder="Masukkan Nama Asprak">
						</div>
                        <div class="form-group">
							<label>NIM Asprak</label>
							<input class="form-control" name="nim" type="text" placeholder="Masukkan NIM Asprak">
						</div>
                        <div class="form-group">
							<label>Matakuliah</label>
							<select class="form-control" name="id_kursus">
                                <!-- <option value="" disabled selected>--Pilih Kursus atau Mata Pelajaran--</option> -->
                                <?php foreach ($kursus as $key => $value) { ?>
                                    <option value="<?= $value->id_kursus ?>"><?= $value->nama_kursus ?></option>
                                <?php } ?>
							</select>
						</div>

                        <div class="form-group">
							<label>Nomor Handphone</label>
							<input class="form-control" name="no_hp" type="text" placeholder="Nomor Handphone Atau WhatsApp">
						</div>

                        <div class="form-group">
							<label>Upload Foto Asprak</label>
							<input name="foto_asprak" type="file" class="form-control-file form-control height-auto">
						</div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Bersihkan</button>
                        </div>
            <?php echo form_close(); ?>
        </div>
        </div>