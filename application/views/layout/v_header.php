
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
													# code...
													break;
											}

											?>
											<?= $hari . ', ' . date('d', strtotime($tgl_skr)) . ' ' . $bln . ' ' . date('Y', strtotime($tgl_skr))?>
										</div>
										<li class="question"><?= date('H:i') ?> WIB</li>
									</li>
								</ul>
								<div class="top_bar_login ml-auto">
									<div class="login_button"><a href="#">Login</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>