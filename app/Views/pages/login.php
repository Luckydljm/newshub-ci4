<?= $this->extend('layouts/login_template'); ?>

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
        <div class="d-flex justify-content-center">
            <div class="card p-5 w-50">
                <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif; ?>
                <form action="<?= base_url('/auth'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>