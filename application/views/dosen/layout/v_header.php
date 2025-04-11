<body>
	<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="<?= base_url() ?>assets/img/ifiterablack.png" width="250px" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->
	<?php 
		foreach ($dosen as $key => $value) {
			if ($this->session->userdata('id_admin') == $value->id_admin) {
				$foto_dosen = $value->foto_dosen;
			}
		}
	?>
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>

			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<?php if ($this->session->userdata('foto_dosen')==NULL) { ?>
								<img src="<?= base_url('assets/img/profil.png') ?>">
							<?php } else { ?>
								<img src="<?= base_url('upload/foto_dosen/') . $foto_dosen ?>" style="width: 100%; height: 52px; object-fit: cover; object-position: 20% 10%;">
							<?php } ?>
							
						</span>
						<span class="user-name"><?= $this->session->userdata('username') ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="<?= base_url('dosen/dashboard/profile/' . $this->session->userdata('id_admin')) ?>"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="<?= base_url()?>auth/logout"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>