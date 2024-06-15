<?= $this->extend('app') ?>

<?= $this->section('hero') ?>
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(/template/img/slide/slide-1.jpg)">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <p class="animate__animated animate__fadeInUp">Selamat Datang di</p>               
                            <h2 class="animate__animated animate__fadeInDown">SMK N 2 KUPANG</h2>
                        </div>
                    </div>
                </div>
                <?php if(count($data['important']) != 0 || $data['important'] != null): ?>
                    <!-- Slide 2 -->
                    <div class="carousel-item" style="background-image: url(/images/hero/slide-2.jpg)">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated fanimate__adeInDown"><?= $data['important'][0]['title'] ?></h2>
                                <p class="animate__animated animate__fadeInUp">
                                    <?php $content = strip_tags($data['important'][0]['content']); ?>
                                    <?= strlen($content) >= 250 ? substr($content, 0, 250) . ' ...' : $content ?>
                                </p>
                                <a href="<?= base_url('pengumuman/' . $data['important'][0]['announcement_id'] . '/' . $data['important'][0]['slug']) ?>" class="btn btn-get-started animate__animated animate__fadeInUp mb-5">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(count($data['event']) != 0 || $data['event'] != null): ?>
                    <!-- Slide 3 -->
                    <div class="carousel-item" style="background-image: url(/images/hero/slide-3.jpg)">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown"><?= $data['event'][0]['name'] ?></h2>
                                <p class="animate__animated animate__fadeInUp"><?= strlen($data['event'][0]['description']) >= 250 ? substr($data['event'][0]['description'], 0, 250) . ' ...' : $data['event'][0]['description'] ?></p>
                                <a href="<?= base_url('agenda/' . $data['event'][0]['event_id'] . '/' . $data['event'][0]['slug']) ?>" class="btn btn-get-started animate__animated animate__fadeInUp mb-5">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <a class="carousel-control-prev" href="<?= base_url('#heroCarousel') ?>" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="<?= base_url('#heroCarousel') ?>" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<section id="featured" class="featured">
    <div class="container">
        <div class="row justify-content-center">
            <?php if(count($data['news']) != 0 || $data['news'] != null): ?>
                <?php forEach($data['news'] as $key => $news): ?>
                    <div class="col-lg-4 <?= $key > 0 ? ' mt-4 mt-lg-0' : '' ?>">
                        <a href="<?= base_url('news/' . $news['news_id'] . '/' . $news['slug']) ?>">
                            <div class="icon-box rounded p-0">
                                <img src="<?= base_url('uploads/berita/' . $news['image']) ?>" class="img-fluid rounded-top">
                                <div class="p-4">
                                    <h3 class="mb-0"><?= $news['title'] ?></h3>
                                    <p class="my-3 text-muted"><small><i class="bi bi-calendar d-inline fs-6 me-2"></i><?= $news['date'] ?></small></p>
                                    <?php $content = strip_tags($news['content']); ?>
                                    <p><?= strlen($content) >= 100 ? substr($content, 0, 100) . ' ...' : $content ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center pb-5">
                    <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                    <p>Tidak ada berita.</p>
                </div>
            <?php endif; ?>
        </div>
        <?php if(count($data['news']) != 0 || $data['news'] != null): ?>
            <div class="text-center mt-5">
                <a href="<?= base_url('#') ?>" class="btn btn-outline-primary rounded-5">Lebih banyak</a>
            </div>
        <?php endif; ?>
    </div>
