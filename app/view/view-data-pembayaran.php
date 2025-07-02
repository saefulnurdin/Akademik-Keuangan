<?php
include('../../config/config.php');
$id = isset($_POST['id']) ? $_POST['id'] : '';
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$nim = isset($_POST['nim']) ? $_POST['nim'] : '';
$angkatan = isset($_POST['angkatan']) ? $_POST['angkatan'] : '';
$jurusan = isset($_POST['jurusan']) ? $_POST['jurusan'] : '';
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pembayaran :</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal"
                            data-target="#modal-lg">Tambah Pembayaran</button>
                        <!-- <button type="button" class="btn btn-warning mb-3 ml-2" id="editTerakhirBtn" disabled>Edit Pembayaran Terakhir</button> -->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Jurusan</th>
                                    <th>Angkatan</th>
                                    <th>Semester</th>
                                    <th>Tgl Bayar</th>
                                    <th>Nama Pembayaran</th>
                                    <th>Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $total = 0;
                                $nim = isset($_POST['nim']) ? $_POST['nim'] : '';
                                $query = mysqli_query($conn, "SELECT tb_mahasiswa.*,tb_pembayaran.semester, tb_pembayaran.tgl_bayar, tb_pembayaran.nama_pembayaran, tb_pembayaran.pembayaran FROM tb_mahasiswa LEFT JOIN tb_pembayaran ON tb_mahasiswa.nim = tb_pembayaran.nim WHERE tb_mahasiswa.nim = '$nim'");
                                while ($row = mysqli_fetch_array($query)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['nim']; ?></td>
                                        <td><?= $row['jurusan']; ?></td>
                                        <td><?= $row['angkatan']; ?></td>
                                        <td><?= $row['semester'] ? $row['semester'] : '-'; ?></td>
                                        <td><?= $row['tgl_bayar'] ? $row['tgl_bayar'] : '-'; ?></td>
                                        <td><?= $row['nama_pembayaran'] ? $row['nama_pembayaran'] : '-'; ?></td>
                                        <td><?= $row['pembayaran'] ? number_format($row['pembayaran']) : '-'; ?></td>
                                    </tr>
                                    <?php
                                    $total += $row['pembayaran'] ?? 0;
                                    ?>
                                <?php } ?>
                            <tfoot>
                                <tr>
                                    <th colspan="8">Total Pembayaran</th>
                                    <th class="text-right" id="totalPembayaran"><?= 'Rp.' . number_format($total); ?>
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
                <h3 class="card-title">Input Pembayaran</h3>
            </div>
            <form id="formPembayaran" method="POSt" action="proses/simpan_pembayaran.php">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="<?= htmlspecialchars($nama) ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim"
                                value="<?= htmlspecialchars($nim) ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="angkatan" name="angkatan"
                                value="<?= htmlspecialchars($angkatan) ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jurusan" name="jurusan"
                                value="<?= htmlspecialchars($jurusan) ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="semester" name="semester"
                                placeholder="Semester">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_bayar" class="col-sm-2 col-form-label">Tgl Bayar</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_pembayaran" class="col-sm-2 col-form-label">Nama Pembayaran</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="nama_pembayaran" name="nama_pembayaran" required>
                                <option value="">Nama Pembayaran..</option>
                                <option value="Kemahasiswaan">Kemahasiswaan</option>
                                <option value="Registrasi">Registrasi</option>
                                <option value="UKT">UKT</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pembayaran" class="col-sm-2 col-form-label">Pembayaran</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="pembayaran" name="pembayaran" required>
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