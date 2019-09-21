<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Hasil Ujian</h1>
    <p class="mb-4">Tambah/Edit Hasil Ujian.</p>

    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Hasil Ujian</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('hasil_ujian/simpan'); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $data->id_hasil ?? ""; ?>">

                <h4>Informasi Hasil Ujian</h4>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">ID Siswa</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="id_siswa" name="id_siswa">
                            <?php foreach ($rows as $row) { ?>
                            <option value="<?php echo $row->id_siswa; ?>"><?php echo $row->siswa; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Hasil Ujian</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="nama_kelas" name="nama_kelas">
                            <?php foreach ($rows as $row) { ?>
                            <option value="<?php echo $row->id_hasil; ?>"><?php echo $row->skor; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- End Page Content -->
