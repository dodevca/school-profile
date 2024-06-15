<?= $this->extend('app') ?>

<?= $this->section('main') ?>
<section id="" class="navigation pb-0">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
            <h2 class="h4 mb-0"><?= !empty($data['query']) ?  "Hasil dari : " . ucwords($data['query']) : "Daftar Album SMK N 2 Kupang" ?></h2>
            <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3">
                <div class="dropdown w-100 order-2 order-lg-1">
                    <button class="btn btn-outline-secondary dropdown-toggle rounded w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-funnel me-2"></i><?= ucwords($data['filter']) ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= !empty($data['query']) ? base_url('galeri?q=' . $data['query'] . '&f=terbaru') : base_url('galeri?f=terbaru') ?>">Terbaru</a></li>
                        <li><a class="dropdown-item" href="<?= !empty($data['query']) ? base_url('galeri?q=' . $data['query'] . '&f=terlama') : base_url('galeri?f=terlama') ?>">Terlama</a></li>
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
<section id="" class="">
	<div class="container">
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
                <?php forEach($data['results'] as $album): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="<?= base_url('galeri/' . $album['album_id'] . '/' . $album['slug']) ?>">
                            <div class="rounded shadow">
                                <img src="<?= base_url('uploads/album/' . $album['headline']) ?>" class="w-100 h-auto rounded-top" style="aspect-ratio: 4 / 3;object-fit:cover" alt="<?= $album['title'] ?>">
                                <div class="px-4 py-3">
                                    <h4><?= $album['title'] ?></h4>
                                    <p class="text-muted"><i class="bi bi-calendar me-2"></i><?= $fmt->format(strtotime($album['date'])) ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center pb-5">
                <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                <p>Tidak ada album.</p>
            </div>
        <?php endif; ?>
        <?= $this->include('layouts/partials/pagination') ?>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section("beforeFooter") ?>
<section>
    <div class="container">
        <div class="d-flex align-items-center justify-content-center gap-3">
            <a href="<?= base_url('sarana-prasarana') ?>" class="btn btn-primary rounded-5">
                <i class="bi bi-chevron-compact-left me-2"></i>Sebelumnya
            </a>
            <a href="<?= base_url('#') ?>" class="btn btn-primary rounded-5 disabled" tabindex="-1" role="button" aria-disabled="true">
                Selanjutnya<i class="bi bi-chevron-compact-right ms-2"></i>
            </a>
        </div>
        <div class="static-pagination d-flex align-items-center justify-content-center gap-3 mt-4">
            <h5 class="text-end">Sarana Prasarana</h5>
            <span class="bg-secondary"></span>
            <h5></h5>
        </div>
    </div>
</section>
<?= $this->endSection() ?>