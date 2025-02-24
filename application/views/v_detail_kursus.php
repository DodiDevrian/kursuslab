<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/course.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/course_responsive.css">

<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
<link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />

<?php $id_list = $materi -> id_kursus; ?>

<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="<?= base_url() ?>">Home</a></li>
								<li><a href="<?= base_url('kursus') ?>">Kursus</a></li>
								<li><?= $materi -> nama_kursus ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>

<?php 
	$count=0;
	foreach ($do_pretest as $key => $value) {
		if ($value->id_user == $this->session->userdata('id_user')) {
			if ($value->id_materi == $cek_id) {
				$nilai_pretest = $value->sum;
				$id_dopretest = $value->id_dopretest;
				$count++;
			}
		}
	}
?>
	<?php echo $count . '<br>' ; echo $cek_id ;?>
	<div class="container">
		<div class="wrapper">
			<aside id="sidebar">
				<div class="d-flex">
					<button class="toggle-btn ml-auto" type="button">
						<i class="lni lni-menu"></i>
					</button>
				</div>
				<ul class="sidebar-nav">
					<?php $i=1; foreach ($lists_materi as $key => $value) { 
					if ($value->id_kursus == $id_list) {?>
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
				<?php if ($count<1) { ?>
					<?php if ($materi->status_pretest == 'Yes') { ?>
						<div class="notif-pretest">
							<div class="card text-center">
								<div class="card-body">
									<h5 class="card-title" style="color: red;">Anda Belum Mengerjakan Pre-Test Pertemuan Sebelumnya.</h5>
									<p class="card-text">Kerjakan Pre-Test Terlebih Dahulu Untuk Melanjutkan Materi Pertemuan Ini!!</p>
									<a href="<?= base_url('pretest/do/' . $materi->id_materi) ?>" class="btn btn-primary">Kerjakan</a>
								</div>
							</div>
						</div>
					<?php } else { ?>
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
					<?php } ?>
				<?php } else { ?>
					<?php if ($nilai_pretest < 70) { ?>
						<?php if ($materi->status_pretest == 'Yes') { ?>
							<div class="notif-pretest">
								<div class="card text-center">
									<div class="card-body">
										<h5 class="card-title" style="color: red;">Nilai Anda Belum Mencukupi Untuk Melanjutkan Materi.</h5>
										<h3>Nilai Yang Anda Dapat : <?= $nilai_pretest ?></h3>
										<p class="card-text mt-3">Dapatkan Nilai Minimum <b style="color: #07ec56;">70</b> Untuk Dapat Melanjutkan Materi Pertemuan Selanjutnya!!</p>
										<a href="<?= base_url('pretest/re_pretest/' . $id_dopretest) ?>" class="btn btn-primary">Coba Lagi</a>
									</div>
								</div>
							</div>
						<?php } ?>
					<?php } else { ?>
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
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>