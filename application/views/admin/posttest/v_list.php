<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Data Post-Test</h4>
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
                    <h4 class="text-blue h4">Data Post-Test</h4>
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
                                <th>Mata Kuliah</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kursus as $key => $value) { ?>
                            <tr>
                                <td><?= $value->nama_kursus?></td>
                                <td>
                                    <a class="btn btn-info" href="<?= base_url('admin/posttest/soal_posttest/' . $value->id_kursus) ?>" >Lihat Soal Post-Test</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>

        </div>