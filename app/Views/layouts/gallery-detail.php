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
		<div class="row">
			<div class="col-md-6">
				<img src="<?= base_url('uploads/album/' . $result->headline) ?>" class="rounded w-100 mb-4 mb-md-0">
			</div>
			<div class="col-md-6">
				<div class="rounded shadow p-4">
					<div class="border-bottom pb-3">
						<h3><?= $result->title ?></h3>
						<p class="mb-0">Diunggah pada <?= $fmt->format(strtotime($result->date)) ?></p>
					</div>
					<div class="pt-3">
						<p><?= $result->description ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row py-3">
			<?php forEach(json_decode($result->images) as $image): ?>
				<div class="col-md-6 col-lg-4 py-3">
				<img src="<?= base_url('uploads/album/' . $image) ?>" class="rounded w-100">
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?= $this->endSection() ?>