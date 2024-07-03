<?= $this->extend('layouts/admin_template'); ?>

<?= $this->section('heading'); ?>
<div class="row">
    <div class="col">
        <div class="d-flex justify-content-between">
            <h2>Kategori</h2>
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end align-self-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('/admin_dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Kategori
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
    <h5 class="card-header pb-0 mb-3">
        <i class="fas fa-table me-1"></i>
        Daftar Kategori
    </h5>
    <hr class="mt-0">
    <div class="card-body">
        <div class="row mb-3">
            <?php if (session()->get('role') == "author"): ?>
            <div class="col d-flex justify-content-start">
                <button class="btn btn-primary modal-btn" data-bs-toggle="modal"
                    data-bs-target="#modalAddCategory">Tambah
                    Kategori</button>
            </div>
            <?php endif; ?>
        </div>
        <table id="categoryTable" class="table table-striped text-gray-900" style="width: 100%;">
            <thead>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categoryData as $category) : ?>
                <tr>
                    <td><?= $category['name']; ?></td>
                    <td>
                        <?php if (session()->get('role') == "author"): ?>
                        <button class="btn btn-warning modal-btn btn-edit-category" id="btnEditCategory"
                            data-bs-toggle="modal" data-bs-target="#modalEditCategory"
                            data-id="<?= $category['id_category']; ?>" data-nama="<?= $category['name']; ?>"><i
                                class="bi bi-pencil-fill"></i></button>
                        <?php endif; ?>
                        <button class="btn btn-danger modal-btn btn-delete-category" id="btnDeleteCategory"
                            data-bs-toggle="modal" data-bs-target="#modalDeleteCategory"
                            data-id="<?= $category['id_category']; ?>" data-nama="<?= $category['name']; ?>"><i
                                class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- modals -->
<!-- tambah kategori -->
<div class="modal text-gray-900" id="modalAddCategory" tabindex="-1">
    <form action="<?= base_url('/category/save'); ?>" method="POST" class="modal-form">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kategori</label>
                        <input autocomplete="off" type="text" class="form-control" id="name" name="name"
                            aria-describedby="emailHelp">
                    </div>
                </div>
                <input class="id_category" type="hidden" name="id_category">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary modal-btn">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- edit kategori -->
<div class="modal text-gray-900" id="modalEditCategory" tabindex="-1">
    <form action="<?= base_url('/category/edit'); ?>" method="POST" class="modal-form">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kategori</h5>
                    <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning mt-3">Kosongkan jika tidak perlu diubah.</div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input autocomplete="off" type="text" class="form-control name" id="name" name="name"
                            aria-describedby="emailHelp">
                    </div>
                </div>
                <input class="id_category" type="hidden" name="id_category">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary modal-btn">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- hapus kategori -->
<div class="modal text-gray-900" id="modalDeleteCategory" tabindex="-1">
    <form action="<?= base_url('/category/delete'); ?>" method="POST" class="modal-form">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Kategori</h5>
                    <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus kategori <b class="name"></b>?</p>

                </div>
                <input class="id_category" type="hidden" name="id_category">
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
    let t = $("#categoryTable").DataTable({
        stateSave: true,
        dom: 'Bfrtip',
        lengthMenu: [
            [5, 10, 15, -1],
            ["5", "10", "15", "All"],
        ],
        buttons: [
            'pageLength', 'excel', 'pdf', 'colvis'
        ],
    });

    //modal
    $(".btn-delete-category").click(function() {
        let id = $(this).data("id");
        let name = $(this).attr("data-nama");
        $(".id_category").val(id);
        $(".name").empty();
        $(".name").append(name);
    });

    $(".btn-edit-category").click(function() {
        let id = $(this).data("id");
        let name = $(this).attr("data-nama");
        $(".id_category").val(id);
        $(".name").attr("placeholder", name);
    });
});
</script>
<?= $this->endSection(); ?>