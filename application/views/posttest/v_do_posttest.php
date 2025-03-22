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
                            <li style="color: #384158;">Post-Test</li>
                            <li><?= $kursus -> nama_kursus ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<div class="container">
    <h3 class="text-center mt-4 mb-4">Post Test Praktikum <?= $kursus -> nama_kursus ?></h3>
    <div class="wrapper">
        <div class="main">
            <?php if ($sisapost!=0) { ?>
                <?php
                    if (isset($error_upload)) {
                        echo '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                    }
                    echo form_open_multipart('posttest/do/' . $kursus->id_kursus);
                ?>

                <?php $no=1; $num=0; foreach ($posttest as $key => $value) {
                                            if ($value->id_kursus == $id) { $num++; ?> 
                <input type="hidden" name="id_user" value="<?=$this->session->userdata('id_user')?>">
                <div class="card w-100 mt-3">
                    <div class="card-body">
                        <div class="soal mb-3" style="color: black;">
                            <?=$no++?>. <?= $value->soal?>
                        </div>
                        <?= form_error('jawab_' . $num, '<div class="text-danger small mb-2" style="font-size: 15px;">', '</div>') ?>
                        <div class="jawaban ml-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jawab_<?= $num ?>" id="exampleRadios1<?= $value->id_posttest ?>" value="A">
                                <label class="form-check-label" for="exampleRadios1<?= $value->id_posttest ?>" style="color: black;">
                                    A. <?= $value->jawaban_a?>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jawab_<?= $num ?>" id="exampleRadios2<?= $value->id_posttest ?>" value="B">
                                <label class="form-check-label" for="exampleRadios2<?= $value->id_posttest ?>" style="color: black;">
                                    B. <?= $value->jawaban_b?>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jawab_<?= $num ?>" id="exampleRadios3<?= $value->id_posttest ?>" value="C">
                                <label class="form-check-label" for="exampleRadios3<?= $value->id_posttest ?>" style="color: black;">
                                    C. <?= $value->jawaban_c?>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jawab_<?= $num ?>" id="exampleRadios4<?= $value->id_posttest ?>" value="D">
                                <label class="form-check-label" for="exampleRadios4<?= $value->id_posttest ?>" style="color: black;">
                                    D. <?= $value->jawaban_d?>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jawab_<?= $num ?>" id="exampleRadios5<?= $value->id_posttest ?>" value="E">
                                <label class="form-check-label" for="exampleRadios5<?= $value->id_posttest ?>" style="color: black;">
                                    E. <?= $value->jawaban_e?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <?php  }} ?>
                <div class="form-group text-center mt-3">
                    <button type="reset" class="btn btn-danger mr-2">Bersihkan</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <?php echo form_close(); ?>
            <?php } else { ?>
                <div class="jumbotron mt-5">
                    <h2 class="text-center" style="color: red;">Maaf, kesempatan untuk mengerjakan post test sudah habis!</h2>
                    <p class="lead text-center">Kesempatan untuk mengerjakan post test hanya <b style="color: blue;"><?= $kursus->batas_posttest ?></b> kali.</p>
                    <hr class="my-4">
                    <p class="text-center">Untuk melakukan post test ulang, silahkan menghadap ke laboran!</p>
                    <div class="text-center">
                        <?php $no=1; foreach ($materi_button as $key => $value) { 
                        if ($value->id_kursus == $id) {
                            ?>
                        <?php if ($no == 1) { $no++; ?>
                            <a class="btn btn-danger" href="<?= base_url('kursus/detail_materi/' . $value->id_materi) ?>" role="button">Kembali Ke Materi</a>
                        <?php }}} ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>