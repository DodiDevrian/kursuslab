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
                            <li><a href="<?= base_url('kursus') ?>">Kursus</a></li>
                            <li><a href="<?= base_url('kursus/' . $materi -> id_kursus) ?>"><?= $materi -> nama_kursus ?></a></li>
                            <li style="color: #384158;">Pretest</li>
                            <li><?= $materi -> nama_materi ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<div class="container">
    <h3 class="text-center mt-4 mb-4">Pre Test Materi <?= $materi -> nama_materi ?></h3>
    <div class="wrapper">
        <div class="main">
            <div class="diskusi">
                <div class="course_container">

                </div>
            </div>
        </div>
    </div>
</div>