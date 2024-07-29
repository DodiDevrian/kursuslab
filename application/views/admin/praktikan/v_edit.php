<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4><?= $title2 ?></h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                                <li class="breadcrumb-item"><?= $title ?></li>
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
							<h4 class="text-blue h4">Form <?= $title2 ?></h4>
						</div>
					</div>
					<?php
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                        }
                        echo form_open_multipart('admin/praktikan/edit/' . $dosen->id_user);
                        ?>
						<div class="form-group">
							<label>Username Praktikan</label>
							<input class="form-control" name="username" type="text" value="<?= $dosen->username; ?>">
                            <?php echo form_error('username', '<div class="text-danger small">', '</div>') ?>
						</div>
                        <div class="form-group">
							<label>Password Akun Praktikan</label>
							<input class="form-control" name="password" type="password" value="<?= $dosen->password; ?>"">
                            <?php echo form_error('password', '<div class="text-danger small">', '</div>') ?>
						</div>
                        <div class="form-group">
							<label>Nama</label>
							<input class="form-control" name="nama_user" type="text" value="<?= $dosen->nama_user; ?>">
                            <?php echo form_error('nama_user', '<div class="text-danger small">', '</div>') ?>
						</div>
                        <div class="form-group">
							<label>Email</label>
							<input class="form-control" name="email" type="text" value="<?= $dosen->email; ?>">
                            <?php echo form_error('email', '<div class="text-danger small">', '</div>') ?>
						</div>
                        <div class="form-group">
							<label>NIM</label>
							<input class="form-control" name="nim" type="text" value="<?= $dosen->nim; ?>">
                            <?php echo form_error('nim', '<div class="text-danger small">', '</div>') ?>
						</div>
                        <div class="form-group">
							<label>Upload Foto</label>
							<input name="foto_user" type="file" class="form-control-file form-control height-auto">
						</div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Bersihkan</button>
                        </div>
            <?php echo form_close(); ?>
        </div>
        </div>