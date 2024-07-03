<?= $this->extend('layouts/admin_template'); ?>

<?= $this->section('heading'); ?>
<div class="row">
    <div class="col">
        <div class="d-flex justify-content-between">
            <h2>Kelola Akun</h2>
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end align-self-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('/admin_dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Kelola Akun
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
        Daftar Akun
    </h5>
    <hr class="mt-0">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col d-flex justify-content-start">
                <button class="btn btn-primary modal-btn" data-bs-toggle="modal" data-bs-target="#modalAddUser">Tambah
                    Data</button>
            </div>
        </div>
        <table id="userTable" class="table table-striped text-gray-900" style="width: 100%;">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Role</th>
                    <th>Deskripsi Singkat</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userData as $user) : ?>
                <tr>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['first_name']; ?></td>
                    <td><?= $user['last_name']; ?></td>
                    <td><?= $user['role']; ?></td>
                    <td><?= $user['short_desc']; ?></td>
                    <td>
                        <div class="avatar avatar-xl"><img src="<?= $user['photo']; ?>" alt="Face 1" /></div>
                    </td>
                    <td>
                        <button class="btn btn-warning modal-btn btn-edit-user" id="btnEditUser" data-bs-toggle="modal"
                            data-bs-target="#modalEditUser" data-id="<?= $user['id']; ?>"
                            data-email="<?= $user['email']; ?>" data-first-name="<?= $user['first_name']; ?>"
                            data-last-name="<?= $user['last_name']; ?>"><i class="bi bi-pencil-fill"></i></button>
                        <button class="btn btn-danger modal-btn btn-delete-user" id="btnDeleteUser"
                            data-bs-toggle="modal" data-bs-target="#modalDeleteUser" data-id="<?= $user['id']; ?>"
                            data-email="<?= $user['email']; ?>"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- modals -->
<!-- tambah User -->
<div class="modal text-gray-900" id="modalAddUser" tabindex="-1">
    <form action="<?= base_url('/manage_user/save'); ?>" method="POST" class="modal-form" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah User</h5>
                    <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input autocomplete="off" type="email" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input autocomplete="off" type="password" class="form-control" id="password" name="password"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">Nama Depan</label>
                        <input autocomplete="off" type="text" class="form-control" id="first_name" name="first_name"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Nama Belakang</label>
                        <input autocomplete="off" type="text" class="form-control" id="last_name" name="last_name"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select id="role" class="form-select" aria-label="Default select example" name="role">
                            <option selected disabled>Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="author">Author</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" accept=".jpg, .png, .jpeg" class="form-control" id="photo" name="photo"
                            aria-describedby="fileHelp">
                        <div id="fileHelp" class="form-text">Supports .jpg, .png & .jpeg</div>
                    </div>
                </div>
                <input class="id" type="hidden" name="id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary modal-btn">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- edit User -->
<div class="modal text-gray-900" id="modalEditUser" tabindex="-1">
    <form action="<?= base_url('/manage_user/edit'); ?>" method="POST" class="modal-form" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning mt-3">Kosongkan jika tidak perlu diubah.</div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input autocomplete="off" type="email" class="form-control email" id="email" name="email"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input autocomplete="off" type="password" class="form-control" id="password" name="password"
                            aria-describedby="emailHelp" placeholder="New Password">
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">Nama Depan</label>
                        <input autocomplete="off" type="text" class="form-control first_name" id="first_name"
                            name="first_name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Nama Belakang</label>
                        <input autocomplete="off" type="text" class="form-control last_name" id="last_name"
                            name="last_name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select id="role" class="form-select" aria-label="Default select example" name="role">
                            <option selected disabled>Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="author">Author</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" accept=".jpg, .png, .jpeg" class="form-control" id="photo" name="photo"
                            aria-describedby="fileHelp">
                        <div id="fileHelp" class="form-text">Supports .jpg, .png & .jpeg</div>
                    </div>
                </div>
                <input class="id" type="hidden" name="id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary modal-btn">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- hapus User -->
<div class="modal text-gray-900" id="modalDeleteUser" tabindex="-1">
    <form action="<?= base_url('/manage_user/delete'); ?>" method="POST" class="modal-form"
        enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus User</h5>
                    <button type="button" class="btn-close modal-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus User <b class="email"></b>?</p>

                </div>
                <input class="id" type="hidden" name="id">
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
    let t = $("#userTable").DataTable({
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
    $(".btn-delete-user").click(function() {
        let id = $(this).data("id");
        let email = $(this).attr("data-email");
        $(".id").val(id);
        $(".email").empty();
        $(".email").append(email);
    });

    $(".btn-edit-user").click(function() {
        let id = $(this).data("id");
        let email = $(this).attr("data-email");
        let first_name = $(this).attr("data-first-name");
        let last_name = $(this).attr("data-last-name");
        $(".id").val(id);
        $(".email").attr("placeholder", email);
        $(".first_name").attr("placeholder", first_name);
        $(".last_name").attr("placeholder", last_name);
    });
});
</script>
<?= $this->endSection(); ?>