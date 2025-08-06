<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/courses.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/courses_responsive.css">

<link rel="stylesheet" href="<?= base_url() ?>assets/css/diskusi_style.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/chat.css">
<link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />

<?php $this->session->set_userdata('chat_diskusi', current_url()); ?>

<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="<?= base_url() ?>">Home</a></li>
                            <li>Forum Diskusi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>


<div class="container">
    <div class="pertanyaan my-3" style="display: flex; flex-direction: row;">
        <?php if ($detail_ask->foto_tanya != '') { ?>
            <div class="img-tanya-judul mr-3" style="width: 30%;">
                <img width="100%" src="<?= base_url('upload/foto_tanya/' . $detail_ask->foto_tanya) ?>" alt="">
            </div>
        <?php } ?>

        <div class="tanya-judul">
            <h3 class="mt-4 mb-4"><?= $detail_ask->tanya ?></h3>
            <?php if ($detail_ask->foto_tanya != '') { ?>
                <div class="img-res">
                    <img src="<?= base_url('upload/foto_tanya/' . $detail_ask->foto_tanya) ?>" alt="">
                </div>
            <?php } ?>
            <div class="footer-judul-tanya">
                <li><i class="fa fa-user" aria-hidden="true"></i> <?= $detail_ask->nama_user ?></li>
                <li class="ml-2" style="color: #2389ff;"><i class="fa fa-book" aria-hidden="true"></i><a href="#"> <?= $detail_ask->nama_kursus ?></a></li>
                <li class="ml-2"><i class="fa fa-calendar" aria-hidden="true"></i> <?= date('d-m-Y', strtotime($detail_ask->created)) ?></li>
            </div>
        </div>
    </div>

    <div class="tombol-jawab d-flex flex-row-reverse">
        <a href="" class="btn btn-primary">Beri Jawaban</a>
    </div>

    <hr>

    <div class="judul-jawab">
        <h4>Jawaban</h4>
    </div>
    
    <div class="area-jawab mt-3 mb-5">
        <?php $i=0; foreach ($jawab as $key => $value) { ?>
            <?php if ($value->id_ask == $id) { ?>
                <div class="card mb-4">
                    <div class="card-header user-header">
                        <div class="left-user-info">
                            <li><i class="fa fa-user" aria-hidden="true"></i> <?= $value->nama_user ?></li>
                        </div>
                        <?php if ($value->id_user == $this->session->userdata('id_user')) { ?>
                            <div class="right-user-info">
                                <a class="b-hapus" href="">
                                    <li><i class="fa fa-trash" aria-hidden="true"></i> Delete</li>
                                </a>
                                <a class="b-ubah" href="">
                                    <li class="ml-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</li>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <p><?= $value->jawab ?></p>
    
                        <?php if ($value->foto_jawab != '') { ?>                    
                            <div class="text-center mb-4 mt-3">
                                <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample<?=$value->id_ans?>" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                </button>
                            </div>
    
                            <div class="collapse" id="collapseExample<?=$value->id_ans?>">
                                <div class="card card-body">
                                    <img width="100%" src="<?= base_url('upload/foto_jawab/' . $value->foto_jawab) ?>" alt="">
                                </div>
                            </div>
                        <?php } ?>
    
                        <div class="footer-jawab mt-3">
                            <li class="ml-2"><i class="fa fa-heart" aria-hidden="true"></i> 20 Like</li>
                            <li class="ml-4"><i class="fa fa-exclamation-triangle" aria-hidden="true"> 4 Report</i></li>
                            <li class="ml-4"><i class="fa fa-calendar" aria-hidden="true"></i> <?= date('d-m-Y', strtotime($value->created)) ?></li>
                        </div>
                    </div>
                </div>
            <?php }else{ $i++; ?>
                <?php if ($i<=1) { ?>
                    <div class="alert alert-danger" role="alert">
                        Jawaban masih kosong
                    </div>
                <?php } ?>
        <?php }} ?>
    </div>

    <hr>

    <div class="diskusi" style="margin-bottom: 100px;">
        <div>
            <h4 class="mb-3" style="font-weight: 400;">Kirim Jawaban Anda</h4>
            <?php
                echo form_open_multipart('diskusi/add_ans_user');
            ?>
                <div class="form-group">
                    <label for="exampleFormControlFile1" style="color: #ff6300;">** Gambar Optional</label>
                    <input name="foto_jawab" type="file" class="form-control-file" id="exampleFormControlFile1">
                    
                    <input type="hidden" name="id_ask" value="<?=$id?>">
                    <input type="hidden" name="id_user" value="<?=$this->session->userdata('id_user')?>">
                </div>

                <div class="form-group">
                    <textarea style="height: 180px;" name="jawab" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan jawaban anda!"></textarea>
                </div>

                <button class="btn btn-success float-right">Kirim</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
