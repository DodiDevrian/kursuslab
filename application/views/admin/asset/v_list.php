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
                                <li class="breadcrumb-item active" aria-current="page">Asset</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Isi Tabel Materi -->
            <div class="card-box mb-30">
                <div class="mb-30 pd-20 d-flex justify-content-between">
                    <h4 class="text-blue h4">Data <?= $title?></h4>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Tambah Gambar +</button>
                </div>

                <div class="pb-20">
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    ?>

                    <div class="pd-20">
                        <div class="row">
                                <?php foreach ($asset as $key => $value) { ?>
                                <div class="col-12 col-md-4 col-sm-6 col-lg-3">
                                    <div class="card mx-auto" style="width: 18rem;">
                                        <img style="width: 100%; height: 200px; object-fit: cover; object-position: 20% 10%;" src="<?= base_url('upload/foto_asset/' . $value->foto_asset) ?>" class="card-img-top" alt="...">
                                        <input class="form-copy" id="text-copy" value="<?=base_url('upload/foto_asset/' . $value->foto_asset)?>">
                                        
                                        
                                        <div class="card-body text-center">
                                            <button class="mb-3 btn btn-success" onclick="copyText()">
                                                <span class="fa fa-copy"></span> Copy Link
                                            </button>
                                            <br>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Asset</h5>
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
                        
                        echo form_open_multipart('admin/asset/add');
                    ?>
                    <div class="form-group">
                        <label>Upload Asset</label>
                        <input type="file" class="form-control-file form-control height-auto" name="foto_asset">
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

        <script>
            function copyText() {  
                var copyText = document.getElementById("text-copy");  
                copyText.select();  
                document.execCommand("copy");
            }
        </script>