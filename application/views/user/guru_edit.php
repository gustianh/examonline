<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Guru</h1>
    <p class="mb-4">Tambah/edit administrasi guru.</p>

    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
            </div>
        </div>
        <div class="card-body">
        <?=form_open('guru/simpan', '', array("id_guru" => $data->id_guru));?>
                <h4>Informasi Diri</h4>
                <div class="form-group row">
                    <label for="nidn" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                        <?=form_input(array("class" => "form-control", "name" => "nip", "id" => "nip", "value" => $data->nip));?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <?=form_input(array("class" => "form-control", "name" => "nama", "id" => "nama", "value" => $data->nama));?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="paket" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                    <div class="col-sm-10">
                        <?=form_dropdown(array("class" => "custom-select", "name" => "mapel", "id" => "mapel", "value" => $data_mapel), $data_mapel, $data_mapel_selected);?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <?=form_radio(array("class" => "form-check-input", "name" => "jenis_kelamin", "id" => "jenis_kelamin"), "L", $data->jenis_kelamin == "L");?>
                            <label class="form-check-label" for="radioLakiLaki">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?=form_radio(array("class" => "form-check-input", "name" => "jenis_kelamin", "id" => "jenis_kelamin"), "L", $data->jenis_kelamin == "P");?>
                            <label class="form-check-label" for="radioPerempuan">Perempuan</label>
                        </div>
                    </div>
                </div>

                <h4>Informasi Akun</h4>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <?=form_input(array("class" => "form-control", "name" => "username", "id" => "username", "value" => $data->username));?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <?=form_input(array("class" => "form-control", "name" => "password", "id" => "password", "value" => $data->password));?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- End Page Content -->
