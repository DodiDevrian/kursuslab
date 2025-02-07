<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/contact.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/contact_responsive.css">

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
            <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-picture-o" aria-hidden="true"></i> Update Foto</button>
        </div>
        <div class="col-lg-8">

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
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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