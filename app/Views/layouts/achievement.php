<?= $this->extend('app') ?>

<?= $this->section('main') ?>
<section id="" class="navigation pb-0">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
            <h2 class="h4 mb-0"><?= !empty($data['query']) ?  "Hasil dari : " . ucwords($data['query']) : "Prestasi Siswa SMK N 2 Kupang" ?></h2>
            <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3">
                <div class="dropdown w-100 order-2 order-lg-1">
                    <button class="btn btn-outline-secondary dropdown-toggle rounded w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-funnel me-2"></i><?= ucwords($data['filter']) ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= !empty($data['query']) ? base_url('prestasi?q=' . $data['query'] . '&f=terbaru') : base_url('prestasi?f=terbaru') ?>">Terbaru</a></li>
                        <li><a class="dropdown-item" href="<?= !empty($data['query']) ? base_url('prestasi?q=' . $data['query'] . '&f=terlama') : base_url('prestasi?f=terlama') ?>">Terlama</a></li>
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
<section id="team" class="team">
	<div class="container">
        <?php if(count($data['results']) != 0 || $data['results'] != null): ?>
            <div class="row">
                <?php forEach($data['results'] as $achievement): ?>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member rounded mw-100">
                            <div class="achievement-details-slider swiper">
                                <div class="swiper-wrapper align-items-center">
                                    <?php $totalImages = count(json_decode($achievement['images'])); ?>
                                    <?php forEach(json_decode($achievement['images']) as $key => $image): ?>
                                        <div class="swiper-slide">
                                            <img src="<?= base_url('uploads/prestasi/' . $image) ?>" alt="<?= $achievement['name'] . ' ' .  $achievement['major'] . ' ' . $achievement['year'] . '-' . $key + 1 ?>" class="w-100 mw-100 rounded m-0" style="aspect-ratio: 4 / 3;object-fit: cover;">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="swiper-pagination d-flex justify-content-center mb-3"></div>
                                <?php if($totalImages > 1): ?>
                                    <div class="swiper-pagination"></div>
                                <?php endif; ?>
                            </div>
                            <h4><?= $achievement['name'] ?></h4>
                            <span><?= $achievement['major'] ?></span>
                            <ul class="list-unstyled mt-3">
                                <li class="fw-bold"><?= $achievement['type'] ?></li>
                                <li class="fw-bold"><?= $achievement['level'] ?></li>
                                <li class="fw-bold"><?= $achievement['year'] ?></li>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center">
                <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                <p>Belum ada prestasi terdata.</p>
            </div>
        <?php endif; ?>
        <?= $this->include('layouts/partials/pagination') ?>
	</div>
</section>
<?= $this->endSection() ?>