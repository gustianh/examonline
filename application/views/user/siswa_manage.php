<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
    <p class="mb-4">Data administrasi siswa.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="mr-auto mb-0 font-weight-bold text-primary">Data Siswa</h6>
                <a class="btn btn-success" href="<?php echo site_url('siswa/tambah'); ?>"><i class="fas fa-plus"></i>  Tambah Siswa</a>
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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Kelas</th>
                            <th>Tahun Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) { ?>
                        <tr>
                            <td><?php echo $row->id_siswa; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->tanggal_lahir; ?></td>
                            <td><?php echo $row->kelas; ?></td>
                            <td><?php echo $row->tahun_masuk; ?></td>
                            <td><a class="btn btn-outline-warning btn-sm"
                                    href="<?php echo site_url('siswa/edit/' . $row->id_siswa); ?>">Edit</a>
                                <a class="btn btn-outline-danger btn-sm"
                                    href="<?php echo site_url('siswa/hapus/' . $row->id_siswa); ?>">Hapus</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Page Content -->
