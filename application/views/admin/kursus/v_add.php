<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Kursus</h4>
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

            <div class="panel-body">
            
					<?php
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                        }

                        echo form_open_multipart('akursus/add');
                        ?>
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-30">
						<div class="pull-left">
							<h4 class="text-blue h4">Form Tambah Data Kursus</h4>
						</div>
					</div>
					<?php
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                        }

                        echo form_open_multipart('akursus/add');
                        ?>
						<div class="form-group">
							<label>Nama Kursus atau Mata Kuliah</label>
							<input class="form-control" name="nama_kursus" type="text" placeholder="Masukkan Mata Kuliah">
						</div>
						<div class="form-group">
                            <label>Keterangan Kursus</label>
                            <textarea class="form-control" name="ket_kursus"></textarea>
                        </div>
						
						<div class="form-group">
							<label>Upload Cover Kursus</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="cover_kursus">
								<label class="custom-file-label">Choose file</label>
							</div>
						</div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Bersihkan</button>
                        </div>
            <?php echo form_close(); ?>
        </div>
        </div>