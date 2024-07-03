<?= $this->extend('layouts/admin_template'); ?>

<?= $this->section('heading'); ?>
<h2>Dashboard</h2>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="card">
        <div class="card-body py-4 px-4">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-xl">
                    <?php if (session()->get('role') == "author"): ?>
                    <img src="<?= session()->get('photo'); ?>" alt="Face 1" />
                    <?php endif; ?>

                    <?php if (session()->get('role') == "admin"): ?>
                    <img src="<?= session()->get('photo'); ?>" alt="Face 1" />
                    <?php endif; ?>
                </div>
                <div class="ms-3 name">
                    <h5 class="font-bold">Selamat Datang</h5>
                    <?php if (session()->get('role') == "admin"): ?>
                    <h6 class="text-muted mb-0"><?= session()->get('first_name'); ?></h6>
                    <?php endif; ?>
                    <?php if (session()->get('role') == "author"): ?>
                    <h6 class="text-muted mb-0"><?= session()->get('first_name'); ?>
                        <?= session()->get('last_name'); ?></h6>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon purple mb-2">
                            <i class="iconly-boldDocument"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Berita Aktif</h6>
                        <h6 class="font-extrabold mb-0"><?= $newsCount; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon blue mb-2">
                            <i class="iconly-boldFolder"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Kategori</h6>
                        <h6 class="font-extrabold mb-0"><?= $categoryCount; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon green mb-2">
                            <i class="iconly-boldChat"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Komentar</h6>
                        <h6 class="font-extrabold mb-0">80.000</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon red mb-2">
                            <i class="iconly-boldProfile"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Authors</h6>
                        <h6 class="font-extrabold mb-0"><?= $userCount; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>Profile Visit</h4>
        </div>
        <div class="card-body">
            <div class="chart-bar chart">
                <div id="chart-profile-visit"></div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>