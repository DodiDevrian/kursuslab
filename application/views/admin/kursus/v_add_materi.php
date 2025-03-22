<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4><?= $kursus->nama_kursus ?></h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Kursus</li>
                                <li class="breadcrumb-item" aria-current="page"><?= $kursus->nama_kursus ?></li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah Data Materi</li>
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

                        echo form_open_multipart('admin/kursus/add_materi/' . $kursus->id_kursus);
                        ?>
						<div class="form-group">
							<label>Nama Materi</label>
							<input class="form-control" name="nama_materi" type="text" placeholder="Masukkan Materi" required>
                            <?php echo form_error('nama_materi', '<div class="text-danger small">', '</div>') ?>
						</div>
                        <div class="form-group">
							<label>Mata Kuliah</label>
							<select class="form-control" disabled="">
								<option value="<?= $kursus->id_kursus ?>"><?= $kursus->nama_kursus ?></option>
							</select>
						</div>
						<div class="form-group">
                            <label>Keterangan Materi</label>
                            <textarea class="form-control" name="ket_materi"></textarea>
                            <?php echo form_error('id_yt', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="form-group">
							<label>ID Youtube</label>
							<input class="form-control" name="id_yt" type="text" placeholder="Masukkan ID Youtube">
                            <?php echo form_error('id_yt', '<div class="text-danger small">', '</div>') ?>
						</div>

                        <div class="form-group">
                            <label>Apakah diperlukan Pre-test untuk akses materi ini?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_pretest" id="status1" value="Yes">
                                <label class="form-check-label" for="status1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_pretest" id="status2" value="No" checked>
                                <label class="form-check-label" for="status2">
                                    Tidak
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Apakah Ini Termasuk Kedalam Materi Terakhir ?</label>
                            <div class="note-posttest">
                                <p>Note : Untuk memunculkan tombol Post-test pada halaman materi.</p>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cek_last" id="cek1" value="Yes">
                                <label class="form-check-label" for="cek1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cek_last" id="cek2" value="No" checked>
                                <label class="form-check-label" for="cek2">
                                    Tidak
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
							<label>Upload File Materi (<span style="color: red;">*File Harus Berupa PDF</span>)</label>
							<input name="doc_materi" type="file" class="form-control-file form-control height-auto">
						</div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Bersihkan</button>
                        </div>
            <?php echo form_close(); ?>
        </div>
        </div>