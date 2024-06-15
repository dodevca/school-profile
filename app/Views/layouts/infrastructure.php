<?= $this->extend('app') ?>

<?= $this->section('main') ?>
<section id="portfolio" class="portfolio">
	<div class="container">
		<div class="row portfolio-container">
			<div class="col-lg-4 col-md-6 portfolio-item filter-app">
				<div class="portfolio-wrap rounded">
					<img src="<?= base_url('template/img/portfolio/portfolio-1.jpg') ?>" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>App 1</h4>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 portfolio-item filter-web">
				<div class="portfolio-wrap rounded">
					<img src="<?= base_url('template/img/portfolio/portfolio-2.jpg') ?>" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>Web 3</h4>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 portfolio-item filter-app">
				<div class="portfolio-wrap rounded">
					<img src="<?= base_url('template/img/portfolio/portfolio-3.jpg') ?>" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>App 2</h4>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 portfolio-item filter-card">
				<div class="portfolio-wrap rounded">
					<img src="<?= base_url('template/img/portfolio/portfolio-4.jpg') ?>" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>Card 2</h4>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 portfolio-item filter-web">
				<div class="portfolio-wrap rounded">
					<img src="<?= base_url('template/img/portfolio/portfolio-5.jpg') ?>" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>Web 2</h4>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 portfolio-item filter-app">
				<div class="portfolio-wrap rounded">
					<img src="<?= base_url('template/img/portfolio/portfolio-6.jpg') ?>" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>App 3</h4>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 portfolio-item filter-card">
				<div class="portfolio-wrap rounded">
					<img src="<?= base_url('template/img/portfolio/portfolio-7.jpg') ?>" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>Card 1</h4>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 portfolio-item filter-card">
				<div class="portfolio-wrap rounded">
					<img src="<?= base_url('template/img/portfolio/portfolio-8.jpg') ?>" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>Card 3</h4>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 portfolio-item filter-web">
				<div class="portfolio-wrap rounded">
					<img src="<?= base_url('template/img/portfolio/portfolio-9.jpg') ?>" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>Web 3</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection() ?>

<?= $this->section("beforeFooter") ?>
<section>
    <div class="container">
        <div class="d-flex align-items-center justify-content-center gap-3">
            <a href="/tenaga-pendidik" class="btn btn-primary rounded-5">
                <i class="bi bi-chevron-compact-left me-2"></i>Sebelumnya
            </a>
            <a href="/galeri" class="btn btn-primary rounded-5">
                Selanjutnya<i class="bi bi-chevron-compact-right ms-2"></i>
            </a>
        </div>
        <div class="static-pagination d-flex align-items-center justify-content-center gap-3 mt-4">
            <h5 class="text-end">Tenaga Pendidik</h5>
            <span class="bg-secondary"></span>
            <h5>Galeri Sekolah</h5>
        </div>
    </div>
</section>
<?= $this->endSection() ?>