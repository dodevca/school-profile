<?= $this->extend('app') ?>

<?= $this->section('main') ?>
<section id="" class="navigation pb-0">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
            <h2 class="h4 mb-0"><?= !empty($data['query']) ?  "Hasil dari : " . ucwords($data['query']) : "Agenda SMK N 2 Kupang" ?></h2>
            <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3">
                <div class="dropdown w-100 order-2 order-lg-1">
                    <button class="btn btn-outline-secondary dropdown-toggle rounded w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-funnel me-2"></i><?= ucwords(str_replace('-', ' ', $data['filter'])) ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= !empty($data['query']) ? base_url('agenda?q=' . $data['query'] . '&f=mendatang') : base_url('agenda?f=sedang-berlangsung') ?>">Mendatang</a></li>
                        <li><a class="dropdown-item" href="<?= !empty($data['query']) ? base_url('agenda?q=' . $data['query'] . '&f=terbaru') : base_url('agenda?f=terbaru') ?>">Terbaru</a></li>
                        <li><a class="dropdown-item" href="<?= !empty($data['query']) ? base_url('agenda?q=' . $data['query'] . '&f=terlama') : base_url('agenda?f=terlama') ?>">Terlama</a></li>
                    </ul>
                </div>
                <div class="search-form w-100 order-1 order-lg-2">
                    <?= form_open('', ['class' => 'border-secondary rounded', 'method' => 'get']) ?>
                        <input type="text" id="search" name="q" <?= !empty($data['query']) ? 'value="' . $data['query'] . '&filter=' . $data['filter'] . '"' :  '' ?> placeholder="Cari disini ...">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="counts" class="counts">
	<div class="container">
        <?php if(count($data['results']) != 0 || $data['results'] != null): ?>
            <div class="row no-gutters">
                <?php
                $fmt = new IntlDateFormatter(
                    'id_ID',
                    IntlDateFormatter::FULL, 
                    IntlDateFormatter::FULL
                );
                $fmt->setPattern('MMMM');
                ?>
                <?php forEach($data['results'] as $event): ?>
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
            </div>
        <?php else: ?>
            <div class="text-center">
                <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                <p>Tidak ada agenda.</p>
            </div>
        <?php endif; ?>
        <?= $this->include('layouts/partials/pagination') ?>
    </div>
</section>
<?= $this->endSection() ?>