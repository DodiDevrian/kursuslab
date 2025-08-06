<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/courses.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/courses_responsive.css">

<link rel="stylesheet" href="<?= base_url() ?>assets/css/diskusi_style.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/chat.css">
<link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />

<?php $this->session->set_userdata('chat_diskusi', current_url()); ?>
<?php $this->session->set_userdata('referred_from', current_url()); ?>

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
    <h3 class="text-center mt-4 mb-4">Forum Diskusi</h3>
        <div class="btn-group mb-2">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-expanded="false">
                Pilih Praktikum
            </button>
            <div class="dropdown-menu dropdown-menu-lg-right">
                <?php foreach ($kursus as $key => $value) { ?>
                    <a class="dropdown-item" href="<?= base_url('diskusi/detail_diskusi_me/' . $value->id_kursus) ?>"><?= wordwrap($value->nama_kursus,35,"<br>\n");?></a>
                <?php } ?>
            </div>

            <a href="<?= base_url('diskusi') ?>" class="btn btn-success ml-3">All Question</a>
        </div>
    <div class="wrapper">
        <!-- <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn ml-auto" type="button">
                    <i class="lni lni-menu"></i>
                </button>
            </div>
            <ul class="sidebar-nav">
                <?php foreach ($kursus as $key => $value) { ?>
                <li class="sidebar-item">
                    <a href="<?= base_url('diskusi/detail_diskusi/' . $value->id_kursus) ?>" class="sidebar-link d-flex">
                        <div>
                            <?= $value->nama_kursus ?>
                        </div>
                    </a>
                </li>
                <?php } ?>
            </ul>
            <div class="sidebar-footer" style="display: none;">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside> -->
        <div class="main">
            <div class="diskusi">
                <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible m-3">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                ?>
                <div class="course_container">
                        <?php foreach ($diskusi as $key => $value) {
                            if ($value->id_user == $this->session->userdata('id_user')) {
                            $tanggal_kirim = $value->created_diskusi; 
                            $tanggal_jawab = $value->modified_diskusi;
                            ?>
                        <div class="row">
                            <div class="col-lg-6 block-user">
                                <div class="content-diskusi">
                                    <li>
                                        <div class="message-data">
                                            <span class="message-data-name"><?= $value->nama_user ?></span>
                                            <span> &nbsp;| </span>
                                            <span an class="message-data-time"><?= date('M j, Y, g:i a', strtotime($tanggal_kirim)) ?></span>
                                        </div>

                                        <div class="message my-message mb-3">
                                        <?= $value->diskusi_user ?>
                                        </div>
                                        <?php if ($value->foto_diskusi != NULL) { ?>
                                            <div class="img-diskusi">
                                                <a type="button" data-toggle="modal" data-target="#exampleModalFoto<?=$value->id_diskusi?>"><img class="foto-diskusi" src="<?= base_url('upload/foto_diskusi/' . $value->foto_diskusi) ?>" style="width:100%;"></a>
                                            </div>
                                        <?php } ?>
                                        <div class="message-data action-chat-button <?php if ($value->foto_diskusi != NULL) {
                                            echo 'mt-3';
                                        } ?>">
                                            <p style="color: #a5a5a5;"><?= $value->nama_kursus ?></p>
                                            <a href="" class="" role="button" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-bars" style="color: #ed9532; font: 20px;" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <?php if ($value->diskusi_asprak == NULL) { ?>
                                                    <a class="dropdown-item" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?=$value->id_diskusi?>">Edit</a>
                                                <?php } ?>
                                                <a class="dropdown-item" href="<?= base_url('diskusi/delete/' . $value->id_diskusi) ?>">Hapus</a>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                            </div>

                            <?php foreach ($diskusi as $key => $row) { ?>
                            <div class="modal fade" id="exampleModal<?=$value->id_diskusi?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Pertanyaan Diskusi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                                if (isset($error_upload)) {
                                                    echo '<div class="alert alert-danger alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                                                }

                                                echo form_open_multipart('diskusi/edit_chat_user/'. $value->id_diskusi);
                                            ?>
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1" style="color: #ff6300;">** Gambar Optional</label>
                                                    <input name="foto_diskusi" type="file" class="form-control-file" id="exampleFormControlFile1" >
                                                    
                                                    <input type="hidden" name="id_kursus" value="<?=$value->id_kursus?>">
                                                    <input type="hidden" name="id_asprak" value="<?=$value->id_asprak?>">
                                                    <input type="hidden" name="id_user" value="<?=$this->session->userdata('id_user')?>">
                                                    <p class="mt-2" style="color: black;">Gambar Saat Ini</p>
                                                    <img src="<?= base_url('upload/foto_diskusi/' . $value->foto_diskusi) ?>" alt="">
                                                </div>

                                                <div class="form-group">
                                                    <textarea style="height: 150px;" name="diskusi_user" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan Diskusi Anda!"><?=$value->diskusi_user?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <div class="col-lg-6">
                                <?php if ($value->diskusi_asprak != NULL) { ?>
                                    <div class="content-diskusi">
                                        <li class="clearfix">
                                            <div class="message-data align-right">
                                            <span class="message-data-time" ><?= date('M j, Y, g:i a', strtotime($tanggal_jawab)) ?></span> &nbsp;
                                            <span> |&nbsp; </span>
                                            <span class="message-data-name" ><?= $value->nama_asprak ?></span>
                                            
                                            </div>
                                            <div class="message other-message float-right mb-3">
                                            <?= $value->diskusi_asprak ?>
                                            </div>
                                            <?php if ($value->foto_diskusi_asprak != NULL) { ?>
                                                <div class="img-diskusi">
                                                    <a type="button" data-toggle="modal" data-target="#exampleModalFotoAsprak<?=$value->id_diskusi?>"><img class="foto-diskusi" src="<?= base_url('upload/foto_diskusi_asprak/' . $value->foto_diskusi_asprak) ?>" style="width:100%;"></a>
                                                </div>
                                            <?php } ?>
                                        </li>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <hr style="background: white; margin: 15px;">
                        <?php }} ?>

                </div>
            </div>
            
            <!-- <div class="d-flex justify-content-between" style="margin-top: 25px;">
                <h3 class="mb-2 mt-2"><?= $materi -> nama_materi ?></h3>
                <?php if ($materi -> status == 2) { ?>
                    <a target="_blank" class="btn btn-warning" href="<?= base_url('upload/doc_materi/' . $materi->doc_materi) ?>"><i style="font-size: 25px; margin-right: 10px;" class="fa fa-file-pdf-o"></i> Download Modul</a>
                    <?php } ?>
                </div> -->
            </div>
        </div>
        <div class="col mt-5 mb-3"><?php echo $pagination; ?></div>
</div>

<?php foreach ($diskusi as $key => $value) { ?>
<div class="modal fade" id="exampleModalFoto<?=$value->id_diskusi?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?=$value->diskusi_user?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="<?= base_url('upload/foto_diskusi/' . $value->foto_diskusi) ?>" alt="" width="100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php foreach ($diskusi as $key => $value) { ?>
<div class="modal fade" id="exampleModalFotoAsprak<?=$value->id_diskusi?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?=$value->diskusi_user?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="<?= base_url('upload/foto_diskusi_asprak/' . $value->foto_diskusi_asprak) ?>" alt="" width="100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>