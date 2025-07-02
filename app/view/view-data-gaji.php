<?php
include('../../config/config.php');
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$nidn = isset($_POST['nidn']) ? $_POST['nidn'] : '';
$jabatan = isset($_POST['jabatan']) ? $_POST['jabatan'] : '';
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Gaji Dosen :</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal"
                            data-target="#modal-lg">Tambah Gaji Dosen</button>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIDN</th>
                                    <th>Jabatan</th>
                                    <th>Tanggal Gaji</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $total = 0;
                                $nidn = isset($_POST['nidn']) ? $_POST['nidn'] : '';
                                $query = mysqli_query($conn, "SELECT tb_dosen.*,tb_gaji.tanggal_gaji, tb_gaji.nominal FROM tb_dosen LEFT JOIN tb_gaji ON tb_dosen.nidn = tb_gaji.nidn WHERE tb_dosen.nidn = '$nidn'");
                                while ($row = mysqli_fetch_array($query)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['nidn']; ?></td>
                                        <td><?= $row['jabatan']; ?></td>
                                        <td><?= $row['tanggal_gaji'] ? $row['tanggal_gaji'] : '-'; ?></td>
                                        <td><?= $row['nominal'] ? number_format($row['nominal']) : '-'; ?></td>
                                    </tr>
                                    <?php
                                    $total += $row['nominal'] ?? 0;
                                    ?>
                                <?php } ?>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Total Gaji</th>
                                    <th class="text-right" id="totalPembayaranGaji">
                                        <?= 'Rp.' . number_format($total); ?>
                                    </th>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.Card -->
            </div>
            <!-- /.Col -->
        </div>
        <!-- /.Row -->
    </div>
    <!-- /.Container-fluid -->
</section>
<!-- /.Content -->

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card card-info">
            <div class="card-header">
                <h3 class="card-title">Input Pembayaran Gaji</h3>
            </div>
            <form id="formPembayaranGaji" method="POSt" action="proses/simpan_gaji_dosen.php">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="<?= htmlspecialchars($nama) ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nim" class="col-sm-2 col-form-label">NIDN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nidn" name="nidn"
                                value="<?= htmlspecialchars($nidn) ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="angkatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jabatan" name="jabatan"
                                value="<?= htmlspecialchars($jabatan) ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jurusan" class="col-sm-2 col-form-label">Tanggal Gaji</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_gaji" name="tanggal_gaji">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="semester" class="col-sm-2 col-form-label">Nominal</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nominal" name="nominal">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <button type="button" class="btn btn-default float-right" data-dismiss="modal">Batal</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('success')) {
            alert('Pembayaran berhasil disimpan');
            // Tutup modal jika masih terbuka
            $('#modal-lg').modal('hide');

            // Refresh tabel
            location.reload();
        }
    });
</script>