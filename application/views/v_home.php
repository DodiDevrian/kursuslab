<div class="home">
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">
			<?php foreach ($slider_terakhir as $key => $value) { ?>
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(<?= base_url('upload/foto_slider/' . $value->foto_slider) ?>)"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<!-- <div class="home_slider_title"><?= $value->nama_slider ?></div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>

			</div>
		</div>

		<div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
		<div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
	</div>

	<div class="courses">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url() ?>assets/img/courses_background.png" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Materi Praktikum</h2>
						<div class="section_subtitle"><p>Materi yang disediakan sesuai dengan materi yang terdapat pada pelaksaan praktikum</p></div>
					</div>
				</div>
			</div>
			<div class="row courses_row">
				
				<?php foreach ($kursus_terakhir as $key => $value) { ?>
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
			<div class="row">
				<div class="col">
					<div class="courses_button trans_200"><a href="<?= base_url('kursus') ?>">lihat semua kursus</a></div>
				</div>
			</div>
		</div>
	</div>

	<div class="team">
		<div class="team_background parallax-window" data-parallax="scroll" data-image-src="" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Asisten Praktikum</h2>
					</div>
				</div>
			</div>

			<div class="row team_row">
				<?php foreach ($asprak_terakhir as $key => $value) { ?>
					<div class="col-lg-3 col-md-6 team_col">
						<div class="team_item">
							<div class="team_image"><img src="<?= base_url() ?>upload/foto_user/<?= $value->foto_user ?>" alt=""></div>
							<div class="team_body">
								<div class="team_title"><a href="#"><?= $value->nama_user ?></a></div>
								<div class="team_subtitle"><?= $value->nama_kursus ?></div>
								<div class="social_list">
									<ul>
										<li><a type="button" class="" data-toggle="modal" data-target="#nomor<?= $value->id_asprak ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
										<li><a type="button" class="" data-toggle="modal" data-target="#nomor<?= $value->id_asprak ?>"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="row">
				<div class="col">
					<div class="courses_button trans_200"><a href="<?= base_url('asprak') ?>">lihat semua asisten praktikum</a></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Untuk Nampilin Nomor HP dan Chat WhatsApp -->
	<?php foreach ($asprak_terakhir as $key => $value) { ?>
		<div class="modal fade" id="nomor<?= $value->id_asprak ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $value->nama_user ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Nomor HP : 0<?= $value->no_hp ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success"><a style="color: white;" target="_blank" href="https://wa.me/62<?= $value->no_hp ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></button>
				</div>
				</div>
			</div>
		</div>
	<?php } ?>

	<?php foreach ($kursus_terakhir as $key => $value) { ?>
		
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