<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/contact.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/contact_responsive.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap4.css">

<?php 
    $countpost=0;
    $countpre=0;
    foreach ($posttest as $key => $value) {
        if ($this->session->userdata('id_user') == $value->id_user) {
            $countpost++;
        }
    }
    foreach ($pretest as $key => $value) {
        if ($this->session->userdata('id_user') == $value->id_user) {
            $countpre++;
        }
    }
?>

<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="<?= base_url() ?>">Home</a></li>
                            <li><?php echo $this->session->userdata('nama_user') ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-4 text-center">
            <?php
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible m-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                }
            ?>
            <img class="mb-3" src="<?= base_url('upload/foto_user/' ) . $profile->foto_user ?>" alt="" width="200px"> <br>
            <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#editFoto"><i class="fa fa-picture-o" aria-hidden="true"></i> Update Foto</button>
        </div>
        <div class="col-lg-8">
            <?php
                if ($this->session->flashdata('pesan_data')) {
                    echo '<div class="alert alert-success alert-dismissible m-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo $this->session->flashdata('pesan_data');
                    echo '</div>';
                }
            ?>
            <table class="table" style="color: black;">
                <tr>
                    <td>Nama</td>
                    <td>: <?= $profile->nama_user ?></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>: <?= $profile->nim ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: <?= $profile->email ?></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>
                        <?php if ($profile->role == 3) {
                            echo ': Mahasiswa';
                        } else {
                            echo ': Asprak dan Mahasiswa' ;
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <div class="text-center">
                <button type="button" class="btn btn-warning mb-5" data-toggle="modal" data-target="#editData"><i class="fa fa-edit" aria-hidden="true"></i> Ubah Data dan Password</button>
            </div>
        </div>
    </div>

    <div class="card p-3 hasil-posttest mt-5" style="color: black;">
        <h4 class="text-center"><b>Hasil Post Test</b></h4>
        <?php if ($countpost>0) { ?>
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Praktikum</th>
                        <th>Nilai Post Test</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($posttest as $key => $value) { ?>
                    <?php if ($this->session->userdata('id_user') == $value->id_user) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                                <td><?= $value->nama_kursus ?></td>
                                <td <?php if ($value->sum >=70) {
                                    echo 'style="background: #12ff12;"';
                                }else {
                                    echo 'style="background:rgb(255 158 158);"';
                                } ?>>
                                    <?= $value->sum ?>
                                </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
                </tbody>
            </table>
        <?php }else { ?>
            <div class="alert alert-danger mt-3" role="alert">
                Anda belum melakukan post-test
            </div>
        <?php } ?>
    </div>

    <div class="card p-3 hasil-pretest mt-5 mb-5" style="color: black;">
        <h4 class="text-center"><b>Hasil Pre Test</b></h4>
        <?php if ($countpre>0) { ?>
            <table id="example1" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Praktikum</th>
                        <th>Materi</th>
                        <th>Nilai Post Test</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($pretest as $key => $value) { ?>
                        <?php if ($this->session->userdata('id_user') == $value->id_user) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->nama_kursus ?></td>
                                <td><?= $value->nama_materi ?></td>
                                <td <?php if ($value->sum >=70) {
                                    echo 'style="background: #12ff12;"';
                                }else {
                                    echo 'style="background:rgb(255 158 158);"';
                                } ?>>
                                    <?= $value->sum ?>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        <?php }else { ?>
            <div class="alert alert-danger mt-3" role="alert">
                Anda belum melakukan pre-test
            </div>
        <?php } ?>
    </div>
</div>

<div class="modal fade" id="editFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Foto Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php
                if (isset($error_upload)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                }
                
                echo form_open_multipart('profile/edit/' . $profile->slug_user);
            ?>
            <div class="form-group">
                <label>Edit Foto Profile</label>
                <input type="file" class="form-control-file form-control height-auto" name="foto_user">
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>
        <?php echo form_close(); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="editData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data dan Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php
                if (isset($error_upload)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                }
                
                echo form_open_multipart('profile/edit_data/' . $profile->slug_user);
            ?>
            <div class="form-group">
                <label>Nama Lengkap Mahasiswa</label>
                <input class="form-control" name="nama_user" type="text" value="<?= $profile->nama_user ?>" style="color: black;">
                <?php echo form_error('nama_user', '<div class="text-danger small">', '</div>') ?>
            </div>

            <div class="form-group" style="margin-top: 35px;">
                <label>NIM</label>
                <input class="form-control" name="nim" type="text" value="<?= $profile->nim ?>" style="color: black;">
                <?php echo form_error('nim', '<div class="text-danger small">', '</div>') ?>
            </div>

            <div class="form-group" style="margin-top: 35px;">
                <label>Email</label>
                <input class="form-control" name="email" type="text" value="<?= $profile->email ?>" style="color: black;">
                <?php echo form_error('email', '<div class="text-danger small">', '</div>') ?>
            </div>

            <div class="form-group" style="margin-top: 35px;">
                <label>Password <b style="color: red;">*Optional</b></label>
                <input class="form-control" name="password" type="password" style="color: black;">
                <?php echo form_error('password', '<div class="text-danger small">', '</div>') ?>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        <?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- <div class="contact_info_container mt-5 mb-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="contact_form">
							<div class="contact_info_title">Contact Form</div>
							<form action="#" class="comment_form" method="POST">
								<div>
									<div class="form_title">Name</div>
									<input type="text" class="comment_input" required="required">
								</div>
								<div>
									<div class="form_title">Email</div>
									<input type="text" class="comment_input" required="required">
								</div>
								<div>
									<div class="form_title">Message</div>
									<textarea class="comment_input comment_textarea" required="required"></textarea>
								</div>
								<div>
									<button type="submit" class="comment_button trans_200">Kirim</button>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="contact_info">
							<div class="contact_info_title">Contact Info</div>
							<div class="contact_info_location">
								<div class="contact_info_location_title">Laboran</div>
								<ul class="location_list">
									<li>Gedung Laboratorium Teknik 3 ITERA (GLT 3)</li>
									<li>+62 896 - 2874 - 4896</li>
									<li>dodi.119140023@student.itera.ac.id</li>
								</ul>
							</div>
							<div class="contact_info_location mt-5">
								<div class="contact_info_location_title">Koordinator Asprak</div>
								<ul class="location_list">
									<li>Way Huwi, Lampung Selatan, Lampung</li>
									<li>0876-2873-2983</li>
									<li>dodidev@gmail.com</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
    
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap4.js"></script>

    <script>
        new DataTable('#example');
        new DataTable('#example1');
    </script>