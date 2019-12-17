<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Hasil Ujian</h1>
    <p class="mb-4">Data Administrasi Hasil Ujian</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="mr-auto mb-0 font-weight-bold text-primary">Hasil Ujian</h6>
            </div>
        </div>
        <div class="card-body">
            <?php if (isset($message)) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $message; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>

            <form action="<?php echo site_url('hasil_ujian/cetak'); ?>" method="post">
                <div class="form-group row">
                    <label for="id_ujian" class="col-sm-2 col-form-label">Ujian</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="id_ujian" name="id_ujian">
                            <?php foreach ($data_ujian as $row) { ?>
                            <option value="<?php echo $row->id_ujian; ?>"><?php echo $row->judul; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="id_kelas" name="id_kelas">
                            <?php foreach ($data_kelas as $row) { ?>
                            <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</button>
            </form>
        </div>
    </div>
</div>
<!-- End Page Content -->
