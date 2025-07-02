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
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#modal-lg">
                            Tambah Data
                        </button>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIDN</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Jabatan</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Ambil data mahasiswa dari database
                                $no = 0;
                                $query = mysqli_prepare($conn, "SELECT * FROM tb_dosen");
                                mysqli_stmt_execute($query);
                                $result = mysqli_stmt_get_result($query);
                                while ($dsn = mysqli_fetch_array($result)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td width='5%'><?= htmlspecialchars($no); ?></td>
                                        <td><?= htmlspecialchars($dsn['nama']); ?></td>
                                        <td><?= htmlspecialchars($dsn['nidn']); ?></td>
                                        <td><?= htmlspecialchars($dsn['tanggal_masuk']); ?></td>
                                        <td><?= htmlspecialchars($dsn['jabatan']); ?></td>
                                        <td><?= htmlspecialchars($dsn['status']); ?></td>
                                        <td>
                                            <a onclick="hapus_data('<?= htmlspecialchars($dsn['id']); ?>')"
                                                class="btn btn-sm btn-danger">Hapus</a>
                                            <a href="index.php?page=edit-data-dosen&& id=<?= htmlspecialchars($dsn['id']); ?>"
                                                class="btn btn-sm btn-success">Edit</a>
                                            <a class="view-data-dosen btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#modal-view" data-nama="<?= htmlspecialchars($dsn['nama']); ?>"
                                                data-nidn="<?= htmlspecialchars($dsn['nidn']); ?>"
                                                data-tanggal_masuk="<?= htmlspecialchars($dsn['tanggal_masuk']); ?>"
                                                data-jabatan="<?= htmlspecialchars($dsn['jabatan']); ?>"
                                                data-status="<?= htmlspecialchars($dsn['status']); ?>"> View Data
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Dosen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="get" action="add/tambah_data_dosen.php">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="NIDN" name="nidn" required>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" name="tanggal_masuk" name="tanggal_masuk" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Jabatan" id="jabatan" name="jabatan"
                                required>
                        </div>
                        <div class="col">
                            <select class="custom-select" id="status" name="status" required>
                                <option>Status..</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Non Aktif">Non Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal body" id="modal-view">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="hasil-view-data-dosen">
                <div class="form-row">

                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script>
    function hapus_data(data_id) {
        Swal.fire({
            title: "Apakah anda yakin ingin menghapus data ini?",
            showCancelButton: true,
            confirmButtonText: "Hapus Data",
            confirmButtonColor: 'red',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "delete/hapus_data_dosen.php?id=" + data_id;
            }
        });
    }
</script>