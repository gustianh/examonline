<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
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
                <a class="btn btn-success" href="<?php echo site_url('siswa/tambah'); ?>"><i class="fas fa-plus"></i>
                    Tambah Siswa</a>&nbsp;
                <a class="btn btn-success text-white" data-toggle="modal" data-target="#cetakModal"><i
                        class="fas fa-print"></i> Cetak</a>&nbsp;
                <a class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteModal"><i
                        class="fas fa-trash"></i> Hapus Angkatan</a>
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
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nis</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Tahun Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nis</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Tahun Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Page Content -->

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Angkatan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo site_url('siswa/hapus_angkatan'); ?>" method="POST">
                <div class="modal-body">Pilih angkatan untuk di hapus.
                    <select class="custom-select" id="tahun_masuk" name="tahun_masuk">
                        <?php foreach ($data_angkatan as $row) { ?>
                        <option value="<?=$row->tahun_masuk;?>"><?=$row->tahun_masuk;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Print Modal -->
<div class="modal fade" id="cetakModal" tabindex="-1" role="dialog" aria-labelledby="cetakModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cetakModalLabel">Cetak Data Siswa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo site_url('siswa/cetak_siswa'); ?>" method="POST">
                <div class="modal-body">Pilih kelas untuk dicetak.
                    <select class="custom-select" id="id_kelas" name="id_kelas">
                        <?php foreach ($data_kelas as $row) { ?>
                        <option value="<?=$row->id_kelas;?>"><?=$row->nama;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php function footer_block() { ?>
<script type="text/javascript">
    $(document).ready(function () {
        var tabel = $('#table').DataTable({
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": '<?=site_url('siswa/populate_table');?>',
                "type": "POST"
            },
            "deferRender": true,
            "columns": [
                { "data": "id_siswa" },
                { "data": "nis" },
                { "data": "nama" },
                { "data": "kelas" },
                { "data": "tahun_masuk" },
                {
                    "render": function (data, type, row) {
                        var html = '<a class="btn btn-outline-warning btn-sm" href="<?=site_url('siswa/edit');?>/' + row.id_siswa + '">Edit</a>  '
                        html += '<a class="btn btn-outline-danger btn-sm" href="<?=site_url('siswa/hapus');?>/' + row.id_siswa + '">Hapus</a>'
                        return html;
                    }
                }
            ]
        });
    });

</script>
<?php } ?>
