<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Ujian</h1>
    <p class="mb-4">Tambah/Edit Ujian</p>

    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Ujian</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('kelas/simpan'); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $data->id_ujian ?? ""; ?>">

                <h4>Ujian</h4>
                <div class="form-group row">
                    <label for="id_paket" class="col-sm-2 col-form-label">ID Paket</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="id_paket" name="id_paket">
                            <?php foreach ($rows as $row) { ?>
                            <option value="<?php echo $row->id_paket; ?>"><?php echo $row->paket; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_guru" class="col-sm-2 col-form-label">ID Guru</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="id_guru" name="id_guru">
                            <?php foreach ($rows as $row) { ?>
                            <option value="<?php echo $row->id_guru; ?>"><?php echo $row->guru; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $data->deskripsi ?? ""; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Batas Waktu</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="batas_waktu" name="batas_waktu" value="<?php echo $data->batas_waktu ?? ""; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- End Page Content -->
