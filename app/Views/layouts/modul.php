<?= $this->extend('app') ?>

<?= $this->section('main') ?>
<section id="" class="navigation pb-0">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
            <h2 class="h4 mb-0"><?= !empty($data['query']) ?  "Hasil dari : " . ucwords($data['query']) : "Daftar Modul Jurusan " . ucwords($data['major']) ?></h2>
            <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3">
                <div class="dropdown w-100 order-2 order-lg-1">
                    <button class="btn btn-outline-secondary dropdown-toggle rounded w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-mortarboard-fill me-2"></i></i><?= ucwords($data['major']) ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('modul') ?>">Semua</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('modul/permesinan') ?>">Permesinan</a></li>
                    </ul>
                </div>
                <div class="dropdown w-100 order-2 order-lg-1">
                    <button class="btn btn-outline-secondary dropdown-toggle rounded w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-funnel-fill me-2"></i><?= ucwords($data['filter']) ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= !empty($data['query']) ? base_url('modul/' . $data['major'] . '?q=' . $data['query'] . '&f=terbaru') : base_url('modul/' . $data['major'] . '?f=terbaru') ?>">Terbaru</a></li>
                        <li><a class="dropdown-item" href="<?= !empty($data['query']) ? base_url('modul/' . $data['major'] . '?q=' . $data['query'] . '&f=terlama') : base_url('modul/' . $data['major'] . '?f=terlama') ?>">Terlama</a></li>
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
	<div class="container overflow-hidden">
        <?php if(count($data['results']) != 0 || $data['results'] != null): ?>
            <div class="modul-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="width:40%">Judul</th>
                            <th scope="col" style="width:25%">Guru</th>
                            <th scope="col" style="width:25%">Penulis</th>
                            <th scope="col" style="width:10%">Unduh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php forEach($data['results'] as $modul): ?>
                            <tr>
                                <td class="align-middle" style="width:40%"><strong><?= $modul['title'] ?></strong></td>
                                <td class="align-middle" style="width:25%"><a href="<?= base_url('modul?q=' . $modul['teacher']) ?>"><?= $modul['teacher'] ?></a></td>
                                <td class="align-middle" style="width:25%"><a href="<?= base_url('modul?q=' . $modul['writer']) ?>"><?= $modul['writer'] ?></a></td>
                                <td class="align-middle" style="width:10%">
                                    <a href="<?= base_url('uploads/modul/' . $modul['modul']) ?>" class="btn btn-primary rounded-5" download><i class="bi bi-cloud-download"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center">
                <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                <p>Belum ada modul diunggah.</p>
            </div>
        <?php endif; ?>
        <?= $this->include('layouts/partials/pagination') ?>
    </div>
</section>
<?= $this->endSection() ?>