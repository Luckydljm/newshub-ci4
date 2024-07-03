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

    <div class="row mt-5">
        <div class="col-sm-5 text-primary-emphasis fw-bold fs-1">Looking for more information? Get in touch with us
            today.
        </div>
        <div class="col-sm-7">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <h5>Email:</h5>
                    </div>
                    <div class="row"><small class="text-body-secondary">newhub@example.com</small></div>
                </div>
                <div class="col">
                    <div class="row">
                        <h5>Phone:</h5>
                    </div>
                    <div class="row"><small class="text-body-secondary">+62 711 365473</small></div>
                </div>
                <div class="col">
                    <div class="row">
                        <h5>Follow:</h5>
                    </div>
                    <div class="row">
                        <div class="col-2"><img src="../../../img/twitter.png" alt="" width="25"></div>
                        <div class="col-2"><img src="../../../img/instagram.png" alt="" width="22"></div>
                        <div class="col-2"><img src="../../../img/youtube.png" alt="" width="30"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Phone</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 150px"></textarea>
                        <label for="floatingTextarea2">Comments</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>

<?= $this->endSection(); ?>