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
    <h3 class="text-center mt-4">Forum Diskusi</h3>
    <div class="wrapper">
        <aside id="sidebar">
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
                            <?= wordwrap($value->nama_kursus,35,"<br>\n");?>
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
        </aside>

        <div class="main flex-chat">
            
            <div class="diskusi">
                <div class="course_container">
                        <?php foreach ($diskusi as $key => $value) {
                            $tanggal_kirim = $value->created_diskusi; 
                            $tanggal_jawab = $value->modified_diskusi;

                            if ($id == $value->id_kursus) {

                            
                            ?>
                        <div class="row">
                            <div class="col-lg-6 block-user">
                                <div class="content-diskusi">
                                    <li>
                                        <div class="message-data">
                                            <span class="message-data-name">Dodi Devrian Andrianto</span>
                                            <span> &nbsp;| </span>
                                            <span an class="message-data-time"><?= date('M j, Y, g:i a', strtotime($tanggal_kirim)) ?></span>
                                        </div>

                                        <div class="message my-message">
                                        <?= $value->diskusi_user ?>
                                        </div>
                                        <div class="message-data">
                                        <?= $value->nama_kursus ?>
                                        </div>
                                    </li>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <?php if ($value->diskusi_asprak != NULL) { ?>
                                    <div class="content-diskusi">
                                        <li class="clearfix">
                                            <div class="message-data align-right">
                                            <span class="message-data-time" ><?= date('M j, Y, g:i a', strtotime($tanggal_jawab)) ?></span> &nbsp;
                                            <span> |&nbsp; </span>
                                            <span class="message-data-name" ><?= $value->nama_asprak ?></span>
                                            
                                            </div>
                                            <div class="message other-message float-right">
                                            <?= $value->diskusi_asprak ?>
                                            </div>
                                        </li>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <hr style="background: white; margin: 15px;">
                        <?php }} ?>

                </div>
            </div>

            <?php if ($this->session->userdata('username')) { ?>
            <div class="diskusi mb-4">
                <div class="chat-diskusi">
                    <?php
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                        }

                        echo form_open_multipart('diskusi/add_chat_user');
                    ?>
                        <div class="form-group">
                            <label for="exampleFormControlFile1" style="color: #ff6300;">** Gambar Optional</label>
                            <input name="foto_diskusi" type="file" class="form-control-file" id="exampleFormControlFile1">
                            <input type="hidden" name="id_kursus" value="<?=$id?>">
                            <input type="hidden" name="id_asprak" value="<?=$detail_kursus->id_asprak?>">
                            <input type="hidden" name="id_user" value="<?=$this->session->userdata('id_user')?>">
                        </div>

                        <div class="form-group">
                            <textarea style="height: 150px;" name="diskusi_user" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan Diskusi Anda!"></textarea>
                        </div>

                        <button class="btn btn-success float-right">Kirim</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</div>