</section>
<section id="about" class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
            <video width="100%" height="auto" class="rounded-3 shadow" controls>
                <source src="<?= base_url('/videos/SMKN 2 KUPANG.mp4') ?>" type="video/mp4">
                Browser anda tidak mendukung.
            </video>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
                <h3 class="mb-4">Profil Singkat</h3>
                <p class="fst-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                </p>
                <ul>
                    <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                    <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                </ul>
                <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum
                </p>
                <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center justify-content-lg-start">
                    <a href="<?= base_url('sambutan') ?>" class="btn btn-primary mb-3 mb-lg-0 me-lg-2">Sambutan Kepala Sekolah</a>
                    <a href="<?= base_url('visi-misi') ?>" class="btn btn-outline-primary">Visi Misi</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="services" class="services">
    <div class="container">
        <div class="section-title">
            <h2>Pengumuman</h2>
        </div>
        <div class="row justify-content-center">
            <?php if(count($data['announcement']) != 0 || $data['announcement'] != null): ?>
                <?php forEach($data['announcement'] as $key => $announcement): ?>
                    <div class="col-lg-4 col-md-6 <?= $key != 0 ? 'mt-4 mt-md-0' : '' ?>">
                        <div class="icon-box text-start rounded p-3">
                            <div class="d-flex align-items-center <?= $announcement['important'] == 1 ? "justify-content-between" : "justify-content-end" ?> mb-4">
                                <?php if($announcement['important'] == 1): ?>
                                    <button type="button" class="pop-over btn btn-warning rounded-5" data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Pengumuman bersifat penting">
                                        <small>Penting</small>
                                    </button>
                                <?php endif; ?>
                                <p class="text-end text-muted"><?= $announcement['date'] ?></p>
                            </div>
                            <h4><a href="<?= base_url($announcement['announcement_id']) ?>"><?= $announcement['title'] ?></a></h4>
                            <p>
                                <?php $content = strip_tags($announcement['content']); ?>
                                <?= strlen($content) >= 100 ? substr($content, 0, 100) . ' ...' : $content ?>
                            </p>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="<?= base_url('pengumuman/' . $announcement['announcement_id'] . '/' . $announcement['slug']) ?>" class="btn-link">Lihat pengumuman »</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center pb-5">
                    <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                    <p>Tidak ada pengumuman.</p>
                </div>
            <?php endif; ?>
        </div>
        <div class="text-center mt-5">
            <a href="<?= base_url('pengumuman') ?>" class="btn btn-outline-primary rounded-5">Lebih banyak</a>
        </div>
    </div>
</section>
<section id="counts" class="counts">
    <div class="container">
        <div class="section-title">
            <h2>Agenda Mendatang</h2>
        </div>
        <div class="row no-gutters justify-content-center">
            <?php if(count($data['event']) != 0 || $data['event'] != null): ?>
                <?php
                $fmt = new IntlDateFormatter(
                    'id_ID',
                    IntlDateFormatter::FULL, 
                    IntlDateFormatter::FULL
                );
                $fmt->setPattern('MMMM');
                ?>
                <?php forEach($data['event'] as $event): ?>
                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box rounded">
                            <div class="d-flex align-items-start justify-content-between">
                                <div>
                                    <span data-purecounter-start="0" data-purecounter-end="<?= date("d", strtotime($event['date_start'])) ?>" data-purecounter-duration="0" class="purecounter m-0 mb-2"><?= date("d", strtotime($event['date_start'])) ?></span>
                                    <h3 class="mb-0"><?= $fmt->format(strtotime($event['date_start'])) ?></h3>
                                </div>
                                <div class="bg-accent px-2 py-1 rounded-5">
                                    <div class="d-flex align-items-center" style="font-size: 13px"><i class="bi bi-clock text-white me-2" style="display:inline;font-size:13px;"></i> <?= date("H:i", strtotime($event['date_start'])) ?></div>
                                </div>
                            </div>
                            <h4 class="mt-4"><?= $event['name'] ?></h4>
                            <p class="h4"><?= strlen($event['description']) >= 50 ? substr($event['description'], 0, 50) . ' ...' : $event['description'] ?></p>
                            <a href="<?= base_url('agenda/' . $event['event_id'] . '/' . $event['slug']) ?>" class="text-end">Selengkapnya »</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center pb-5">
                    <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                    <p>Tidak ada agenda.</p>
                </div>
            <?php endif; ?>
        </div>
        <?php if(count($data['event']) != 0 || $data['event'] != null): ?>
            <div class="text-center mt-5">
                <a href="<?= base_url('agenda') ?>" class="btn btn-outline-primary rounded-5">Lebih banyak</a>
            </div>
        <?php endif; ?>
    </div>
</section>
<section id="clients" class="clients">
    <div class="container">
        <div class="section-title">
            <h2>Album Terbaru</h2>
            <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>
        <?php if(count($data['gallery']) != 0 || $data['gallery'] != null): ?>
            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <?php forEach($data['gallery'] as $album): ?>
                        <div class="swiper-slide">
                            <a href="<?= base_url('galeri/' . $album['album_id'] . '/' . $album['slug']) ?>">
                                <img src="<?= base_url('uploads/album/' . $album['headline']) ?>" class="img-fluid rounded" alt="">
                                <h3 class="h6 text-center mt-3"><?= $album['title'] ?></h3>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        <?php else: ?>
            <div class="text-center pb-5">
                <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                <p>Tidak ada album.</p>
            </div>
        <?php endif; ?>
    </div>
</section>
<?= $this->endSection() ?>