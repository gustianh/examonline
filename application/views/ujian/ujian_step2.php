<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Peraturan Ujian</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('ujian/ujian_step3'); ?>" method="post">
                <input type="hidden" name="id_paket" value="<?php echo $data->id_paket; ?>">
                <input type="hidden" name="id_ujian" value="<?php echo $data->id_ujian; ?>">
                <p><?php echo $data->deskripsi; ?></p>
                <h5>Batas Waktu: <?php echo $data->batas_waktu; ?> menit.</h5>
                <button type="submit" class="btn btn-primary">Mulai Ujian</button>
            </form>
        </div>
    </div>
<div>