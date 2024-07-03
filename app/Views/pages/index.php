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

    <div class="row mt-3">
        <div style="padding-top:30%;position:relative;"><iframe src="https://gifer.com/embed/14uC" width="100%"
                height="70%" style='position:absolute;top:0;left:0;' frameBorder="0" allowFullScreen></iframe></div>
        <!-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1546422904-90eab23c3d7e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1172&q=80"
                        class="d-block w-100" alt="..." height="600">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1503694978374-8a2fa686963a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8bmV3c3xlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60"
                        class="d-block w-100" alt="..." height="600">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1586339949916-3e9457bef6d3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fG5ld3N8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60"
                        class="d-block w-100" alt="..." height="600">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
            </div>
        </div> -->
    </div>


    <div class="row">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link text-primary-emphasis fw-bold" aria-current="page" href="<?= base_url('/'); ?>">All
                    Posts</a>
            </li>
            <?php foreach ($categoryData as $category) : ?>
            <li class="nav-item">
                <a class="nav-link text-primary-emphasis fw-bold" href="#"><?= $category['name']; ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php foreach ($newsData as $news) : ?>
            <div class="col">
                <div class="card h-100 position-relative">
                    <img src="<?= $news['thumb']; ?>" class="card-img-top" alt="Thumbnail" height="300">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-1">
                                <img src=" <?= $news['profile']; ?>" alt="Profile" width="40">
                            </div>
                            <div class="col-11">
                                <div class="row">
                                    <small class="text-body-secondary"><?= $news['nama_depan']; ?>
                                        <?= $news['nama_belakang']; ?></small>
                                </div>
                                <div class="row">
                                    <small class="text-body-secondary"><?= $news['created_at']; ?></small>
                                </div>
                            </div>
                        </div>
                        <small class="text-primary"><?= $news['kategori']; ?></small>
                        <h5 class="card-title"><a href="<?= base_url("detail/".$news['id_news']) ?>"
                                class="text-decoration-none text-dark"><?= $news['title']; ?></a>
                        </h5>
                        <p class="card-text"><?= $news['sub_title']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>