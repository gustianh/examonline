<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelas</h1>
    <p class="mb-4">Tambah/Edit Kelas</p>

    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('kelas/simpan'); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $data->id_kelas ?? ""; ?>">

                <h4>Informasi Kelas</h4>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Nama Kelas</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="nama_kelas" name="nama_kelas">
                            <?php foreach ($rows as $row) { ?>
                            <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Peminatan ( RomBel )</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="rombel" name="rombel">
                            <?php foreach ($rows as $row) { ?>
                            <option value="<?php echo $row->id_rombel; ?>"><?php echo $row->nama; ?></option>
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
