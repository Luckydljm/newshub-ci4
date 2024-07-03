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

    <section id="detail">
        <div class="row justify-content-center mb-3">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h2><?= $newsData['title']; ?></h2>
                </div>
                <div class="card-body">
                    <div class="identity text-center mb-3">
                        <div class="row">
                            <small class="text-body-secondary"><?= $newsData['id']; ?> - <span
                                    class="text-primary-emphasis">NEWSHub.</span>
                            </small>
                        </div>
                        <div class="row">
                            <small class="text-body-secondary"><?= $newsData['created_at']; ?>
                            </small>
                        </div>
                    </div>
                    <img src="../<?= $newsData['thumb']; ?>" alt="thumbnail" class="card-img">
                    <div class="row mt-3">
                        <p><?= $newsData['sub_title']; ?></p>
                    </div>
                    <div class="row">
                        <p><?= $newsData['content']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?= $this->endSection(); ?>