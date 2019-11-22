<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Admin</h1>
    <p class="mb-4">Tambah/Edit Admin</p>

    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('operator/simpan'); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $id ?? ""; ?>">

                <h4>Informasi Diri</h4>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username"
                            value="<?php echo $data->username ?? ""; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password"
                            value="<?php echo $data->password ?? ""; ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- End Page Content -->
