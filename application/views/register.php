<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Siswa</title>
    <link rel="stylesheet" href="<?=site_url('assets/vendor/twitter-bootstrap/css/bootstrap.min.css'); ?>">
</head>
<body>
        <div class="container">
        <br><br>
        <form action="<?php echo site_url('login/register_do'); ?>" method="post">
                <h4>Informasi Diri</h4>
                <div class="form-group row">
                    <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nis" name="nis"
                            value="<?php echo $data->nis ?? ""; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="<?php echo $data->nama ?? ""; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="<?php echo $data->tanggal_lahir ?? ""; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="radioLakiLaki"
                                value="L" <?php echo ($data->jenis_kelamin ?? "") == "L" ? "checked" : "" ?>>
                            <label class="form-check-label" for="radioLakiLaki">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="radioPerempuan"
                                value="P" <?php echo ($data->jenis_kelamin ?? "") == "P" ? "checked" : "" ?>>
                            <label class="form-check-label" for="radioPerempuan">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="kelas" name="kelas">
                            <?php foreach ($data_kelas as $row) { ?>
                            <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahun_masuk" class="col-sm-2 col-form-label">Tahun Masuk</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk"
                            value="<?php echo $data->tahun_masuk ?? ""; ?>">
                    </div>
                </div>

                <h4>Informasi Administrasi</h4>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username"
                            value="<?php echo $data->username ?? ""; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password"
                            value="<?php echo $data->password ?? ""; ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Daftar</button>
            </form>
            <br><br>
        </div>
</body>
</html>
