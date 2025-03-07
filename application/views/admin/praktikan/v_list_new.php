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
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                </div>
                <div class="pb-20">
                <?php
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible m-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                }
                ?>
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>No</th>    
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Email</th>
                                <!-- <th>Asprak ?</th> -->
                                <th>Foto</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($praktikan as $key => $value) {?>
                                <?php if ($value->status_if == 'No') { ?>
                                <tr>
                                    <td><?= $no++?></td>
                                    <td><?= $value->nama_user?></td>
                                    <td><?= $value->nim?></td>
                                    <td><?= $value->email?></td>
                                    <!-- <td>
                                        <div>
                                            <?php if ($value->role == 4) { ?>
                                                <a type="button" data-toggle="modal" data-target="#UbahRoleYes<?= $value->id_user?>">
                                                    <span class="notif-role badge badge-pill badge-success"><p class="label-role">Ya</p> <li class="fa fa-caret-down"></li></span>
                                                </a>
                                                <?php }else { ?>
                                                    <a type="button" data-toggle="modal" data-target="#UbahRoleNo<?= $value->id_user?>">
                                                        <span class="notif-role badge badge-pill badge-danger"><p class="label-role">Tidak</p> <li class="fa fa-caret-down"></li></span>
                                                    </a>
                                            <?php }  ?>
                                        </div>
                                    </td> -->
                                    <td><img src="<?= base_url()?>/upload/foto_user/<?= $value->foto_user?>" alt="" width="100px"></td>
                                    <td>
                                        <span>
                                            <a type="button" data-toggle="modal" data-target="#UbahRoleNo<?= $value->id_user?>">
                                                <img src="<?= base_url('assets/img/unchecked.png') ?>" width="40px" alt="">
                                            </a>
                                        </span>
                                        <span>
                                            <a type="button" data-toggle="modal" data-target="#UbahRoleYes<?= $value->id_user?>">
                                                <img src="<?= base_url('assets/img/checked.png') ?>" width="40px" alt="">
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- Modal Ubah Ya -->
        <?php foreach ($praktikan as $key => $value) { ?>
        <div class="modal fade" id="UbahRoleYes<?= $value->id_user?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cek Mahasiswa Teknik Informatika</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('admin/praktikan_baru/terima/'. $value->id_user); ?>
                        <div class="form-group">
                        <label>Apakah ingin menerima akun milik <b style="color: blue;"><?= $value->nama_user ?></b> ?</label>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <?php } ?>

        <!-- Modal Ubah Tidak -->
        <?php foreach ($praktikan as $key => $value) { ?>
        <div class="modal fade" id="UbahRoleNo<?= $value->id_user?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cek Mahasiswa Teknik Informatika</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('admin/praktikan_baru/tolak/'. $value->id_user); ?>
                        <div class="form-group">
                            <label>Apakah ingin menghapus <b style="color: red;"><?= $value->nama_user ?></b> untuk mendaftar akun?</label>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <?php } ?>