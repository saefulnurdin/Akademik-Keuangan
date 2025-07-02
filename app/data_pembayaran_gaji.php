<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Dosen</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIDN</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Jabatan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Ambil data dari database
                                $no = 0;
                                $query = mysqli_query($conn, "SELECT * FROM tb_dosen");
                                while ($dsn = mysqli_fetch_array($query)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td width='5%'><?= htmlspecialchars($no); ?></td>
                                        <td><?= htmlspecialchars($dsn['nama']); ?></td>
                                        <td><?= htmlspecialchars($dsn['nidn']); ?></td>
                                        <td><?= htmlspecialchars($dsn['tanggal_masuk']); ?></td>
                                        <td><?= htmlspecialchars($dsn['jabatan']); ?></td>
                                        <td>
                                            <a class="view-gaji btn btn-sm btn-dark" data-id="<?= $dsn['id']; ?>"
                                                data-nama="<?= $dsn['nama']; ?>" data-nidn="<?= $dsn['nidn']; ?>"
                                                data-jabatan="<?= $dsn['jabatan']; ?>">View Pembayaran
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                        <!-- / .Table -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- / .card -->
                <div id="hasil-view-gaji">

                </div>
                <?php //include 'view/view-data-pembayaran.php';
                ?>
                <!-- / .vew data pembayaran -->
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->