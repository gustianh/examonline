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
            <form action="<?php echo site_url('ujian/simpan'); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $data->id_ujian ?? ""; ?>">

                <h4>Ujian</h4>
                <div class="form-group row">
                    <label for="id_paket" class="col-sm-2 col-form-label">Paket</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="id_paket" name="id_paket">
                            <?php foreach ($data_paket as $row) { ?>
                            <option value="<?php echo $row->id_paket; ?>"><?php echo $row->paket; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_guru" class="col-sm-2 col-form-label">Guru</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="id_guru" name="id_guru">
                            <?php foreach ($data_guru as $row) { ?>
                            <option value="<?php echo $row->id_guru; ?>"><?php echo $row->nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea name="deskripsi" id="editor" class="form-control">
                            <?php echo $data->deskripsi ?? ""; ?>
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="batas_waktu" class="col-sm-2 col-form-label">Batas Waktu</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="batas_waktu" name="batas_waktu" value="<?php echo $data->batas_waktu ?? ""; ?>">
                    </div>
                    <div class="col-sm-8 align-self-center">
                        menit
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- End Page Content -->
