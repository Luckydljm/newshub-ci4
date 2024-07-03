<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <figure class="text-center mt-3">
            <blockquote class="blockquote">
                <p class="display-1 text-primary-emphasis fw-bold">NEWSHub.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                <cite title="Source Title">News & Opinion Blog</cite>
            </figcaption>
        </figure>
    </div>

    <div class="row">
        <div style="padding-top:30%;position:relative;"><iframe src="https://gifer.com/embed/14uC" width="100%"
                height="70%" style='position:absolute;top:0;left:0;' frameBorder="0" allowFullScreen></iframe></div>
    </div>

    <div class="row">
        <h1 class="text-center mt-5 text-primary-emphasis fw-bold">About Us</h1>
        <dl class="row mt-2">
            <dt class="col-sm-4 text-primary-emphasis fw-bold fs-3">Quality news, where you want it, when you want it.
            </dt>
            <dd class="col-sm-8">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste quia, est, veniam
                quisquam voluptas perferendis soluta, nihil non maiores earum ex ad modi ducimus voluptatibus at nobis
                molestias nemo ipsam. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium modi quo
                natus ipsa, asperiores numquam ut voluptates. Sequi deserunt facere eaque quo minus! Dolorem
                reprehenderit incidunt error nemo a enim!
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Istequia, est, veniam quisquam voluptas
                perferendis soluta, nihil non maiores earum ex ad modi ducimus voluptatibus at nobis
                molestias nemo ipsam. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium modi quo
                natus ipsa, asperiores numquam ut voluptates. Sequi deserunt facere eaque quo minus! Dolorem
                reprehenderit incidunt error nemo a enim!/dd>
        </dl>
    </div>

    <div class="row">
        <p class="col-sm-4 text-primary-emphasis fw-bold fs-3">Staff</p>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($userData as $user) : ?>
            <div class="col">
                <div class="card">
                    <img src="<?= $user['photo']; ?>" class="card-img-top" alt="..." height="450">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['role']; ?></h5>
                        <p class="card-text"><?= $user['first_name']; ?> <?= $user['last_name']; ?></p>
                        <p class="card-text"><?= $user['email']; ?></p>
                        <p class="card-text"><?= $user['short_desc']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>