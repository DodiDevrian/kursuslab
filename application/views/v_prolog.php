<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/course.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/course_responsive.css">

<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li><a href="courses.html">Praktikum</a></li>
								<li><?= $kursus->nama_kursus ?></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>

	<div class="course">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					
					<div class="course_container">
						<div class="course_title text-center"><?= $kursus->nama_kursus ?></div>

						<div class="course_image text-center" style="aspect-ratio: 0;"><img src="<?= base_url('upload/cover_kursus/' . $kursus->cover_kursus) ?>" alt=""></div>
						<div class="tab_panel_text" >
							<p><?= $kursus->ket_kursus ?></p>
						</div>
						<div class="text-center">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
							Lihat Materi
							</button>
						</div>

						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Materi <?= $kursus->nama_kursus ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<?php $no=1; foreach ($materi as $key => $value) { 
										if ($value->id_kursus == $id) {
										?>
										<p><?= $no++ . '. ' . $value->nama_materi ?> </p>
									<?php  }} ?>
								</div>

								<?php if($this->session->userdata('username')) { ?>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<?php $no=1; foreach ($materi_button as $key => $value) { 
										if ($value->id_kursus == $id) {
											?>
											<?php if ($no == 1) { $no++; ?>
										<a href="<?= base_url('kursus/detail_materi/' . $value->id_materi) ?>" class="btn btn-primary">Mulai Belajar</a>
										<?php }}} ?>
									</div>
								<?php } else{ ?>
									<div class="modal-footer">
										<div class="text-center mb-2"> <i style="color: red; margin-right: 5px;">*</i> Silahkan Login terlebih dahulu untuk melihat materi</div>
										<div><a href="<?= base_url('auth/login') ?>" class="ml-3 btn btn-warning text-white">Login</a></div>
									</div>
								<?php } ?>
							</div>
						</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
