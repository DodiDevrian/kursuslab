<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/contact.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/contact_responsive.css">

<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="<?= base_url() ?>">Home</a></li>
                            <li><a href="<?= base_url('kursus') ?>">Kursus</a></li>
                            <li style="color: #384158;">Pretest</li>
                            <li><?= $do_pretest -> nama_materi ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<div class="container">
    <h3 class="text-center mt-4 mb-4">Pre Test Materi <?= $do_pretest -> nama_materi ?></h3>
    <div class="wrapper">
        <div class="main">
            <?php
                if (isset($error_upload)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                }
                echo form_open_multipart('pretest/re_pretest/' . $do_pretest->id_dopretest);
            ?>
            <input type="hidden" id="custId" name="id_kursus" value="<?= $do_pretest -> id_kursus ?>">
            <input type="hidden" id="custId" name="id_materi" value="<?= $do_pretest->id_materi ?>">

            <?php $no=1; $num=0; foreach ($pretest as $key => $value) {
                                        if ($value->id_materi == $do_pretest->id_materi) { $num++; ?> 
            <input type="hidden" name="id_user" value="<?=$this->session->userdata('id_user')?>">
            <div class="card w-100 mt-3">
                <div class="card-body">
                    <div class="soal mb-3" style="color: black;">
                        <?=$no++?>. <?= $value->soal?>
                    </div>
                    <?= form_error('jawab_' . $num, '<div class="text-danger small mb-2" style="font-size: 15px;">', '</div>') ?>
                    <div class="jawaban ml-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawab_<?= $num ?>" id="exampleRadios1" value="A">
                            <label class="form-check-label" for="exampleRadios1" style="color: black;">
                                A. <?= $value->jawaban_a?>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawab_<?= $num ?>" id="exampleRadios1" value="B">
                            <label class="form-check-label" for="exampleRadios1" style="color: black;">
                                B. <?= $value->jawaban_b?>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawab_<?= $num ?>" id="exampleRadios1" value="C">
                            <label class="form-check-label" for="exampleRadios1" style="color: black;">
                                C. <?= $value->jawaban_c?>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawab_<?= $num ?>" id="exampleRadios1" value="D">
                            <label class="form-check-label" for="exampleRadios1" style="color: black;">
                                D. <?= $value->jawaban_d?>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawab_<?= $num ?>" id="exampleRadios1" value="E">
                            <label class="form-check-label" for="exampleRadios1" style="color: black;">
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
        </div>
    </div>
</div>