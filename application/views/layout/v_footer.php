<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Logout</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
				<label>Apakah ingin menghapus dari asprak ?</label>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<a href="<?= base_url('auth/logout')?>" type="button" class="btn btn-primary">Ya</a>
			</div>
		</div>
	</div>
</div>

<footer class="footer">
		<div class="footer_background" style="background-image:url(<?= base_url() ?>assets/img/footer_background.png"></div>
		<div class="container">
			<div class="row footer_row">
				<div class="col">
					<div class="footer_content">
						<div class="row">

							<div class="col-lg-4 footer_col">
					
								<!-- Footer About -->
								<div class="footer_section footer_about">
									<div class="footer_logo_container">
										<a href="#">
											<img src="<?= base_url() ?>assets/img/ifitera.png" alt="" width="250px">
											<!-- <div class="footer_logo_text">Unic<span>at</span></div> -->
										</a>
									</div>

									<div class="footer_social">
										<ul>
											<li><a href="https://www.facebook.com/itera.official" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="https://www.youtube.com/@InstitutTeknologiSumatera" target="_blank"><i class="fa fa-youtube-play"  aria-hidden="true"></i></a></li>
											<li><a href="https://www.instagram.com/iteraofficial/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
											<li><a href="https://twitter.com/ITERAOfficial" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										</ul>
									</div>
								</div>
								
							</div>

							<div class="col-lg-4 footer_col">
					
								<!-- Footer Contact -->
								<div class="footer_section footer_contact">
									<div class="footer_title">Contact</div>
									<div class="footer_contact_info">
										<ul>
											<li>Email: dodi.119140023@student.itera.ac.id</li>
											<li>Phone:  +(62) 896 2874 4896</li>
											<li>Bandar Jaya, Lampung Tengah</li>
										</ul>
									</div>
								</div>
								
							</div>

							<div class="col-lg-4 footer_col">
					
								<!-- Footer links -->
								<div class="footer_section footer_links">
									<div class="footer_title">Menu</div>
									<div class="footer_links_container">
										<ul>
											<li><a href="<?= base_url() ?>">Home</a></li>
											<li><a href="about.html">Praktikum</a></li>
											<li><a href="contact.html">Asprak</a></li>
											<li><a href="#">Forum Diskusi</a></li>
											<li><a href="#">About</a></li>
											<li><a href="#">Login</a></li>
										</ul>
									</div>
								</div>
								
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="row copyright_row">
				<div class="col">
					<div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-start ">
						<div class="cr_text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->Copyright &copy;<script>document.write(new Date().getFullYear());</script> Dodi Devrian Andrianto</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="<?= base_url() ?>assets/frontend/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/styles/bootstrap4/popper.js"></script>
<script src="<?= base_url() ?>assets/frontend/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/plugins/greensock/TweenMax.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?= base_url() ?>assets/frontend/plugins/easing/easing.js"></script>
<script src="<?= base_url() ?>assets/frontend/plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/custom.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/course.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/courses.js"></script>

<script src="<?= base_url() ?>assets/js/script.js"></script>
</body>
</html>