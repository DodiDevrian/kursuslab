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
						<a href="<?= base_url('kursus/detail_materi/' . $value->id_materi) ?>" class="sidebar-link d-flex">
							<i class="lni lni-play"></i>
							<div>
								<?= wordwrap($value->nama_materi,35,"<br>\n");?>
							</div>
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
						<?php if ($materi -> status == 2) { ?>
							<iframe class="course_image" src="https://www.youtube.com/embed/<?= $materi -> id_yt ?>" title="<?= $materi -> nama_materi ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
						<?php } else { ?>
							<div class="alert alert-danger" role="alert">
								Mohon maaf, materi sedang ditinjau oleh dosen pengampu!
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="d-flex justify-content-between" style="margin-top: 25px;">
					<h3 class="mb-2 mt-2"><?= $materi -> nama_materi ?></h3>
					<?php if ($materi -> status == 2) { ?>
					<a target="_blank" class="btn btn-warning" href="<?= base_url('upload/doc_materi/' . $materi->doc_materi) ?>"><i style="font-size: 25px; margin-right: 10px;" class="fa fa-file-pdf-o"></i> Download Modul</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>