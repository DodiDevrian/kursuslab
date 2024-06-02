<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Data Materi</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Materi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Isi Tabel Materi -->
            <div class="card-box mb-30">
                <div class="mb-30 pd-20 d-flex justify-content-between">
                    <h4 class="text-blue h4">Data Materi</h4>
                    <a href="<?= base_url('admin/materi/add') ?>" class="btn btn-secondary">Tambah Data Materi +</a>
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
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>No</th>    
                                <th>Nama Materi</th>
                                <th>Mata Pelajaran</th>
                                <th>Keterangan</th>
                                <th>Id Youtube</th>
                                <th>File</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Mulai Foreach -->
                            <?php $no=1; foreach ($materi as $key => $value) { ?>
                            <tr>
                            <td><?= $no++?></td>
                                <td><?= $value->nama_materi?></td>
                                <td><?= $value->nama_kursus?></td>
                                <td><?= substr(strip_tags($value->ket_materi), 0, 40) ?>...</td>
                                <td><?= $value->id_yt?><br> <a class="mr-auto" target="_blank" href="https://youtu.be/<?= $value->id_yt?>"><i style="font-size: 25px;" class="icon-copy fi-play-video"></i></a></td>
                                <td><?= $value->doc_materi?></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('admin/materi/edit/' . $value->id_materi) ?>"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="<?= base_url('admin/materi/delete/' . $value->id_materi) ?>"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                            <!-- End Foreach -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>