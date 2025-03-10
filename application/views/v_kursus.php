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
										<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
											<a href="<?= base_url('kursus/detail_kursus/' . $value->id_kursus) ?>" class="mx-auto">
												<div class="btn btn-primary">Masuk</div>
											</a>	
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