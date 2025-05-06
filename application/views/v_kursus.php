<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/courses.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/courses_responsive.css">

	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="<?= base_url() ?>">Home</a></li>
								<li>Kursus</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>

	<div class="courses">
		<div class="container">
			<div class="text-center"><h2>Daftar Praktikum</h2></div>
			
			<div class="row">
				<div class="col-lg-12">
					<div class="courses_container">
						<div class="row courses_row">
							
							<?php foreach ($kursus as $key => $value) { ?>
							<div class="col-lg-4 mb-4">
								<div class="course">
									<div class="course_image"><img src="<?= base_url() ?>upload/cover_kursus/<?= $value->cover_kursus ?>" alt="" style="width: 100%; height: 223px; object-fit: cover; object-position: 20% 10%;"></div>
									<div class="course_body">
										<h3 class="course_title"><a href="<?= base_url('kursus/detail_kursus/' . $value->id_kursus) ?>"><?= $value->nama_kursus ?></a></h3>
										<!-- <div class="course_text">
											<p><?= substr(strip_tags($value->ket_kursus), 0, 80) ?>...</p>
										</div> -->
									</div>
									<div class="course_footer">
										<div class="text-center course_footer_content d-flex flex-row align-items-center justify-content-start">
											<button type="button" class="mx-auto btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $value->id_kursus ?>">
											Lihat Materi
											</button>
											<!-- <a href="<?= base_url('kursus/detail_kursus/' . $value->id_kursus) ?>" class="mx-auto">
												<div class="btn btn-primary">Masuk</div>
											</a>	 -->
										</div>
									</div>
								</div>
							</div>
							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php foreach ($kursus as $key => $value) { ?>
		
	<div class="modal fade" id="exampleModal<?= $value->id_kursus ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Materi <?= $value->nama_kursus ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php $no=1; foreach ($materi as $key => $row) { 
						if ($row->id_kursus == $value->id_kursus) {
						?>
						<p><?= $no++ . '. ' . $row->nama_materi ?> </p>
					<?php  }} ?>
				</div>

				<?php if($this->session->userdata('id_user')) { ?>
					<?php if ($this->session->userdata('status_if') == 'Yes' ) { ?>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<?php $no=1; foreach ($materi_button as $key => $row) { 
							if ($row->id_kursus == $value->id_kursus) {
								?>
								<?php if ($no == 1) { $no++; ?>
							<a href="<?= base_url('kursus/detail_materi/' . $row->id_materi) ?>" class="btn btn-primary">Mulai Belajar</a>
							<?php }}} ?>
						</div>
					<?php } else { ?>
						<div class="modal-footer">
						<div class="text-center mb-2"> <i style="color: red; margin-right: 5px;">*</i> Akun anda sedang diperiksa status mahasiwa Teknik Informatika atau bukan, tunggu sampai akun anda diterima</div>
						<!-- <div><a href="<?= base_url('auth/login') ?>" class="ml-3 btn btn-warning text-white">Login</a></div> -->
					</div>
					<?php } ?>
				<?php } else{ ?>
					<div class="modal-footer">
						<div class="text-center mb-2"> <i style="color: red; margin-right: 5px;">*</i> Silahkan Login terlebih dahulu untuk melihat materi</div>
						<div><a href="<?= base_url('auth/login') ?>" class="ml-3 btn btn-warning text-white">Login</a></div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>