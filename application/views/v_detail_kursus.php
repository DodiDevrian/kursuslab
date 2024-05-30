<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/course.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/course_responsive.css">

<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
<link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />

<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li><a href="courses.html">Kursus</a></li>
								<li><?= $materi -> nama_kursus ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	<?php $id_list = $materi -> id_kursus; ?>
	<div class="container">
		<div class="wrapper">
			<aside id="sidebar">
				<div class="d-flex">
					<button class="toggle-btn ml-auto" type="button">
						<i class="lni lni-menu"></i>
					</button>
				</div>
				<ul class="sidebar-nav">
					<?php foreach ($lists_materi as $key => $value) { 
					if ($value->id_kursus == $id_list) { ?>
					<li class="sidebar-item">
						<a href="<?= base_url('kursus/detail_materi/' . $value->id_materi) ?>" class="sidebar-link">
							<i class="lni lni-play"></i>
							<span><?= $value->nama_materi ?></span>
						</a>
					</li>
					<?php }} ?>
				</ul>
				<div class="sidebar-footer" style="display: none;">
					<a href="#" class="sidebar-link">
						<i class="lni lni-exit"></i>
						<span>Logout</span>
					</a>
				</div>
			</aside>
			<div class="main p-3">
				<div class="text-center">
					<div class="course_container">
                        <iframe class="course_image" src="https://www.youtube.com/embed/<?= $materi -> id_yt ?>" title="<?= $materi -> nama_materi ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
					</div>
				</div>
				<h4 class="mb-2 mt-2"><?= $materi -> nama_materi ?></h4>
			</div>
		</div>
	</div>