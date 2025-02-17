<style>
    .form-copy {
        width: 95%;
        margin: auto;
        margin-top: 10px;
        height: 50px;
        border: solid 1px #bfbfbf;
        background: #f9f9f9;
        border-radius: 5px;
        padding: 0 14px;
    }
 
    button.btn-copy{
        padding: 20px 10px;
        color: #fff;
        background-color: #5cb85c;
        border-color: #419641;
        border-top: solid 2px #84d884;
        border-left: solid 2px #84d884;
        border-right: solid 2px #419641;
        border-bottom: solid 2px #419641;
    }
    button.btn-copy:hover{
        background-color: #419641;
    }
    input#code:focus {
        outline: none!important;
    }
    .btn-circle {
        border-radius: 50%;
        position: relative;
        top: -29px;
        float: right;
        border-color: #5cb85c;
    }
</style>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Data <?= $title?></h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $title?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Isi Tabel Materi -->
            <div class="card-box mb-30">
                <div class="mb-30 pd-20 d-flex justify-content-between">
                    <h4 class="text-blue h4">Data <?= $title?></h4>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Ubah Gambar <i class="ml-2 fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </div>

                <div class="pb-20 text-center">
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible m-3">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    ?>
                    <img class="foto_login" src="<?= base_url('upload/foto_login/' . $clogin->foto_login ) ?>" alt="" style="width: 60%">
                </div>
                
            </div>

        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Cover Login</h5>
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
                        
                        echo form_open_multipart('admin/clogin/edit/' . $clogin->id_clogin);
                    ?>
                    <div class="form-group">
                        <label>Ubah Cover</label>
                        <input type="file" class="form-control-file form-control height-auto" name="foto_login">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
                <?php echo form_close(); ?>
                </div>
            </div>
        </div>