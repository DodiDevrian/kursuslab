<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Ubah Data Materi</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                                <li class="breadcrumb-item">Kursus</li>
                                <li class="breadcrumb-item active" aria-current="page">Ubah Data Materi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Isi Tabel Kursus -->

            <div class="panel-body">
            
					<?php
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                        }

                        echo form_open_multipart('admin/materi/edit/' . $materi->id_materi);
                        ?>
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-30">
						<div class="pull-left">
							<h4 class="text-blue h4">Form Ubah Data Materi</h4>
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
							<label>Nama Materi</label>
							<input class="form-control" value="<?= $materi->nama_materi ?>" name="nama_materi" type="text" placeholder="Masukkan Materi">
						</div>
                        <div class="form-group">
							<label>Mata Kuliah</label>
							<select class="form-control" name="id_kursus">
                                <!-- <option value="" disabled selected>--Pilih Kursus atau Mata Pelajaran--</option> -->
                                <?php foreach ($kursus as $key => $value) { ?>
                                    <option value="<?= $value->id_kursus ?>"><?= $value->nama_kursus ?></option>
                                <?php } ?>
							</select>
						</div>
						<div class="form-group">
                            <label>Keterangan Materi</label>
                            <textarea class="form-control" name="ket_materi"><?= $materi->ket_materi ?></textarea>
                        </div>

                        <div class="form-group">
							<label>ID Youtube</label>
							<input class="form-control" value="<?= $materi->id_yt ?>" name="id_yt" type="text" placeholder="Masukkan ID Youtube">
						</div>

                        <div class="form-group">
							<label>Upload File Materi</label>
							<input name="doc_materi" type="file" value="<?= $materi->doc_materi ?>" class="form-control-file form-control height-auto">
						</div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Bersihkan</button>
                        </div>
            <?php echo form_close(); ?>
        </div>
        </div>