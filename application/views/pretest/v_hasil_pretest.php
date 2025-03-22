<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/contact.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/contact_responsive.css">

<?php 
$hasil=0;
foreach ($hasil_pretest as $key => $value) {
    if ($this->session->userdata('id_user')==$value->id_user) {
        $hasil=$value->sum;
        $id_dopretest = $value->id_dopretest;
        $id_materi = $value->id_materi;
    }
}
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
                            <li><a href="<?= base_url('kursus/' . $materi -> id_kursus) ?>"><?= $materi -> nama_kursus ?></a></li>
                            <li style="color: #384158;">Hasil Pretest</li>
                            <li><?= $materi -> nama_materi ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<div class="container">
    <h3 class="text-center mt-4 mb-4">Hasil Pre Test Materi <?= $materi -> nama_materi ?></h3>
    <div class="wrapper">
        <div class="main">
            <div class="jumbotron text-center">
                <h1 class="display-4"><?= $hasil ?></h1>
                <?php if ($hasil <70) { ?>
                    <p class="lead">Jika Nilai Anda Dibawah 70, Maka Anda Tidak Bisa Lanjut Ke Materi Pertemuan Ini</p>
                    <hr class="my-4">
                    <a class="btn btn-danger btn-lg" href="<?= base_url('pretest/re_pretest/' . $id_dopretest) ?>" role="button">Coba Lagi</a>
                <?php } else { ?>
                    <p class="lead">Silahkan Lanjut Untuk Melihat Materi</p>
                    <hr class="my-4">
                    <a class="btn btn-primary btn-lg" href="<?= base_url('kursus/detail_materi/' . $id_materi) ?>" role="button">Lanjut</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>