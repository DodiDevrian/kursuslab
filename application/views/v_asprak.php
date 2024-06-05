<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/courses.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/courses_responsive.css">

<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="<?= base_url() ?>">Home</a></li>
                            <li>Asprak</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<div class="team">
		<div class="team_background parallax-window" data-parallax="scroll" data-image-src="" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Asisten Praktikum</h2>
					</div>
				</div>
			</div>

			<div class="row team_row">
				<?php foreach ($asprak as $key => $value) { ?>
					<div class="col-lg-3 col-md-6 team_col">
						<div class="team_item">
							<div class="team_image"><img src="<?= base_url() ?>upload/foto_asprak/<?= $value->foto_asprak ?>" alt=""></div>
							<div class="team_body">
								<div class="team_title"><a href="#"><?= $value->nama_asprak ?></a></div>
								<div class="team_subtitle"><?= $value->nama_kursus ?></div>
								<div class="social_list">
									<ul>
										<li><a type="button" class="" data-toggle="modal" data-target="#nomor<?= $value->id_asprak ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
										<li><a type="button" class="" data-toggle="modal" data-target="#nomor<?= $value->id_asprak ?>"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<?php foreach ($asprak as $key => $value) { ?>
		<div class="modal fade" id="nomor<?= $value->id_asprak ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $value->nama_asprak ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Nomor HP : 0<?= $value->no_hp ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success"><a style="color: white;" target="_blank" href="https://wa.me/62<?= $value->no_hp ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></button>
				</div>
				</div>
			</div>
		</div>
	<?php } ?>