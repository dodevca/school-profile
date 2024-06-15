<?= $this->extend('app') ?>

<?= $this->section('main') ?>
<section id="" class="navigation pb-0">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
            <h2 class="h4 mb-0"><?= !empty($data['query']) ?  "Hasil dari : " . ucwords($data['query']) : "Blog SMK N 2 Kupang" ?></h2>
            <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3">
                <div class="dropdown w-100 order-2 order-lg-1">
                    <button class="btn btn-outline-secondary dropdown-toggle rounded w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-funnel me-2"></i><?= ucwords($data['filter']) ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= !empty($data['query']) ? base_url('berita?q=' . $data['query'] . '&f=terbaru') : base_url('berita?f=terbaru') ?>">Terbaru</a></li>
                        <li><a class="dropdown-item" href="<?= !empty($data['query']) ? base_url('berita?q=' . $data['query'] . '&f=terlama') : base_url('berita?f=terlama') ?>">Terlama</a></li>
                    </ul>
                </div>
                <div class="search-form w-100 order-1 order-lg-2">
                    <?= form_open('', ['class' => 'border-secondary rounded', 'method' => 'get']) ?>
                        <input type="text" id="search" name="q" <?= !empty($data['query']) ? 'value="' . $data['query'] . '"' :  '' ?> placeholder="Cari disini ...">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <?php if(count($data['results']) != 0 || $data['results'] != null): ?>
        <div class="row">
            <?php
            $fmt = new IntlDateFormatter(
                'id_ID',
                IntlDateFormatter::FULL, 
                IntlDateFormatter::FULL
            );
            $fmt->setPattern('dd MMMM YYYY');
            ?>
            <?php forEach($data['results'] as $news): ?>
                <div class="col-lg-4 col-md-6 mb-4 entries">
                    <article class="d-flex flex-column justify-content-between h-100 entry rounded p-0 pb-4">
                        <img src="<?= base_url('uploads/berita/' . $news['image']) ?>" class="img-fluid rounded-top">
                        <div class="py=2 px-4">
                            <h2 class="entry-title">
                                <a href="<?= base_url('berita/' . $news['news_id'] . '/' . $news['slug']) ?>"><?= $news['title'] ?></a>
                            </h2>
                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-clock"></i>
                                        <span>
                                            <time datetime="<?= date("Y-m-d", strtotime($news['date'])) ?>"><?= $news['timeElapsed'] ?></time>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p>
                                    <?php $content = strip_tags($news['content']); ?>
                                    <?= strlen($content) >= 100 ? substr($content, 0, 150) . ' ...' : $content ?>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-end pe-4">
                            <a href="<?= base_url('berita/' . $news['news_id'] . '/' . $news['slug']) ?>" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
            <div class="text-center">
                <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                <p>Tidak ada berita.</p>
            </div>
        <?php endif; ?>
        <?= $this->include('layouts/partials/pagination') ?>
    </div>
</section>
<?= $this->endSection() ?>