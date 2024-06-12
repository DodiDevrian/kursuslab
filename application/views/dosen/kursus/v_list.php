<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Data Kursus</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kursus</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Isi Tabel Kursus -->
            <div class="card-box mb-30">
                <div class="mb-30 pd-20 d-flex justify-content-between">
                    <h4 class="text-blue h4">Data Kursus</h4>
                    <a href="<?= base_url('akursus/add') ?>" class="btn btn-secondary">Tambah Data Kursus +</a>
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
                                <th>Mata Kuliah</th>
                                <th>Dosen</th>
                                <th>Keterangan</th>
                                <th>Cover</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Mulai Foreach -->
                            <?php foreach ($kursus as $key => $value) {
                                if ($value->id_user == $this->session->userdata('id_user')) { ?>
                            <tr>
                                <td><?= $value->nama_kursus?></td>
                                <td><?= $value->nama_user?></td>
                                <td><?= substr(strip_tags($value->ket_kursus), 0, 80) ?>...</td>
                                <td><img width="100px" src="<?= base_url('upload/cover_kursus/') . $value->cover_kursus ?>" alt=""></td>
                                <td>
                                    <a class="dropdown-item" href="<?= base_url('dosen/kursus/list_materi/' . $value->id_kursus) ?>"><i class="dw dw-eye"></i> Lihat Materi</a>
                                </td>
                            </tr>
                            <?php }} ?>
                            <!-- End Foreach -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>