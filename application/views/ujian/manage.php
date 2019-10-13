<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Ujian</h1>
    <p class="mb-4">Olah Data Ujian</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="mr-auto mb-0 font-weight-bold text-primary">Data Ujian</h6>
                <a class="btn btn-success" href="<?php echo site_url('ujian/tambah'); ?>"><i class="fas fa-plus"></i>  Tambah Ujian</a>
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
                            <th>ID</th>
                            <th>Paket</th>
                            <th>Judul</th>
                            <th>Guru</th>
                            <th>Batas Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) { ?>
                        <tr>
                            <td><?php echo $row->id_ujian; ?></td>
                            <td><?php echo $row->paket_soal; ?></td>
                            <td><?php echo $row->judul; ?></td>
                            <td><?php echo $row->nama_guru; ?></td>
                            <td><?php echo $row->batas_waktu; ?></td>
                            <td><a class="btn btn-outline-warning btn-sm"
                                    href="<?php echo site_url('ujian/edit/' . $row->id_ujian); ?>">Edit</a>
                                <a class="btn btn-outline-danger btn-sm"
                                    href="<?php echo site_url('ujian/hapus/' . $row->id_ujian); ?>">Hapus</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Page Content -->
