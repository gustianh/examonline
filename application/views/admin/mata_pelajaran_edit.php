<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Mata Pelajaran</h1>
    <p class="mb-4">Tambah/Edit Mata Pelajaran</p>

    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Mata Pelajaran</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('mapel/simpan'); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $data->id_mata_pelajaran ?? ""; ?>">

                <h4>Mata Pelajaran</h4>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $data->kode ?? ""; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data->nama ?? ""; ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- End Page Content -->
