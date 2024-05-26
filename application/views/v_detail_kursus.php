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
								<li><a href="courses.html">Kursus</a></li>
								<li>Pemrograman Web</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	<?= $id;  ?>
	<!-- Course -->
	<div class="course">
		<div class="container">
			<div class="row">

				<!-- Course -->
				<div class="col-lg-9">
					
					<div class="course_container">
						<div class="course_title">Pemrograman Web</div>
						<h4 class="mb-2 mt-2"><?= $materi -> nama_materi ?></h4>
						<!-- Course Image -->
                        <iframe class="course_image" src="https://www.youtube.com/embed/mbi5V6v2peY" title="[MV] Heavy Rotation - JKT48" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
					</div>
				</div>

				<!-- Course Sidebar -->
				<div class="col-lg-3">
					<div class="sidebar">
                        
						<!-- Latest Course -->
						<div class="sidebar_section">
							<div><h3>Daftar Materi Pertemuan</h3></div>
							<div class="sidebar_latest">

								<!-- Latest Course -->
								<?php foreach ($lists_materi as $key => $value) { ?>
									<div class="latest d-flex flex-row align-items-start justify-content-start">
										<div class="latest_content">
											<div class="latest_title"><a href="course.html"><?= $value->nama_materi ?></a></div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>