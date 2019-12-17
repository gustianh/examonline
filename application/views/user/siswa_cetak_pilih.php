<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Cetak Kartu Ujian</h1>
    <p class="mb-4">Cetak kartu ujian.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="mr-auto mb-0 font-weight-bold text-primary">Cetak Kartu Ujian</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('siswa/cetak_kartu_do'); ?>" method="post">
                <div class="form-group row">
                    <label for="id_guru" class="col-sm-2 col-form-label">Guru</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="id_kelas" name="id_kelas">
                            <?php foreach ($data_kelas as $row) { ?>
                            <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Cetak Kartu Ujian</button>
            </form>
            </div>
    </div>
</div>
