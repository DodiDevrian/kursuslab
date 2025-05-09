
<div class="super_container">
	<!-- Header -->
	<header class="header">
		<!-- Top Bar -->
		<div class="top_bar">
			<div class="top_bar_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
								<ul class="top_bar_contact_list">
									<li>
										<div class="question">
											<?php date_default_timezone_set("ASIA/JAKARTA");
											
											$tgl_skr = date('Y-m-d');
											switch (date('m', strtotime($tgl_skr))) {
												case '01':
													$bln = 'Januari';
												break;
												case '02':
													$bln = 'Februari';
												break;
												case '03':
													$bln = 'Maret';
												break;
												case '04':
													$bln = 'April';
												break;
												case '05':
													$bln = 'Mei';
												break;
												case '06':
													$bln = 'Juni';
												break;
												case '07':
													$bln = 'Juli';
												break;
												case '08':
													$bln = 'Agustus';
												break;
												case '09':
													$bln = 'September';
												break;
												case '10':
													$bln = 'Oktober';
												break;
												case '11':
													$bln = 'November';
												break;
												case '12':
													$bln = 'Desember';
												break;
													
												default:
													# code...
													break;
											}

											$hr_skr = date('D');
											switch (date('D', strtotime($tgl_skr))) {
												case 'Sun':
													$hari = 'Minggu';
												break;
												case 'Mon':
													$hari = 'Senin';
												break;
												case 'Tue':
													$hari = 'Selasa';
												break;
												case 'Wed':
													$hari = 'Rabu';
												break;
												case 'Thu':
													$hari = 'Kamis';
												break;
												case 'Fri':
													$hari = "Jum'at";
												break;
												case 'Sat':
													$hari = 'Sabtu';
												break;
												
												default:
													break;
											}

											?>
											<?= $hari . ', ' . date('d', strtotime($tgl_skr)) . ' ' . $bln . ' ' . date('Y', strtotime($tgl_skr))?>
										</div>
										<li class="question"><?= date('H:i') ?> WIB</li>
									</li>
									<li><a style="color: white;" href="http://if.itera.ac.id/" target="_blank"><i class="fa fa-solid fa-globe"></i> &nbsp;IF ITERA</a></li>
								</ul>
								<div class="top_bar_login ml-auto">
									
										<?php if($this->session->userdata('id_user')) { ?>
											<!-- <div class="dropdown">
												<button class="btn login_button dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="color: white;">
													<?php echo $this->session->userdata('username') ?>
												</button>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
													<a class="dropdown-item" href="<?= base_url('auth/logout')?>"><i class="fa fa-sign-out"></i> Logout</a>
												</div>
											</div> -->
											<div class="flex-profile">
												<?php if ($this->session->userdata('role')==4) { ?>
													<div class="panel-asprak mr-3">
														<a class="link-profile" href="<?= base_url('asisten/dashboard') ?>"><i class="fa fa-cog" aria-hidden="true"></i> Panel Asisten</a>
													</div>
												<?php  } ?>
												<div class="button-profile">
													<a class="link-profile" href="<?= base_url('profile/mahasiswa/' . $this->session->userdata('slug_user')) ?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $this->session->userdata('nama_user') ?></a>
												</div>
												<div class="login_button">
													<a href="" type="button" data-toggle="modal" data-target="#logout"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
												</div>
											</div>
										<?php }else{ ?>	
											<div class="flex-profile">
												<div class="button-profile">
														<a class="link-profile" href="<?= base_url('auth/register')?>">Register</a>
													</div>
												<div class="login_button">
													<a href="<?= base_url('auth/login')?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
												</div>
											</div>
										<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>