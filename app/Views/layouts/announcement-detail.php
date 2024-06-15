<?= $this->extend('app') ?>

<?= $this->section('main') ?>
<?php
$result = $data['result'];

$fmt    = new IntlDateFormatter(
    'id_ID',
    IntlDateFormatter::FULL, 
    IntlDateFormatter::FULL
);
$fmt->setPattern('dd MMMM YYYY');
?>
<section>
    <div class="container">
        <div class="rounded shadow p-4">
            <div class="d-flex align-items-center gap-3 mb-3">
                <span class="bg-primary text-white rounded-5 px-3 py-2" style="font-size: 13px">
                    Pengumuman
                </span>
                <?php if($result->important == 1): ?>
                    <span class="border border-warning rounded-5 px-3 py-2" style="font-size: 13px">
                        <i class="bi bi-exclamation-circle-fill text-warning me-2"></i>Penting
                    </span>
                <?php endif ?>
            </div>
            <h2><?= $result->title ?></h2>
            <div class="d-flex align-items-center gap-3">
                <p class="mb-0"><?= $result->timeElapsed ?></p>
                <div class="bg-dark" style="width: 1px; height: 1rem;"></div>
                <p class="mb-0"><?= $fmt->format(strtotime($result->date)) ?></p>
            </div> 
        </div>
        <div class="row mt-5">
            <div class="col-md-8">
                <?= $result->content ?>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="h5 text-left mb-3">Lampiran Pengumuman</h3>
                        <a href="<?= base_url('uploads/pengumuman/' . $result->attachment) ?>" class="btn btn-primary mb-3"><i class="bi bi-eye me-2"></i>Lihat Lampiran</a>
                        <a href="<?= base_url('uploads/pengumuman/' . $result->attachment) ?>" class="btn btn-outline-primary"><i class="bi bi-cloud-download me-2" download></i>Unduh Lampiran</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>