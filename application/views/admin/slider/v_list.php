<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="d-flex justify-content-between">
                            <div class="stat">
                                <div class="title">
                                    <h4>Data Slider</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Slider</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="but">
                                <a href="<?= base_url('admin/slider/add') ?>" class="btn btn-secondary">Tambah Gambar +</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-wrap">
            <?php
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                }
            ?>
					<ul class="row">
                        <?php foreach ($slider as $key => $value) { ?>
						<li class="col-lg-4 col-md-6 col-sm-12">
							<div class="da-card box-shadow">
								<div class="da-card-photo">
									<img src="<?= base_url() ?>upload/foto_slider/<?= $value->foto_slider?>" alt="" style="width: 100%; height: 320px; object-fit: cover; object-position: 20% 10%;">
									<div class="da-overlay">
										<div class="da-social">
										<h5 class="mb-10 color-white pd-20"><?= $value->nama_slider?></h5>
											<ul class="clearfix">
												<li><a href="<?= base_url() ?>upload/foto_slider/<?= $value->foto_slider?>" data-fancybox="images"><i class="fa fa-picture-o"></i></a></li>
												<li><a href="<?= base_url('admin/slider/edit/' . $value->id_slider) ?>"><i class="dw dw-edit2"></i></a></li>
												<li><a href="<?= base_url('admin/slider/delete/' . $value->id_slider) ?>"><i class="dw dw-delete-3"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
                        <?php } ?>
					</ul>
				</div>

        </div>