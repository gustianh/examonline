<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Soal Ujian</h6>
            </div>
        </div>
        <div class="card-body">
            <p class="lead text-center" id="timer"></p>
            <hr>
            <form action="<?php echo site_url('ujian/ujian_selesai'); ?>" method="post">
                <?php foreach ($rows as $row) { ?>
                <div class="form-group">
                    <p><?php echo $row->soal; ?></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="soal<?php echo $row->id_soal; ?>"
                                id="soal<?php echo $row->id_soal; ?>" value="A">
                            <label class="form-check-label" for="soal<?php echo $row->id_soal; ?>">
                                <?php echo $row->opsi_a; ?>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="soal<?php echo $row->id_soal; ?>"
                                id="soal<?php echo $row->id_soal; ?>" value="B">
                            <label class="form-check-label" for="soal<?php echo $row->id_soal; ?>">
                                <?php echo $row->opsi_b; ?>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="soal<?php echo $row->id_soal; ?>"
                                id="soal<?php echo $row->id_soal; ?>" value="C">
                            <label class="form-check-label" for="soal<?php echo $row->id_soal; ?>">
                                <?php echo $row->opsi_c; ?>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="soal<?php echo $row->id_soal; ?>"
                                id="soal<?php echo $row->id_soal; ?>" value="D">
                            <label class="form-check-label" for="soal<?php echo $row->id_soal; ?>">
                                <?php echo $row->opsi_d; ?>
                            </label>
                        </div>
                </div>
                <hr>
                <?php } ?>

                <button type="submit" class="btn btn-primary">Selesai Ujian</button>
            </form>
        </div>
    </div>
    <div>
        <!-- Display the countdown timer in an element -->
        <p id="demo"></p>
