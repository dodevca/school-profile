<?= $this->extend('app') ?>

<?= $this->section('main') ?>
<section id="testimonials" class="testimonials">
	<div class="container">
		<div class="row">
            <div class="col-lg-8 mx-auto mb-4">
                <iframe width="100%" height="480" class="rounded shadow"
                src="https://www.youtube.com/embed/tKRMfdKcDMo">
                </iframe>
            </div>
			<div class="col-lg-8 me-lg-auto">
				<div class="testimonial-item rounded">
					<h3 class="mb-4">Visi Sekolah</h3>
					<p>
						<i class="bx bxs-quote-alt-left quote-icon-left"></i>
						Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
						<i class="bx bxs-quote-alt-right quote-icon-right"></i>
					</p>
				</div>
			</div>
			<div class="col-lg-8 ms-lg-auto">
				<div class="testimonial-item rounded mt-5">
					<h3 class="mb-4">Misi Sekolah</h3>
					<ul>
                        <li>Export tempor illum tamen malis malis</li>
                        <li>Eram quae irure esse labore quem cillum quid cillum eram malis</li>
                        <li>Velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</li>
					</ul>
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
            <a href="<?= base_url('sambutan') ?>" class="btn btn-primary rounded-5">
                <i class="bi bi-chevron-compact-left me-2"></i>Sebelumnya
            </a>
            <a href="<?= base_url('tenaga-pendidik') ?>" class="btn btn-primary rounded-5">
                Selanjutnya<i class="bi bi-chevron-compact-right ms-2"></i>
            </a>
        </div>
        <div class="static-pagination d-flex align-items-center justify-content-center gap-3 mt-4">
            <h5 class="text-end">Sambutan Kepala Sekolah</h5>
            <span class="bg-secondary"></span>
            <h5>Tenaga Pendidik</h5>
        </div>
    </div>
</section>
<?= $this->endSection() ?>