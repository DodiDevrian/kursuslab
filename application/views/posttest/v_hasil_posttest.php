<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/contact.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/contact_responsive.css">

<?php 
	$count=0;
	foreach ($do_posttest as $key => $value) {
		if ($value->id_user == $this->session->userdata('id_user')) {
			if ($value->id_kursus == $id) {
				$count++;
			}
		}
	}
?>

<?php 
$sisapost = $kursus->batas_posttest - $count;
?>

<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="<?= base_url() ?>">Home</a></li>
                            <li><a href="<?= base_url('kursus') ?>">Kursus</a></li>
                            <li><a href="<?= base_url('kursus/' . $kursus -> id_kursus) ?>"><?= $kursus -> nama_kursus ?></a></li>
                            <li>Hasil Post-test</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<?php
$nilaiTerbaru = null;
$nilaiTertinggi = null;
foreach ($nilai as $key => $value) {
    if ($value->id_user == $this->session->userdata('id_user')) {
        if ($value->id_kursus == $id) {
            $nilaiTerbaru = $value->sum;
        }
        if ($value->sum > $nilaiTertinggi) {
            $nilaiTertinggi = $value->sum;
        }
    }
}
?>
<div class="container">
    <h3 class="text-center mt-4 mb-4">Hasil Post Test Praktikum <?= $kursus -> nama_kursus ?></h3>
    <div class="wrapper">
        <div class="main">
            <div class="jumbotron text-center">
                <h1 class="display-4"><?= $nilaiTerbaru ?></h1>
                <?php if ($nilaiTerbaru < 70) { ?>
                    <p class="lead">Predikat : Kurang</p>
                <?php } else { ?>
                    <p class="lead">Predikat : Sangat Baik</p>
                <?php } ?>
                    <hr class="my-4">
                    <p style="margin-bottom: 0px;">Nilai Tertinggi : <?= $nilaiTertinggi ?></p>
                    <p class="mb-4" >Kesempatan Anda Untuk Mencoba Lagi Tersisa : <b style="font-size: 20px;"><?= $sisapost ?></b></p>
                    <?php if ($sisapost == 0) { ?>
                        <p>Anda Sudah Tidak Bisa Mencoba Lagi !</p>
                    <?php } else { ?>
                        <a class="btn btn-info btn-lg" href="<?= base_url('posttest/do/' . $hasil_posttest->id_kursus) ?>" role="button">Coba Lagi</a>
                    <?php } ?>
                    <a class="btn btn-primary btn-lg" href="<?= base_url('kursus') ?>" role="button">Lanjut</a>
            </div>
        </div>
    </div>
</div>