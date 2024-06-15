<?= $this->extend('app') ?>

<?= $this->section('main') ?>
<section id="about" class="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 text-center">
				<img src="<?= base_url('images/Willem A. Kana.png') ?>" class="img-fluid rounded mb-3" alt="">
				<h2 class="h6 fw-bold text-center">Willem A. Kana, S.Pd.,M.T.</h2>
				<h6 class="fw-bold text-muted">Kepala Sekolah SMK N 2 Kupang</h6>
			</div>
			<div class="col-lg-8 pt-4 pt-lg-0 content">
				<h3>Dua Sisi Mata Pisau</h3>
				<p>Jika Pisau berada di tangan orang yang baik, maka pisau menjadi baik. Ketika pisau berada ditangan orang yang jahat, maka pisau menjadi jahat. pisau berada di tangan penodong, maka pisau dipakai untuk menyakiti, menodong dan tindakan berbahaya lainnya. Tapi pisau di tangan dokter bedah, maka pisau digunakan untuk menolong dan menyembuhkan. Demikian juga internet ibarat Dua Sisi Mata Pisau, Ada yang Baik dan Juga Buruk. Internet bersifat netral, tergantung cara kita memanfaatkannya.</p>
				<p>SMK Negeri 2 Kupang-NTT memanfaatkannya sebagai sarana pelayanan di bidang informasi dan komunikasi pendidikan, dengan alamat: <a href="<?= base_url() ?>">http://www.smkn2kupang.sch.id</a>. Website ini didesain dan dikembangkan oleh Unit Pembantu ICT Center (Pusat Sumber Belajar Berbasis IT) SMK Negeri 2 Kupang <i>“Dokter Bedah”</i>, yang telah memberikan apa yang terbaik yang mereka miliki dari pengetahuan dan kemampuan mereka.</p>
				<p>Seperti halnya sebuah buku Majalah yang adalah Sarana informasi dan komunikasi, demikian pula halnya dengan website ini. Yang membedakannya adalah media dari Majalah adalah kertas, sedangkan media Website ini adalah alat elektronik.</p>
				<p>Komunikasi memiliki peranan penting dalam interakasi manusia. Komunikasi tidak hanya menolong manusia dalam memenuhi kebutuhan hidupnya tetapi juga berpengaruh dalam pembentukan budaya manusia.</p>
				<p>Dalam perkembangannya, manusia kemudian menciptakan berbagai media komunikasi yang semakin mempermudah proses komunikasi tersebut. Dalam perkembangan media komunikasi ini, ICT Center SMK Negeri 2 Kupang ikut serta membudidayakan media tersebut dalam praktek pelayanannya. Secara khusus media elektronik yang sangat berkembang saat ini, sekolah membudidayakannya untuk memfasilitasi pertumbuhan komunitas pembelajar.</p>
				<p>Namun, tidak dapat dipungkiri bahwa setiap bentuk media komunikasi khususnya elektronik, memiliki dampak positif dan negatif. sekolah sebagai pengelola komunitas pembelajar perlu mengantisipasi pengaruh perkembangan media ini agar tidak menjadi batu sandungan bagi pertumbuhan pendidikan anak bangsa. Karena sangat disayangkan dengan tujuan yang baik tetapi justru dapat menghancurkan esensi perkembangan pendidikan itu sendiri.</p>
				<p>Peradaban manusia sangat tergantung dengan perkembangan media komunikasi yang dipakai. Manusia berusaha menemukan media komunikasi yang bertujuan untuk mengatasi banyak permasalahan dalam hidupnya. Bersamaan dengan kapitalisasi dan modernisasi yang berkembang, peran media semakin kompleks dan vulgar. Media tidak lagi 'hanya" wadah penyampaian informasi untuk berbagai kebiasaan . Kekuatan media ini terbukti mengambil bagian yang strategis dalam Perkembangan Komunitas Pembelajar.</p>
				<p>Media massa sebagai sarana untuk melakukan sharing, diskusi maupun dialog secara personal. Membuat program-program siaran pendidikan, kebudayaan dan penghiburan yang berlandaskan pada pembinaan karakter. Sebagai sarana informasi cepat dan praktis sehingga dengan mudah sekolah mengetahui dan terpanggil untuk menjadi bagian dari solusi pendidikan. Sebagai sarana untuk memberikan pendidikan sosial politik, sosial ekonomi, sosial budaya, IPTEK. Memberikan pemahaman dalam konteks masyarakat majemuk. Media massa sebagai sarana memberikan pengajaran moral, spiritual, melalui TV, Radio, HP, Internet, media cetak, majalah sekolah, dll.</p>
				<p>Media massa sebagai sarana untuk sosialiasi progam pendidikan dalam bidang Teknologi. Membuka peluang-peluang bagi peserta didik untuk mengekspresikan kemampuannya dengan berkompetisi.</p>
				<p>Semoga website SMK Negeri 2 Kota Kupang ini bermanfaat untuk membangun dan menunjang Perkembangan Pendidikan serta pertumbuhan IPTEK SMK Negeri 2 Kupang NTT. Kiranya Tuhan Yang Maha Kuasa, memberkati pelayanan kita untuk anak bangsa khususnya di Provinsi NTT tercinta.</p>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection() ?>

<?= $this->section("beforeFooter") ?>
<section>
    <div class="container">
        <div class="d-flex align-items-center justify-content-center gap-3">
            <a href="#" class="btn btn-primary rounded-5 disabled" tabindex="-1" role="button" aria-disabled="true">
                <i class="bi bi-chevron-compact-left me-2"></i>Sebelumnya
            </a>
            <a href="<?= base_url('visi-misi') ?>" class="btn btn-primary rounded-5">
                Selanjutnya<i class="bi bi-chevron-compact-right ms-2"></i>
            </a>
        </div>
        <div class="static-pagination d-flex align-items-center justify-content-center gap-3 mt-4">
            <h5 class="text-end"></h5>
            <span class="bg-secondary"></span>
            <h5>Visi dan Misi</h5>
        </div>
    </div>
</section>
<?= $this->endSection() ?>