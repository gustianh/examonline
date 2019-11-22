<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Paket</h1>
    <p class="mb-4">Tambah/Edit Paket</p>

    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Paket</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('paket_soal/simpan'); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $data->id_paket ?? ""; ?>">

                <h4>Informasi Paket</h4>
                <div class="form-group row">
                    <label for="paket" class="col-sm-2 col-form-label">Paket</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="paket" name="paket"
                            value="<?php echo $data->paket ?? ""; ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- End Page Content -->
