
<script src="<?= base_url() ?>assets/js/jquery-1.11.2.min.js"></script>
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
							<h4 class="text-blue h4">Form Tambah Data Asprak</h4>
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
							<label>Nama Mahasiswa</label>
                            
							<select class="form-control" id="js-example-basic-single2" name="id_user">
                                <option disabled selected>--Pilih Asprak--</option>
                                <?php foreach ($mahasiswa as $key => $value) {
                                    if ($value->role == 4) { ?>                                    
                                    <option value="<?= $value->id_user?>"><?= $value->nama_user?></option>
                                <?php } }?>
							</select>
                            <?= form_error('id_user', '<div class="text-danger small">', '</div>') ?>
						</div>

                        <div class="form-group">
							<label>Nomor Handphone</label>
							<input class="form-control" name="no_hp" type="text" placeholder="Masukkan Nomor Handphone">
                            <?php echo form_error('no_hp', '<div class="text-danger small">', '</div>') ?>
						</div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Bersihkan</button>
                        </div>
            <?php echo form_close(); ?>
        </div>
        </div>

<script type="text/javascript">
    $(function(){
        $(document).ready(function() {
            $('#js-example-basic-single').select2();
        });
    });
</script>

<script type="text/javascript">
    $(function(){
        $(document).ready(function() {
            $('#js-example-basic-single2').select2();
        });
    });
</script>

