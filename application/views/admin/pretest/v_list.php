<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4><?= $title ?></h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pretest</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Isi Tabel Kursus -->
            <div class="card-box mb-30">
                <div class="mb-30 pd-20 d-flex justify-content-between">
                    <h4 class="text-blue h4">Data Pre-Test</h4>
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
                                <th>Mata Kuliah</th>
                                <th class="datatable-nosort">Materi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Mulai Foreach -->
                            <?php $no=1; foreach ($pretest as $key => $value) { ?>
                                <?php $summateri=1; foreach ($materi as $key => $valuemateri) {
                                    if ($value->id_kursus == $valuemateri->id_kursus) {
                                        $summateri++;
                                    }
                                } ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                    
                                <td><?= $value->nama_kursus?></td>
                                <td>
                                <?php foreach ($materi as $key => $valuemateri) {
                                    if ($value->id_kursus == $valuemateri->id_kursus) { ?>
                                        <div class="mt-4 mb-4">
                                            <a href="<?= base_url('admin/pretest/list_soal/' . $valuemateri->id_materi) ?>" class="btn btn-success"><?= $valuemateri->nama_materi?></a>
                                        </div>
                                    <?php }} ?>
                                </td>
                            </tr>
                            <?php } ?>
                            <!-- End Foreach -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>