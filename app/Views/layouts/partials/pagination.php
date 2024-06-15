<?php
$actualUrl  = str_replace('?p=' . $data['page'], '', str_replace('&p=' . $data['page'], '', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"));
$params     = strpos($actualUrl, "f=") || strpos($actualUrl, "q=") ? true : false;
?>
<?php if($data['totalResults'] > 20 && $data['page'] > 1): ?>
    <nav aria-label="..." class="d-flex align-items-center justify-content-center mt-5">
        <ul class="pagination">
            <li class="page-item mx-1 <?= $data['page'] == 1 ? 'disabled' : '' ?>">
                <a class="page-link rounded" href="<?= base_url('#') ?>" tabindex="-1"><i class="bi bi-chevron-double-left"></i></a>
            </li>
            <?php for($i = 1; $i <= ceil($data['totalResults']/20); $i++): ?>
                <li class="page-item mx-1 <?= $data['page'] == $i ? 'active' : '' ?>" <?= $data['page'] == $i ? 'aria-current="page"' : '' ?>>
                    <a class="page-link rounded" href="<?= $params ? $actualUrl . '&p=' . $i : $actualUrl . '?p=' . $i ?>"><?= $i ?></a>
                </li>
            <?php endfor ?>
            <li class="page-item mx-1 <?= $data['page'] == ceil($data['totalResults']/20) ? 'disabled' : '' ?>">
                <a class="page-link rounded" href="<?= base_url('#') ?>"><i class="bi bi-chevron-double-right"></i></a>
            </li>
        </ul>
    </nav>
<?php endif; ?>