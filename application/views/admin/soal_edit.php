<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Soal Ujian</h1>
    <p class="mb-4">Tambah/Edit Soal</p>

    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Soal</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('soal/simpan'); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $data->id_soal ?? ""; ?>">

                <h4>Soal Ujian</h4>
                <div class="form-group row">
                    <label for="paket" class="col-sm-2 col-form-label">Paket</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="paket" name="paket">
                            <?php foreach ($data_paket as $row) { ?>
                            <option value="<?php echo $row->id_paket; ?>"><?php echo $row->paket; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="editor" class="col-sm-2 col-form-label">Soal</label>
                    <div class="col-sm-10">
                        <textarea name="soal" id="editor" class="form-control">
                            <?php echo $data->soal ?? ""; ?>
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="opsi_a" class="col-sm-2 col-form-label">Jawaban A</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="opsi_a" name="opsi_a"
                            value="<?php echo $data->opsi_a ?? ""; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="opsi_b" class="col-sm-2 col-form-label">Jawaban B</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="opsi_b" name="opsi_b"
                            value="<?php echo $data->opsi_b ?? ""; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="opsi_c" class="col-sm-2 col-form-label">Jawaban C</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="opsi_c" name="opsi_c"
                            value="<?php echo $data->opsi_c ?? ""; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="opsi_d" class="col-sm-2 col-form-label">Jawaban D</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="opsi_d" name="opsi_d"
                            value="<?php echo $data->opsi_d ?? ""; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="opsi_e" class="col-sm-2 col-form-label">Jawaban E</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="opsi_e" name="opsi_e"
                            value="<?php echo $data->opsi_e ?? ""; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kunci_jawaban" class="col-sm-2 col-form-label">Kunci Jawaban</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="kunci_jawaban" name="kunci_jawaban">
                            <option value="A" <?php echo ($data->kunci_jawaban ?? "") == "A" ? "selected" : "" ?>>A</option>
                            <option value="B" <?php echo ($data->kunci_jawaban ?? "") == "B" ? "selected" : "" ?>>B</option>
                            <option value="C" <?php echo ($data->kunci_jawaban ?? "") == "C" ? "selected" : "" ?>>C</option>
                            <option value="D" <?php echo ($data->kunci_jawaban ?? "") == "D" ? "selected" : "" ?>>D</option>
                            <option value="E" <?php echo ($data->kunci_jawaban ?? "") == "E" ? "selected" : "" ?>>E</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- End Page Content -->
