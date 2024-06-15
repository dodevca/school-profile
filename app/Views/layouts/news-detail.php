<?= $this->extend('app') ?>

<?= $this->section('main') ?>
<?php
$recents    = $data['recents'];
$result     = $data['result'];

$fmt    = new IntlDateFormatter(
    'id_ID',
    IntlDateFormatter::FULL, 
    IntlDateFormatter::FULL
);
$fmt->setPattern('dd MMMM YYYY');
?>
<section id="blog" class="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 entries">
                <article class="entry entry-single">
                    <div class="entry-img">
                        <img src="<?= base_url('uploads/berita/' . $result->image) ?>" alt="" class="img-fluid">
                    </div>
                    <h2 class="entry-title">
                        <?= $result->title ?>
                    </h2>
                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-clock"></i>
                                <time datetime="2020-01-01"><?= $fmt->format(strtotime($result->date)) ?></time>
                            </li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        <?= $result->content ?>
                    </div>
                </article>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <h3 class="sidebar-title">Search</h3>
                    <div class="sidebar-item search-form">
                        <?= form_open(base_url('berita'), ['class' => 'border-secondary rounded', 'method' => 'get']) ?>
                            <input type="text" id="search" name="q" <?= !empty($data['query']) ? 'value="' . $data['query'] . '"' :  '' ?> placeholder="Cari disini ...">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                        <?= form_close() ?>
                    </div>
                    <?php if(!empty($recents) || $recents != null): ?>
                        <h3 class="sidebar-title">Berita Terbaru</h3>
                        <div class="sidebar-item recent-posts">
                            <?php forEach($recents as $news): ?>
                                <div class="post-item clearfix">
                                    <img src="<?= base_url('uploads/berita/' . $news['image']) ?>" alt="">
                                    <h4>
                                        <a href="blog-single.html"><?= $news['title'] ?></a>
                                    </h4>
                                    <time datetime="2020-01-01"><?= $news['date'] ?></time>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>