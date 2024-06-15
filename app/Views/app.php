<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $title ?></title>
    <meta content="<?= $description ?>" name="description">
    <meta content="<?= $keywords ?>" name="keywords">
    <meta name="robots" content="<?= $index == 'index' ? "index" : "noindex" ?>, follow" />
    <link href="<?= base_url('favicon.ico') ?>" rel="icon">
    <link href="<?= base_url('images/apple-touch-icon.png" rel="apple-touch-icon') ?>">
    <link href="<?= base_url('template/vendor/animate.css/animate.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('template/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('template/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('template/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('template/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('template/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('template/css/style.css') ?>" rel="stylesheet">
</head>
<body>
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope-fill d-flex align-items-center"><a href="mailto:contact@example.com">admin@smkn2kupang.sch.id</a></i>
                <i class="bi bi-telephone-fill d-flex align-items-center ms-4"><span>(0380) 833239</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
            </div>
    </section>
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="<?= base_url() ?>"><img src="<?= base_url('images/logo.png') ?>" alt="" class="img-fluid"></a>
            </div>
            <nav id="navbar" class="navbar fw-bold">
                <ul>
                    <li><a class="<?= $currentPage == 'Beranda' ? "active" : '' ?>" href="<?= base_url() ?>">Beranda</a></li>
                    <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="<?= $currentPage == 'Sambutan' ? "active" : '' ?>" href="<?= base_url('sambutan') ?>">Sambutan</a></li>
                            <li><a class="<?= $currentPage == 'Visi dan Misi' ? "active" : '' ?>" href="<?= base_url('visi-misi') ?>">Visi Misi</a></li>
                            <li><a class="<?= $currentPage == 'Tenaga Pendidik' ? "active" : '' ?>" href="<?= base_url('tenaga-pendidik') ?>">Tenaga Pendidik</a></li>
                            <li><a class="<?= $currentPage == 'Sarana Prasarana' ? "active" : '' ?>" href="<?= base_url('sarana-prasarana') ?>">Sarana Prasarana</a></li>
                            <li><a class="<?= $currentPage == 'Galeri Sekolah' ? "active" : '' ?>" href="<?= base_url('galeri') ?>">Galeri</a></li>
                        </ul>
                    </li>
                    <li><a class="<?= $currentPage == 'Prestasi' ? "active" : '' ?>" href="<?= base_url('prestasi') ?>">Prestasi</a></li>
                    <li class="dropdown"><a href="#"><span>Akademik</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li class="dropdown <?= $currentPage == 'Modul' ? "active" : '' ?>">
                                <a href="#"><span>Modul</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="<?= base_url('modul/permesinan') ?>">Permesinan</a></li>
                                </ul>
                                </li>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="<?= $currentPage == 'Pengumuman' ? "active" : '' ?>" href="<?= base_url('pengumuman') ?>">Pengumuman</a></li>
                            <li><a class="<?= $currentPage == 'Agenda' ? "active" : '' ?>" href="<?= base_url('agenda') ?>">Agenda</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('berita') ?>">Blog</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <?= $this->renderSection('hero') ?>
    <main id="main">
        <?php if($breadcrumbs): ?>
            <section id="breadcrumbs" class="breadcrumbs">
                <div class="container">
                    <ol>
                        <?php forEach($prevPage as $page): ?>
                            <li><a href="<?= $page[1] ?>"><?= $page[0] ?></a></li>
                        <?php endforeach; ?>
                        <li><?= $title ?></li>
                    </ol>
                    <h2><?= $title ?></h2>
                </div>
            </section>
        <?php endif; ?>
        <?= $this->renderSection('main') ?>
        <?= $this->renderSection('beforeFooter') ?>
    </main>
    <footer id="footer" class="bg-secondary">
        <div class="footer-top bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 footer-info">
                        <h3 class="text-white">SMK N 2 Kupang</h3>
                        <p>Jalan Jend. A. Yani No. 48<br>
                        Kupang<br><br>
                        <strong class="me-2">Telepon:</strong>(0380) 833239<br>
                        <strong class="me-2">Email:</strong>admin@smkn2kupang.sch.id<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Menu</h4>
                        <ul>
                            <li><i class='bx bxs-square-rounded'></i> <a href="<?= base_url('tenaga-pendidik') ?>">Tenaga Pendidik</a></li>
                            <li><i class='bx bxs-square-rounded'></i> <a href="<?= base_url('sarana-prasarana') ?>">Sarana Prasarana</a></li>
                            <li><i class='bx bxs-square-rounded'></i> <a href="<?= base_url('prestasi') ?>">Prestasi</a></li>
                            <li><i class='bx bxs-square-rounded'></i> <a href="<?= base_url('galeri') ?>">Galeri</a></li>
                            <li><i class='bx bxs-square-rounded'></i> <a href="<?= base_url('pengumuman') ?>">Pengumuman</a></li>
                            <li><i class='bx bxs-square-rounded'></i> <a href="<?= base_url('agenda') ?>">Agenda</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Links</h4>
                        <ul>
                            <li><i class='bx bxs-square-rounded'></i> <a href="#">Blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>SMK N 2 Kupang</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center rounded-circle"><i class="bi bi-arrow-up-short"></i></a>
    <script src="<?= base_url('template/vendor/purecounter/purecounter_vanilla.js') ?>"></script>
    <script src="<?= base_url('template/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('template/vendor/glightbox/js/glightbox.min.js') ?>"></script>
    <script src="<?= base_url('template/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
    <script src="<?= base_url('template/vendor/swiper/swiper-bundle.min.js') ?>"></script>
    <script src="<?= base_url('template/vendor/waypoints/noframework.waypoints.js') ?>"></script>
    <!-- <script src="<?= base_url('template/vendor/php-email-form/validate.js') ?>"></script> -->
    <script src="<?= base_url('template/js/main.js') ?>"></script>
</body>
</html>