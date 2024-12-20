
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


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
                            ?>
                                <div class="form-group mb-3">
                                    <label class="label">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                                    <?php echo form_error('username', '<div class="text-danger small ml-2">', '</div>') ?>
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

                        <p class="text-center"><i style="color: red;">*</i> Jika tidak bisa melakukan login, silahkan datang ke ruang laboran</a></p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	</body>
</html>

