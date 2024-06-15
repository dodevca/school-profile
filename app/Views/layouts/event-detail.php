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

$fmt2   = new IntlDateFormatter(
    'id_ID',
    IntlDateFormatter::FULL, 
    IntlDateFormatter::FULL
);
$fmt2->setPattern('cccc, dd MMMM YYYY');
?>
<section>
    <div class="container">
        <div class="rounded shadow p-4">
            <div class="d-flex align-items-center gap-3 mb-3">
                <span class="bg-primary text-white rounded-5 px-3 py-2" style="font-size: 13px">
                    Agenda
                </span>
            </div>
            <h2><?= $result->name ?></h2>
            <p class="mb-0">Dipublikasikan pada <?= $fmt->format(strtotime($result->date)) ?></p>
        </div>
        <div class="card border-0 mt-5">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-center mb-3 py-3 gap-3">
                    <div class="rounded shadow p-3">
                        <h4 class="fw-bold"><?= $fmt2->format(strtotime($result->date_start)) ?></h4>
                        <h5 class="mb-0"><i class="bi bi-clock-fill text-muted me-2"></i><?= date("H:m", strtotime($result->date_start)) ?></h5>
                    </div>
                    <div class="d-flex aling-items-center">
                        <i class="bi bi-dash-lg"></i>
                        <p class="mb-0 d-md-none mx-3">sampai</p>
                        <i class="bi bi-dash-lg d-md-none"></i>
                    </div>
                    <div class="rounded shadow p-3">
                        <h4 class="fw-bold"><?= $fmt2->format(strtotime($result->date_end)) ?></h4>
                        <h5 class="mb-0"><i class="bi bi-clock-fill text-muted me-2"></i><?= date("H:m", strtotime($result->date_end)) ?></h5>
                    </div>
                </div>
                <p class="pt-3 border-top"><?= $result->description ?></p>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>