<?php
    $sum_user=0; $user_asprak=0; $user_praktikan=0;
    foreach ($praktikan as $key => $value) {
        if ($value->status_if == "Yes") {
            if ($value->role == 4) {
                $user_asprak++;
            }
            if ($value->role == 3) {
                $user_praktikan++;
            }
            $sum_user++;
        }
    }
?>

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
                    <span>
                        Total Praktikan &nbsp;&nbsp; : <b><?= $user_praktikan ?></b><br>
                        Total Asprak &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b><?= $user_asprak ?></b>
                    </span>
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
                                <th>Asprak ?</th>
                                <th>Foto</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($praktikan as $key => $value) {?>
                                <?php if ($value->status_if == "Yes") { ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $value->nama_user?></td>
                                <td><?= $value->nim?></td>
                                <td><?= $value->email?></td>
                                <td>
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
                                </td>
                                <td><img src="<?= base_url()?>/upload/foto_user/<?= $value->foto_user?>" alt="" width="100px"></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" type="button" data-toggle="modal" data-target="#viewKtm<?= $value->id_user?>"><i class="icon-copy dw dw-id-card2"></i> Lihat KTM</a>
                                            <a class="dropdown-item" href="<?= base_url('admin/praktikan/edit/' . $value->id_user) ?>"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="<?= base_url('admin/praktikan/delete/' . $value->id_user) ?>"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
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
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Status Asprak</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('admin/praktikan/edit_role_no/'. $value->id_user); ?>
                        <div class="form-group">
                        <label>Apakah ingin menghapus <b style="color: red;"><?= $value->nama_user ?></b> dari asprak ?</label>
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
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Status Asprak</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('admin/praktikan/edit_role_yes/'. $value->id_user); ?>
                        <div class="form-group">
                            <label>Apakah ingin menambahkan <b style="color: green;"><?= $value->nama_user ?></b> sebagai asprak?</label>
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

        <?php $no=1; foreach ($praktikan as $key => $value) {
            if ($value->status_if == 'Yes') { ?>
        <div class="modal fade" id="viewKtm<?= $value->id_user?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <img src="<?= base_url()?>/upload/foto_ktm/<?= $value->foto_ktm?>" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
        <?php }} ?>