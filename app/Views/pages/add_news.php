<?= $this->extend('layouts/admin_template'); ?>

<?= $this->section('heading'); ?>
<div class="row">
    <div class="col">
        <div class="d-flex justify-content-between">
            <h2>Tambah Berita</h2>
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end align-self-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('/news'); ?>">Berita</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Tambah Berita
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('validation')) : ?>
<?= session()->getFlashdata('validation'); ?>
<?php endif; ?>

<?php if (session()->get('success')) : ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> <?php $success = session()->getFlashdata('success');
        if (is_array($success)) {
            foreach ($success as $s) {
                echo $s;
                if (count($success) > 1) { ?>
    </br>
    <?php }
            }
        } else {
            echo $success;
        } ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<div class="card shadow mb-4">
    <div class="d-flex justify-content-between">
        <div class="card-header d-flex justify-content-start">
            <div class="mx-3 fs-5"><i class="bi bi-stack"></i></div>
            <div class="fs-5">Tambah Berita</div>
        </div>
        <div class="card-header">
            <?php if (session()->get('role') == "author"): ?>
            <a href="<?= base_url('add_news'); ?>" class="btn btn-outline-primary rounded-5"><i
                    class="bi bi-plus-lg"></i>
                Tambah Berita Baru</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="card shadow w-75">
        <div class="card-header">Form Tambah Berita</div>
        <div class="card-body">
            <form action="<?= base_url('/add_news/save'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title" class="form-text">Headline<span class="text-danger">*)</span></label>
                    <input type="text" id="title" class="form-control" name="title" />
                </div>
                <div class="form-group">
                    <label for="sub_title" class="form-text">Deskripsi Singkat</label>
                    <textarea name="sub_title" id="sub_title" class="form-control" cols="30"></textarea>
                </div>
                <div class="form-group">
                    <label for="content" class="form-text">Isi Berita</label>
                    <textarea name="content" id="summernote"></textarea>
                </div>
                <div class="form-group">
                    <label for="id_category" class="form-text">Kategori</label>
                    <select id="id_category" class="form-select" aria-label="Default select example" name="id_category">
                        <option selected disabled>Pilih Kategori</option>
                        <?php foreach ($categoryData as $category) : ?>
                        <option value="<?= $category['id_category']; ?>"><?= $category['name']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class=" form-group">
                    <label for="thumb" class="form-text">Headline
                        Thumbnail <small>(The image size
                            should be: 1920 X 1080)</small>
                    </label>
                    <div class="input-group mb-3">
                        <input type="file" name="thumb" class="form-control" id="thumb" accept="image/*">
                    </div>
                </div>
                <input type="hidden" class="id" name="id" value="<?= session()->get('id'); ?>">
                <input type="hidden" class="id_news" name="id_news">
                <button type="submit" class="btn btn-primary">Publish</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>