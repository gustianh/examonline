<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Guru</h1>
    <p class="mb-4">Data administrasi guru.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex align-items-center">
                <h6 class="mr-auto mb-0 font-weight-bold text-primary">Data Guru</h6>
                <a class="btn btn-success" href="<?php echo site_url('guru/tambah'); ?>"><i class="fas fa-plus"></i>  Tambah Guru</a>&nbsp;
                <a class="btn btn-success text-white" href="<?php echo site_url('guru/cetak'); ?>"><i class="fas fa-print"></i>  Cetak</a>
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
                <table class="table table-bordered" id="table-siswa" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Mapel</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Mapel</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Page Content -->

<?php function footer_block() {?>
<script type="text/javascript">
    $(document).ready(function() {
        let tabel = $('#table-siswa').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "order": [[ 0, 'asc' ]],
            "ajax":
            {
                "url": "<?php echo base_url('guru/ajax_data') ?>",
                "type": "POST"
            },
            "deferRender": true,
            "columns": [
                { "data": "nip" },
                { "data": "nama" },
                { "data": "mapel" },
                { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                        var html = '<a class="btn btn-outline-warning btn-sm" href="<?=site_url('guru/edit/');?>' + row.id_guru + '">Edit</a>  '
                        html += '<a class="btn btn-outline-danger btn-sm" href="<?=site_url('guru/hapus/');?>' + row.id_guru + '">Hapus</a>'
                        return html;
                    }
                },
            ],
        });
    });
 </script>
<?php } ?>
