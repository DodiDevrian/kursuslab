
<!doctype html>
<html lang="en">
<head>
    <title>Login - Laboratorium Teknik Informatika</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logoif.png">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?= base_url('assets/css/login-style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/bootstrap4/bootstrap.min.css">


	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Laboratorium Teknik Informatika</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
                        <?php foreach ($clogin as $key => $value) { ?>
                            <div class="img" style="background-image: url(<?= base_url()?>upload/foto_login/<?= $value->foto_login ?>);"></div>
                        <?php } ?>
						<div class="login-wrap p-4 p-md-5">
                            <div class="role text-center">
                                <h3 class="mb-4">Mahasiswa</h3>
                            </div>
                            <div class="d-flex">
                                <div class="w-100 d-flex">
                                <div class="mr-3"><a href="<?= base_url()?>"><i class="fa fa-arrow-left"></i></a></div>
                                    <h3>Login</h3>
                                </div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="<?= base_url('auth/login_admin')?>" class="social-icon d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="Login Sebagai Dosen">
                                            <span class="fa fa-user-o"></span>
                                        </a>
									</p>
								</div>
                            </div>

							<?php
                                echo form_open('auth/login');
                                if ($this->session->flashdata('pesan')) {
                                    echo $this->session->flashdata('pesan');
                                }
                                if ($this->session->flashdata('pesan_regis')) {
                                    echo $this->session->flashdata('pesan_regis');
                                }
                            ?>
                                <div class="form-group mb-3">
                                    <label class="label">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                                    <?php echo form_error('email', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    <?php echo form_error('password', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>
                                <div class="form-group mt-5">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login &nbsp;&nbsp;<i class="fa fa-sign-in"></i></button>
                                </div>
                            <? echo form_close(); ?>

                        <p class="text-center"><i style="color: red;">*</i> Jika belum memiliki akun, silahkan buat akun terlebih dahulu !</p>
                        <div class="text-center">
                            <a style="color: #e3b04b ;" href="<?= base_url('auth/register') ?>">Buat Akun!</a>
                        </div>

                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
	</body>
</html>

