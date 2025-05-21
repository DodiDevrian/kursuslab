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
    <h3 class="text-center mt-4 mb-4">Forum Diskusi <?= $detail_kursus->nama_kursus ?></h3>
        <span class="mr-3">
            <a href="<?= base_url('diskusi') ?>"><i class="back_button fa fa-arrow-left" aria-hidden="true"></i></a>
        </span>
        <div class="btn-group mb-2">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-expanded="false">
                Pilih Praktikum
            </button>
            <div class="dropdown-menu dropdown-menu-lg-right">
                <?php foreach ($kursus as $key => $value) { ?>
                    <a class="dropdown-item" href="<?= base_url('diskusi/detail_diskusi/' . $value->id_kursus) ?>"><?= wordwrap($value->nama_kursus,35,"<br>\n");?></a>
                <?php } ?>
            </div>
            <?php if ($this->session->userdata('id_user')) { ?>
                <a href="<?= base_url('diskusi/detail_diskusi_me/' . $detail_kursus->id_kursus) ?>" class="btn btn-info ml-3">My Question</a>
            <?php } ?>
        </div>
    <?php if ($this->session->flashdata('error')): ?>
        <?= $this->session->flashdata('error'); ?>
    <?php endif; ?>
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
        </aside> -->

        <div class="main flex-chat">
            
            <div class="diskusi">
                <div class="course_container">
                        <?php
                            foreach ($diskusi as $key => $value) {
                                $tanggal_kirim = $value->created_diskusi; 
                                $tanggal_jawab = $value->modified_diskusi;

                            if ($id == $value->id_kursus) {

                            
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
                                                <img class="foto-diskusi" id="myImg<?= $value->id_diskusi ?>" src="<?= base_url('upload/foto_diskusi/' . $value->foto_diskusi) ?>" style="width:100%;">
                                            </div>
                                        <?php } ?>
                                        <div class="message-data <?php if ($value->foto_diskusi != NULL) {
                                            echo 'mt-3';
                                        } ?>">
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
                                            <div class="message other-message float-right mb-3">
                                            <?= $value->diskusi_asprak ?>
                                            </div>
                                            <?php if ($value->foto_diskusi_asprak != NULL) { ?>
                                                <div class="img-diskusi">
                                                    <img class="foto-diskusi" id="asImg<?= $value->id_diskusi ?>" src="<?= base_url('upload/foto_diskusi_asprak/' . $value->foto_diskusi_asprak) ?>" style="width:100%;">
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

            <?php if ($this->session->userdata('email')) { ?>
            <div class="diskusi mb-4">
                <div class="chat-diskusi">
                    <?php
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
    <!-- <div class="col mt-5 mb-3"><?php echo $pagination; ?></div> -->
</div>

<?php foreach ($diskusi as $key => $value) { ?>
<div id="myModal" class="modal-ps">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>

<script>
    var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg<?= $value->id_diskusi ?>");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
</script>
<?php } ?>

<?php foreach ($diskusi as $key => $value) { ?>
<div id="myModal" class="modal-ps">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>

<script>
    var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var as = document.getElementById("asImg<?= $value->id_diskusi ?>");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
as.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
</script>
<?php } ?>