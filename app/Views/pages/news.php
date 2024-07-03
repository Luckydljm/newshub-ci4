<?= $this->extend('layouts/admin_template'); ?>

<?= $this->section('heading'); ?>
<div class="row">
    <div class="col">
        <div class="d-flex justify-content-between">
            <h2>Berita</h2>
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end align-self-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('/admin_dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Berita
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
            <div class="fs-5">Daftar Berita</div>
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

<?php if (session()->get('role') == "author"): ?>
<div class="row justify-content-center mb-3">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($authorsData as $news) : ?>
        <div class="col">
            <div class="card h-100 position-relative">
                <div class="dropdown position-absolute top-0 end-0">
                    <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-end">
                        <li><a class="dropdown-item modal-btn btn-delete-news" id="btnDeleteNews" data-bs-toggle="modal"
                                data-bs-target="#modalDeleteNews" data-id="<?= $news['id_news']; ?>"
                                data-title="<?= $news['title']; ?>" href="#">Hapus</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item modal-btn btn-edit-news" id="btnEditNews" data-bs-toggle="modal"
                                data-bs-target="#modalEditNews" data-id="<?= $news['id_news']; ?>"
                                data-title="<?= $news['title']; ?>" data-sub_title="<?= $news['sub_title']; ?>"
                                href="#">Update</a></li>
                    </ul>
                </div>
                <img src="<?= $news['thumb']; ?>" class="card-img-top" alt="Thumbnail" height="300">
                <div class="card-body">
                    <div class="row mb-3">
                        <span class="mx-2 badge rounded-pill <?php if ($news['status'] == "deactive") {
                                                                            echo "text-bg-danger";
                                                                        } elseif ($news['status'] == "active") {
                                                                            echo "text-bg-success";
                                                                        }?>"
                            style=" width: 5rem;"><?= $news['status']; ?></span>
                    </div>
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
                    <h5 class="card-title"><a href=""><?= $news['title']; ?></a></h5>
                    <p class="card-text"><?= $news['sub_title']; ?></p>
                </div>
                <div class="card-footer">
                    <div class="row p-2">
                        <div class="col-10">
                            <small class="text-body-secondary">Comment</small>
                        </div>
                        <div class="col-2">
                            <a href="" class="btn position-relative">
                                <img src="../../../img/comment.png" alt="" width="25">
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    99+
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<?php if (session()->get('role') == "admin"): ?>
<div class="row justify-content-center mb-3">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($newsData as $news) : ?>
        <div class="col">
            <div class="card h-100 position-relative">
                <div class="dropdown position-absolute top-0 end-0">
                    <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-end">
                        <li><a class="dropdown-item modal-btn btn-edit-news" id="btnEditNews" data-bs-toggle="modal"
                                data-bs-target="#modalEditNews" data-id="<?= $news['id_news']; ?>"
                                data-title="<?= $news['title']; ?>" data-sub_title="<?= $news['sub_title']; ?>" href="
                                #">Update</a></li>
                    </ul>
                </div>
                <img src="<?= $news['thumb']; ?>" class="card-img-top" alt="Thumbnail" height="300">
                <div class="card-body">
                    <div class="row mb-3">
                        <span class="mx-2 badge rounded-pill <?php if ($news['status'] == "deactive") {
                                                                            echo "text-bg-danger";
                                                                        } elseif ($news['status'] == "active") {
                                                                            echo "text-bg-success";
                                                                        }?>"
                            style=" width: 5rem;"><?= $news['status']; ?></span>
                    </div>
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
                    <h5 class="card-title"><a href=""><?= $news['title']; ?></a></h5>
                    <p class="card-text"><?= $news['sub_title']; ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<!-- modals -->
<!-- edit Berita (ADMIN)-->
<?php if (session()->get('role') == "admin"): ?>
<div class="modal text-gray-900" id="modalEditNews" tabindex="-1">
    <form action="<?= base_url('/news/edit'); ?>" method="POST" class="modal-form" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Berita</h5>
                    <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status" class="form-text">Status</label>
                        <select id="status" class="form-select" aria-label="Default select example" name="status">
                            <option selected disabled>Pilih Status</option>
                            <option value="deactive">Deactive</option>
                            <option value="active">Active</option>
                        </select>
                    </div>
                    <div class=" form-group">
                        <label for="thumb" class="form-text">Headline
                            Thumbnail <small>(The image size
                                should be: 1920 X 1080)</small>
                        </label>
                        <div class="input-group mb-3">
                            <input type="file" name="thumb" class="form-control" id="thumb" accept="image/*" readonly>
                        </div>
                    </div>
                    <input type="hidden" class="id" name="id" value="<?= session()->get('id'); ?>">
                    <input type="hidden" class="id_news" name="id_news">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary modal-btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary modal-btn">Save</button>
                    </div>
                </div>
            </div>
    </form>
</div>
<?php endif; ?>

<!-- edit Berita (AUTHORS)-->
<?php if (session()->get('role') == "author"): ?>
<div class="modal text-gray-900" id="modalEditNews" tabindex="-1">
    <form action="<?= base_url('/news/edit'); ?>" method="POST" class="modal-form" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Berita</h5>
                    <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning mt-3">Kosongkan jika tidak perlu diubah.</div>
                    <div class="form-group">
                        <label for="title" class="form-text">Headline<span class="text-danger">*)</span></label>
                        <input type="text" id="title" class="form-control title" name="title" />
                    </div>
                    <div class="form-group">
                        <label for="sub_title" class="form-text">Deskripsi Singkat</label>
                        <textarea name="sub_title" id="sub_title" class="form-control sub_title" cols="30"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content" class="form-text">Isi Berita</label>
                        <textarea name="content" id="summernote" class="form-control content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="id_category" class="form-text">Kategori</label>
                        <select id="id_category" class="form-select" aria-label="Default select example"
                            name="id_category">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary modal-btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary modal-btn">Save</button>
                    </div>
                </div>
            </div>
    </form>
</div>
<?php endif; ?>

<!-- hapus Berita -->
<div class="modal text-gray-900" id="modalDeleteNews" tabindex="-1">
    <form action="<?= base_url('/news/delete'); ?>" method="POST" class="modal-form">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Berita</h5>
                    <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus Berita <b class="title"></b>?</p>

                </div>
                <input class="id_news" type="hidden" name="id_news">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger modal-btn">Delete</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
$(document).ready(function() {
    //modal
    $(".btn-delete-news").click(function() {
        let id = $(this).data("id");
        let title = $(this).attr("data-title");
        $(".id_news").val(id);
        $(".title").empty();
        $(".title").append(title);
    });

    $(".btn-edit-news").click(function() {
        let id = $(this).data("id");
        let title = $(this).attr("data-title");
        let sub_title = $(this).attr("data-sub_title");
        $(".id_news").val(id);
        $(".title").attr("placeholder", title);
        $(".sub_title").attr("value", sub_title);
    });
});
</script>
<?= $this->endSection(); ?>