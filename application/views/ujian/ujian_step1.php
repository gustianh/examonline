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
            <form action="<?php echo site_url('ujian/ujian_step2'); ?>" method="post">
                <h4>Ujian</h4>
                <div class="form-group row">
                    <label for="id_ujian" class="col-sm-2 col-form-label">Paket</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="id_ujian" name="id_ujian">
                            <?php foreach ($rows as $row) { ?>
                            <option value="<?php echo $row->id_ujian; ?>"><?php echo $row->judul; ?> (<?php echo $row->nama_guru; ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ambil Ujian</button>
            </form>
        </div>
    </div>
<div>