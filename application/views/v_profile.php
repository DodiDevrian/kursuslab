<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/contact.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/styles/contact_responsive.css">

<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="<?= base_url() ?>">Home</a></li>
                            <li><?php echo $this->session->userdata('nama_user') ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-4">

        </div>
        <div class="col-lg-8">

        </div>
    </div>
</div>

<div class="contact_info_container mt-5 mb-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="contact_form">
							<div class="contact_info_title">Contact Form</div>
							<form action="#" class="comment_form" method="POST">
								<div>
									<div class="form_title">Name</div>
									<input type="text" class="comment_input" required="required">
								</div>
								<div>
									<div class="form_title">Email</div>
									<input type="text" class="comment_input" required="required">
								</div>
								<div>
									<div class="form_title">Message</div>
									<textarea class="comment_input comment_textarea" required="required"></textarea>
								</div>
								<div>
									<button type="submit" class="comment_button trans_200">Kirim</button>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="contact_info">
							<div class="contact_info_title">Contact Info</div>
							<div class="contact_info_location">
								<div class="contact_info_location_title">Laboran</div>
								<ul class="location_list">
									<li>Gedung Laboratorium Teknik 3 ITERA (GLT 3)</li>
									<li>+62 896 - 2874 - 4896</li>
									<li>dodi.119140023@student.itera.ac.id</li>
								</ul>
							</div>
							<div class="contact_info_location mt-5">
								<div class="contact_info_location_title">Koordinator Asprak</div>
								<ul class="location_list">
									<li>Way Huwi, Lampung Selatan, Lampung</li>
									<li>0876-2873-2983</li>
									<li>dodidev@gmail.com</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>